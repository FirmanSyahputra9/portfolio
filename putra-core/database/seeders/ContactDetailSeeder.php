<?php

namespace Database\Seeders;

use App\Models\ContactData;
use App\Models\ContactDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact_id = ContactData::first()->id;
        $contactDetail = [
            [
                'contact_id' => $contact_id,
                'platform' => 'Facebook',
                'name' => 'Firman Syahputra',
                'icon' => 'fab fa-facebook',
                'url' => 'https://web.facebook.com/firman.brader.98/',
            ],
            [
                'contact_id' => $contact_id,
                'platform' => 'Instagram',
                'name' => 'firman_s.putra',
                'icon' => 'fab fa-instagram',
                'url' => 'https://www.instagram.com/firman_s.putra/',
            ],
            [
                'contact_id' => $contact_id,
                'platform' => 'Linkedin',
                'name' => 'Firman Syahputra',
                'icon' => 'fab fa-linkedin',
                'url' => 'https://www.linkedin.com/in/firman-syahputra-0ab995229/',
            ],
            [
                'contact_id' => $contact_id,
                'platform' => 'Email',
                'name' => 'Firman Syahputra',
                'icon' => 'far fa-envelope',
                'url' => 'mailto:056firmansyahputra@gmail.com',
            ]
        ];

        foreach ($contactDetail as $detail) {
            ContactDetail::create($detail);
        }
    }
}
