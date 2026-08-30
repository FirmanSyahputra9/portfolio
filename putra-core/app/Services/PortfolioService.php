<?php

namespace App\Services;

use App\Models\About;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\HeroButton;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;

class PortfolioService
{
    public function getPortfolioData(): array
    {
        $user = User::with('heroData', 'projects', 'certificateData')->first();
        return [
            'hero' => [
                'id' => $user->heroData->id,
                'email' => $user->email,
                'name_id' => $user->heroData->name_id,
                'name_en' => $user->heroData->name_en,
                'role_id' => $user->heroData->role_id,
                'role_en' => $user->heroData->role_en,
                'image' => $user->heroData->image,
                'summary_id' => $user->heroData->summary_id,
                'summary_en' => $user->heroData->summary_en,
                'role_description_id' => $user->heroData->role_description_id,
                'role_description_en' => $user->heroData->role_description_en,
                'hero_buttons' => HeroButton::select('id', 'label_id', 'label_en', 'url', 'action')->get()->toArray(),
            ],
            'projects' => $user->projects->map(function ($project) {
                return [
                    'id' => $project->id,
                    'title_id' => $project->title_id,
                    'title_en' => $project->title_en,
                    'created_at' => $project->created_at,
                    'introduction_id' => $project->introduction_id,
                    'introduction_en' => $project->introduction_en,
                    'demo' => $project->demo,
                    'source_code' => $project->source_code,
                    'technologies' => $project->projectDetails?->map(function ($detail) {
                        return [
                            'id' => $detail->id,
                            'category' => $detail->category->name,
                            'technology' => $detail->technology->name,
                            'icon' => $detail->technology->icon,
                        ];
                    })->toArray(),
                ];
            })->toArray(),
            'about' => [
                'about_description_id' => $user->aboutData?->about_description_id,
                'about_description_en' => $user->aboutData?->about_description_en,
            ],
            'experiences' => $user->experienceData?->map(function ($experience) {
                return [
                    'id' => $experience->id,
                    'position' => $experience->position,
                    'company' => $experience->company,
                    'description_id' => $experience->description_id,
                    'description_en' => $experience->description_en,
                    'location' => $experience->location,
                    'start_date' => $experience->start_date,
                    'end_date' => $experience->end_date,
                    'image' => $experience->image,
                    'technologies' => $experience->experienceDetails->map(function ($technology) {
                        return [
                            'id' => $technology->id,
                            'category' => $technology->category->name,
                            'technology' => $technology->technology->name,
                            'icon' => $technology->technology->icon,
                        ];
                    })->toArray(),
                ];
            })->toArray(),
            'contacts' => [
                'user_id' => $user->contactData->user_id,
                'contact_title_id' => $user->contactData->contact_title_id,
                'contact_title_en' => $user->contactData->contact_title_en,
                'contact_description_id' => $user->contactData->contact_description_id,
                'contact_description_en' => $user->contactData->contact_description_en,

                'platform' => $user->contactData->contactDetail->map(function ($detail) {
                    return [
                        'id' => $detail->id,
                        'platform' => $detail->platform,
                        'name' => $detail->name,
                        'icon' => $detail->icon,
                        'url' => $detail->url,
                    ];
                })->toArray(),
            ],
            'certificates' => $user->certificateData->map(function ($certificate) {
                return [
                    'id' => $certificate->id,
                    'title_id' => $certificate->title_id,
                    'title_en' => $certificate->title_en,
                    'credential_id' => $certificate->credential_id,
                    'credential_url' => $certificate->credential_url,
                    'issuer' => $certificate->issuer->name,
                    'issuer_slug' => $certificate->issuer->slug,
                    'issuer_url' => $certificate->issuer->url,
                    'issuer_logo' => $certificate->issuer->logo,
                    'description_id' => $certificate->description_id,
                    'description_en' => $certificate->description_en,
                    'image' => $certificate->image,
                    'issued_date' => $certificate->issued_date,
                    'expiration_date' => $certificate->expiration_date,
                    'technologies' => $certificate->certificateDetails->map(function ($technology) {
                        return [
                            'id' => $technology->id,
                            'category' => $technology->category->name,
                            'technology' => $technology->technology->name,
                            'icon' => $technology->technology->icon,
                        ];
                    })->toArray(),
                ];
            }),
        ];
    }
}
