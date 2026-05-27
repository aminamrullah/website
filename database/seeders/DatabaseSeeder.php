<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Setting;
use App\Models\Program;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::firstOrCreate(
            ['email' => 'admin@fatkhululum.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Settings (Pengaturan Website)
        $settings = [
            'hero_title' => 'Mencetak Generasi Rabbani',
            'hero_subtitle' => 'Berilmu, Beramal, dan Berakhlakul Karimah. Mari bergabung bersama Pesantren Fatkhul Ulum OKI Timur.',
            'about_title' => 'Sejarah & Visi Misi',
            'about_content' => '<p>Pesantren Fatkhul Ulum didirikan dengan semangat untuk menyebarkan agama Islam dan mencetak kader-kader ulama yang berwawasan luas, mandiri, dan mampu menjawab tantangan zaman.</p><p>Kami memadukan kurikulum pesantren salaf dengan pendidikan modern sehingga para santri tidak hanya menguasai ilmu agama (tafaqquh fiddin) tetapi juga ilmu pengetahuan umum.</p>',
            'about_features' => "Kurikulum Terpadu\nTenaga Pendidik Profesional\nLingkungan Asri dan Nyaman\nFasilitas Lengkap",
            'contact_title' => 'Hubungi Kami',
            'contact_subtitle' => 'Punya pertanyaan atau ingin mendaftar? Jangan ragu untuk menghubungi kami.',
            'address' => 'Jl. Lintas Timur, OKI Timur, Sumatera Selatan',
            'phone' => '+62 812-3456-7890',
            'email' => 'info@fatkhululum.com',
            'google_maps_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127606.58784196149!2d104.5936355!3d-4.2234035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e389e1c31f4007d%3A0xc3b86927d6d9c61!2sOgan%20Komering%20Ilir%20Regency%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1716500000000!5m2!1sen!2sid" width="100%" height="250" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ];

        foreach ($settings as $key => $value) {
            Setting::firstOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // 3. Program Pendidikan
        $programs = [
            [
                'title' => 'Madrasah Tsanawiyah (MTs)',
                'description' => 'Pendidikan menengah pertama setingkat SMP dengan penekanan pada dasar-dasar ilmu agama dan tahfidz Quran.',
                'icon' => 'fa-solid fa-school'
            ],
            [
                'title' => 'Madrasah Aliyah (MA)',
                'description' => 'Pendidikan menengah atas dengan kajian kitab kuning yang lebih mendalam serta persiapan menuju perguruan tinggi.',
                'icon' => 'fa-solid fa-graduation-cap'
            ],
            [
                'title' => 'Madrasah Diniyah',
                'description' => 'Fokus khusus pada pengkajian kitab-kitab salaf (kitab kuning) mulai dari ilmu nahwu, sharaf, fiqih, hingga tafsir.',
                'icon' => 'fa-solid fa-book-open-reader'
            ],
            [
                'title' => 'Tahfidzul Qur\'an',
                'description' => 'Program khusus bagi santri yang ingin fokus menghafal Al-Qur\'an dengan metode yang efektif dan sanad yang bersambung.',
                'icon' => 'fa-solid fa-quran'
            ]
        ];

        foreach ($programs as $program) {
            Program::firstOrCreate(
                ['title' => $program['title']],
                $program
            );
        }

        // 4. Contoh Berita
        Article::firstOrCreate(
            ['title' => 'Penerimaan Santri Baru Tahun Ajaran 2026/2027'],
            [
                'slug' => Str::slug('Penerimaan Santri Baru Tahun Ajaran 2026/2027'),
                'content' => '<p>Alhamdulillah, Pesantren Fatkhul Ulum resmi membuka pendaftaran santri baru untuk tahun ajaran 2026/2027. Kami mengajak putra-putri terbaik untuk bergabung dan menuntut ilmu bersama kami.</p><p>Pendaftaran dibuka mulai bulan ini hingga kuota terpenuhi.</p>',
                'is_published' => true,
            ]
        );
    }
}
