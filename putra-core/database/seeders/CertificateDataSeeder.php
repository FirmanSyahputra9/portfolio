<?php

namespace Database\Seeders;

use App\Models\CertificateData;
use App\Models\Issuer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::first()->id;

        $certificateData = [
            [
                'user_id' => $userId,
                'title_id' => 'MongoDB Data Modeling Path',
                'title_en' => 'MongoDB Data Modeling Path',
                'issuer_id' => Issuer::where('slug', 'mongodb-university')->first()->id,
                'description_id' => 'Dalam course ini, saya mempelajari dasar-dasar pembuatan data model yang efektif menggunakan MongoDB. Saya belajar mengidentifikasi entitas dan kebutuhan database berdasarkan sebuah studi kasus, memetakan hubungan antar-entitas, serta memahami kapan sebaiknya menggunakan embedding atau referencing dalam MongoDB.
                Saya juga mempelajari berbagai schema design patterns yang dapat membantu dalam merancang struktur database yang sesuai dengan kebutuhan dan workload aplikasi.',
                'description_en' => 'In this course, I learned the fundamentals of creating effective data models using MongoDB. I learned how to identify database entities and workloads from a use case, map relationships between entities, and understand when to use embedding or referencing in MongoDB.
                I also learned various schema design patterns that can help me design database structures based on an application\'s requirements and workloads.',
                'issued_date' => '2025-12-14',
                'expiration_date' => Carbon::parse('2025-12-14')->addYears(3)->format('Y-m-d'),
                'credential_id' => 'MDBry29pou1ey',
                'credential_url' => 'https://learn.mongodb.com/c/ek9G0BbZTcyxlVtuq-7HlA',
                'image' => fake()->imageUrl(),
            ],
            [
                'user_id' => $userId,
                'title_id' => 'Gemini University Student',
                'title_en' => 'Gemini University Student',
                'issuer_id' => Issuer::where('slug', 'google-for-education')->first()->id,
                'description_id' => 'Melalui sertifikasi ini, saya mempelajari dasar-dasar Generative AI serta fitur dan kemampuan utama Google Gemini, khususnya dalam konteks pendidikan. Saya memahami bagaimana teknologi AI generatif dapat dimanfaatkan untuk mendukung proses pembelajaran dan menyelesaikan berbagai kebutuhan dalam lingkungan pendidikan.
                Sertifikasi ini juga membuktikan pemahaman saya terhadap konsep dasar Generative AI dan kemampuan inti Gemini.',
                'description_en' => 'Through this certification, I learned the fundamentals of Generative AI and the core features and capabilities of Google Gemini, particularly in an educational context. I gained an understanding of how generative AI can be used to support learning processes and address various needs in educational environments.
                This certification demonstrates my understanding of basic Generative AI concepts and the core capabilities of Gemini.',
                'issued_date' => '2026-05-20',
                'expiration_date' => Carbon::parse('2026-05-20')->addYears(3)->format('Y-m-d'),
                'credential_id' => 'a45d4a9d-8641-4c45-82ff-ef86fbbe6264#acc.P8w2tmTz',
                'credential_url' => 'https://edu.google.accredible.com/a45d4a9d-8641-4c45-82ff-ef86fbbe6264#acc.P8w2tmTz',
                'image' => fake()->imageUrl(),
            ],
            [
                'user_id' => $userId,
                'title_id' => 'PRACTICAL OFFICE ADVANCE',
                'title_en' => 'PRACTICAL OFFICE ADVANCE',
                'issuer_id' => Issuer::where('slug', 'kementrian-ketenagakerjaan-ri')->first()->id,
                'description_id' => 'Melalui sertifikasi ini, saya telah menyelesaikan pelatihan Practical Office Advance selama 260 jam pelatihan yang mencakup penguasaan perangkat lunak perkantoran tingkat dasar hingga lanjutan, seperti pengolah kata, lembar kerja (spreadsheet), dan presentasi. Saya juga dibekali dengan keterampilan softskill dan produktivitas yang mendukung efisiensi kerja di lingkungan profesional.
                Sertifikat ini membuktikan kompetensi saya dalam mengoperasikan berbagai aplikasi perkantoran secara mahir dan terintegrasi. Sertifikat ini diterbitkan oleh BLK PANYABUNGAN.',
                'description_en' => 'Through this certification, I have completed a Practical Office Advance training program totaling 260 hours, covering basic to advanced levels of office software applications, including word processing, spreadsheets, and presentations. I have also gained soft skills and productivity competencies to support efficient performance in professional settings.
                This certification validates my proficiency in operating various office applications in an integrated manner. It is issued by BLK PANYABUNGAN.',
                'issued_date' => '2023-06-30',
                'expiration_date' => Carbon::parse('2023-06-30')->addYears(3)->format('Y-m-d'),
                'credential_id' => '2311027A27FA26',
                'credential_url' => 'https://drive.google.com/file/d/1EDQBqT1qMAKtKwdyjflbhY_XY5ijAWwN/view',
                'image' => fake()->imageUrl(),
            ],
            [
                'user_id' => $userId,
                'title_id' => 'Belajar Dasar Pemrograman JavaScript',
                'title_en' => 'Learn Basic Programming JavaScript',
                'issuer_id' => Issuer::where('slug', 'dicoding')->first()->id,
                'description_id' => 'Melalui kelas ini, saya mempelajari dasar-dasar JavaScript sebagai fondasi untuk pengembangan aplikasi web menggunakan Node.js. Saya mempelajari penggunaan sintaks JavaScript, variabel, tipe data, operator, function, serta berbagai struktur data seperti Object, Array, Map, dan Set.
                Saya juga mendalami konsep conditional, looping, error handling, modularisasi dengan ECMAScript Module, Object-Oriented Programming (OOP), Functional Programming, serta proses asynchronous menggunakan Callback, Promise, dan Async/Await.
                Selain aspek pemrograman, saya mempelajari code quality untuk menulis kode JavaScript yang lebih konsisten, aman, mudah dipelihara, dan teruji sesuai dengan praktik pengembangan yang baik.',
                'description_en' => 'Through this course, I learned the fundamentals of JavaScript as a foundation for web application development using Node.js. I learned JavaScript syntax, variables, data types, operators, functions, and data structures such as Objects, Arrays, Maps, and Sets.
                I also explored conditionals, loops, error handling, modularization with ECMAScript Modules, Object-Oriented Programming (OOP), Functional Programming, and asynchronous processes using Callbacks, Promises, and Async/Await.
                In addition to programming concepts, I learned about code quality and how to write JavaScript code that is consistent, secure, maintainable, and testable based on good development practices.',
                'issued_date' => '2025-05-06',
                'expiration_date' => Carbon::parse('2025-05-06')->addYears(3)->format('Y-m-d'),
                'credential_id' => 'KEXL76QMWXG2',
                'credential_url' => 'https://www.dicoding.com/certificates/KEXL76QMWXG2',
                'image' => fake()->imageUrl(),
            ],
            [
                'user_id' => $userId,
                'title_id' => 'Belajar Dasar Pemrograman Web',
                'title_en' => 'Learn Basic Programming Web',
                'issuer_id' => Issuer::where('slug', 'dicoding')->first()->id,
                'description_id' => 'Melalui kelas ini, saya mempelajari dasar-dasar HTML dan CSS sebagai fondasi utama dalam pengembangan website. Saya memahami cara membangun struktur halaman menggunakan HTML, termasuk penggunaan elemen semantik, atribut, tabel, serta perbedaan antara elemen inline dan block.
                Selain itu, saya mempelajari CSS untuk mengatur dan memperindah tampilan website, mulai dari selector, typography, color, box model, positioning, hingga layouting. Saya juga mempelajari Flexbox dan media query untuk membuat layout yang responsif dan dapat beradaptasi dengan berbagai ukuran perangkat.
                Di akhir kelas, saya menerapkan materi yang telah dipelajari melalui sebuah proyek website sederhana.',
                'description_en' => 'Through this course, I learned the fundamentals of HTML and CSS as the core foundations of web development. I learned how to build website structures using HTML, including semantic elements, attributes, tables, and the differences between inline and block elements.
                I also learned how to use CSS to style and improve website interfaces, covering selectors, typography, colors, the box model, positioning, and layout techniques. In addition, I learned Flexbox and media queries to create responsive layouts that adapt to different screen sizes.
                At the end of the course, I applied what I learned by building and improving a simple website project.',
                'issued_date' => '2024-04-24',
                'expiration_date' => Carbon::parse('2024-04-24')->addYears(3)->format('Y-m-d'),
                'credential_id' => '53XED5V39PRN',
                'credential_url' => 'https://www.dicoding.com/certificates/53XED5V39PRN',
                'image' => fake()->imageUrl(),
            ],
            [
                'user_id' => $userId,
                'title_id' => 'Belajar Dasar Cloud dan Gen AI di AWS',
                'title_en' => 'Learn Basic Cloud and Gen AI on AWS',
                'issuer_id' => Issuer::where('slug', 'dicoding')->first()->id,
                'description_id' => 'Melalui kelas ini, saya mempelajari dasar-dasar Cloud Computing menggunakan Amazon Web Services (AWS) dengan mengacu pada standar kompetensi industri. Saya memahami konsep cloud computing, model biaya pay-as-you-go, serta berbagai layanan utama AWS dalam komputasi, jaringan, penyimpanan, database, dan keamanan.
                Saya juga mempelajari AWS Global Infrastructure, termasuk Region, Availability Zone, dan Edge Location, serta konsep networking seperti VPC, VPN, dan arsitektur hybrid. Selain itu, saya memahami dasar IAM, shared responsibility model, monitoring, analytics, cloud migration, hingga pengelolaan biaya menggunakan AWS Budgets, Cost Explorer, dan Pricing Calculator.
                Kelas ini juga memperkenalkan saya pada AWS Well-Architected Framework serta dasar-dasar Artificial Intelligence, Machine Learning, dan Generative AI yang disediakan oleh AWS.',
                'description_en' => 'Through this course, I learned the fundamentals of Cloud Computing using Amazon Web Services (AWS) based on industry competency standards. I gained an understanding of cloud computing concepts, the pay-as-you-go pricing model, and core AWS services for computing, networking, storage, databases, and security.
                I also learned about AWS Global Infrastructure, including Regions, Availability Zones, and Edge Locations, as well as networking concepts such as VPCs, VPNs, and hybrid architectures. In addition, I explored IAM, the shared responsibility model, monitoring, analytics, cloud migration, and AWS cost management tools such as AWS Budgets, Cost Explorer, and Pricing Calculator.
                The course also introduced me to the AWS Well-Architected Framework and the fundamentals of Artificial Intelligence, Machine Learning, and Generative AI offered by AWS.',
                'issued_date' => '2025-05-06',
                'expiration_date' => Carbon::parse('2025-05-06')->addYears(3)->format('Y-m-d'),
                'credential_id' => 'QLZ93590MZ5D',
                'credential_url' => 'https://www.dicoding.com/certificates/QLZ93590MZ5D',
                'image' => fake()->imageUrl(),
            ]
        ];

        foreach ($certificateData as $data) {
            CertificateData::create($data);
        }
    }
}
