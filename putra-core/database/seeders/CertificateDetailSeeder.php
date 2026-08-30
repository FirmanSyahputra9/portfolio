<?php

namespace Database\Seeders;

use App\Models\CertificateData;
use App\Models\CertificateDetail;
use App\Models\ContactData;
use App\Models\ContactDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CertificateDetail::factory()->count(10)->create();
    }
}
