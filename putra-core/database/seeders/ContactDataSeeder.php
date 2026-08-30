<?php

namespace Database\Seeders;

use App\Models\ContactData;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = User::first()->id;
        $contactData = [
            [
                'user_id' => $user_id,
                'contact_title_id' => 'Mari mengembangkan sesuatu yang luar biasa',
                'contact_title_en' => 'Let\'s build something great',
                'contact_description_en' => 'I\'m always open to interesting conversations, collaborations, or just a friendly hello.',
                'contact_description_id' => 'Saya selalu terbuka untuk percakapan, kolaborasi, atau hanya sebuah salam.',
            ]
        ];

        foreach ($contactData as $data) {
            ContactData::create($data);
        }
    }
}
