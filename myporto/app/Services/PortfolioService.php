<?php

namespace App\Services;

use Carbon\Carbon;

class PortfolioService
{
    public function __construct(
        protected ApiService $api
    ) {}

    public function getPortfolio(): array
    {
        $locale = app()->getLocale();

        $data = $this->api->portfolio();
        if (empty($data)) {
            return [
                'hero' => [],
                'featuredProject' => [],
                'projects' => [],
                'skills' => [],
                'technologies' => [],
                'about' => [],
                'experiences' => [],
                'contact' => [],
                'certificates' => [],
            ];
        }


        $hero = $data['hero'];
        $hero = [
            'name' => $hero["name_{$locale}"],
            'role' => $hero["role_{$locale}"],
            'image' => config('app.profile_photo_url') . $hero['image'] ?? '-',
            'summary' => $hero["summary_{$locale}"],
            'role_description' => $hero["role_description_{$locale}"],
            'hero_buttons' => collect($hero['hero_buttons'])
                ->map(fn($button) => [
                    'id' => $button['id'],
                    'label' => $button["label_{$locale}"],
                    'action' => $button['action'],
                    'url' => $button['action'] == 'link' ? $button['url'] : config('app.profile_photo_url') . $button['url'],
                ])
                ->toArray(),
        ];



        $projects = collect($data['projects'])
            ->sortByDesc('created_at')
            ->map(function ($project) use ($locale) {
                return [
                    'id' => $project['id'],
                    'title' => $project["title_{$locale}"],
                    'created_at' => $project['created_at'],
                    'introduction' => $project["introduction_{$locale}"],
                    'demo' => $project['demo'],
                    'source_code' => $project['source_code'],
                    'technologies' => collect($project['technologies'])
                        ->map(fn($detail) => [
                            'id' => $detail['id'],
                            'category' => $detail['category'],
                            'technology' => $detail['technology'],
                            'icon' => $detail['icon'],
                        ])
                        ->toArray(),
                ];
            });


        $skills = collect($data['projects'])
            ->flatMap(fn($project) => $project['technologies'])
            ->concat(
                collect($data['experiences'])
                    ->flatMap(fn($experience) => $experience['technologies'])
            )
            ->concat(
                collect($data['certificates'])
                    ->flatMap(fn($certificate) => $certificate['technologies'])
            )
            ->unique(fn($tech) => $tech['category'] . '-' . strtolower($tech['technology']))
            ->map(fn($tech) => [
                'id' => $tech['id'],
                'category' => $tech['category'],
                'technology' => $tech['technology'],
                'icon' => $tech['icon'],
            ])
            ->groupBy('category')
            ->toArray();


        $technologies = collect($data['projects'])
            ->flatMap(fn($project) => $project['technologies'])
            ->concat(
                collect($data['experiences'])
                    ->flatMap(fn($experience) => $experience['technologies'])
            )
            ->concat(
                collect($data['certificates'])
                    ->flatMap(fn($certificate) => $certificate['technologies'])
            )
            ->unique(fn($tech) => strtolower($tech['technology']))
            ->map(fn($tech) => [
                'technology' => $tech['technology'],
                'icon' => $tech['icon'],
            ])
            ->values()
            ->toArray();

        // dd($technologies);

        $about = [
            'about_description' => $data['about']['about_description_' . $locale],
        ];

        $experiences = collect($data['experiences'])
            ->sortByDesc('start_date')
            ->map(function ($experience) use ($locale) {
                return [
                    'id' => $experience['id'],
                    'position' => $experience["position"],
                    'company' => $experience['company'],
                    'description' => $experience["description_{$locale}"],
                    'location' => $experience['location'],
                    'start_date' => Carbon::parse($experience['start_date'])->format('M Y'),
                    'end_date' => $experience['end_date'] ? Carbon::parse($experience['end_date'])->format('M Y') : 'Present',
                    'image' => $experience['image'],

                    'technologies' => collect($experience['technologies'])
                        ->map(fn($detail) => [
                            'id' => $detail['id'],
                            'category' => $detail['category'],
                            'technology' => $detail['technology'],
                            'icon' => $detail['icon'],
                        ])
                        ->toArray(),
                ];
            })
            ->toArray();

        $contacts = $data['contacts'];
        $contacts = [
            'contact_title' => $contacts['contact_title_' . $locale],
            'contact_description' => $contacts['contact_description_' . $locale],
            'platforms' => collect($contacts['platform']),
            'email' => collect($contacts['platform'])
                ->firstWhere('platform', 'Email'),
        ];

        $certificates = $data['certificates'];
        // dd($certificates);
        $certificates = collect($certificates)->sortBy('created_at')->map(function ($certificate) use ($locale) {
            return [
                'id' => $certificate['id'],
                'title' => $certificate["title_{$locale}"],
                'credential_id' => $certificate['credential_id'],
                'credential_url' => $certificate['credential_url'],
                'issuer' => $certificate['issuer'],
                'issuer_slug' => $certificate['issuer_slug'],
                'issuer_url' => $certificate['issuer_url'],
                'issuer_logo' => $certificate['issuer_logo'],
                'description' => $certificate["description_{$locale}"],
                'image' => $certificate['image'],
                'issued_date' => Carbon::parse($certificate['issued_date'])->format('M Y'),
                'expiration_date' => $certificate['expiration_date'] !== '-'
                    ? Carbon::parse($certificate['expiration_date'])->format('M Y')
                    : '-',
                'technologies' => collect($certificate['technologies'])
                    ->map(fn($detail) => [
                        'id' => $detail['id'],
                        'category' => $detail['category'],
                        'technology' => $detail['technology'],
                        'icon' => $detail['icon'],
                    ])
            ];
        });

        return [
            'hero' => $hero,

            'featuredProject' => $projects->first() ?? [],

            'projects' => $projects
                ->skip(1)
                ->values()
                ->toArray(),

            'skills' => $skills,
            'technologies' => $technologies,
            'about' => $about,
            'experiences' => $experiences,
            'contacts' => $contacts,
            'certificates' => $certificates
        ];
    }
}
