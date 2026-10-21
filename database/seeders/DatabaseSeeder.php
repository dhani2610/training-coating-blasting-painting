<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Statistic;
use App\Models\Program;
use App\Models\Article;
use App\Models\Faq;
use App\Services\CoatingBlastingPaintingSchemeService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // 1. Super Admin User
        User::updateOrCreate(
            ['email' => 'admin@jasa-coating-blasting-painting.com'],
            [
                'name' => 'Administrator Jasa Coating Blasting Painting',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings
        $settings = [
            'site_name' => 'Jasa Coating Blasting Painting',
            'site_tagline' => 'Pusat Layanan Jasa Protective Coating, Sandblasting, dan Industrial Painting di Indonesia',
            'company_name' => 'Lembaga Jasa Coating Blasting Painting Indonesia',
            'license_info' => 'Standar Mutu SSPC, NACE / AMPP, ISO 8501-1, ISO 12944, & Kualifikasi Profesional Terakreditasi',
            'whatsapp' => '081399810272', // Main WA Utama (Highlighted)
            'whatsapp_detail_1' => '08118500177',
            'whatsapp_detail_2' => '081399810272',
            'whatsapp_detail_3' => '087894580806',
            'whatsapp_detail_4' => '087894580649',
            'email' => 'kontak@jasa-coating-blasting-painting.com',
            'email_secondary' => 'info@jasa-coating-blasting-painting.com',
            'phone' => '081399810272',
            'address' => 'Sentra Industri Proteksi Korosi & Fasilitas Workshop Jasa Coating Blasting Painting Indonesia, Jakarta',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28298835848!2d106.759478!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e498c0a531%3A0x7d87f7b2c0e86b0a!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
            'office_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB | Hotline Layanan Konsultasi Teknis & WA: 24 Jam',
            'hero_title' => 'Pusat Layanan Jasa Coating Blasting Painting Terkemuka di Indonesia',
            'hero_description' => 'Spesialis Pengerjaan Operator Blasting Sa 2.5 Sa 3, Aplikator Protective Coating, Coating Inspector QC Berstandar SSPC NACE ISO 12944, serta Layanan Jasa Abrasive Sandblasting & Pelapisan Proteksi Korosi Industri.',
            'about_history' => 'Lembaga Jasa Coating Blasting Painting didirikan oleh asosiasi praktisi senior spesialis proteksi korosi, coating inspector berstandar internasional (NACE / AMPP dan SSPC), serta engineer material permukaan terkemuka di Indonesia. Kami berdedikasi mentransformasikan keahlian preparasi permukaan dan pengecatan industri menuju standar mutu tertinggi. Kami telah melayani dan menuntaskan lebih dari 1.800 proyek industri di 38 provinsi di Indonesia yang mencakup sektor galangan kapal maritim, kilang minyak dan gas, pabrik petrokimia, pertambangan, fabrikasi baja berat, dan infrastruktur strategis nasional.',
            'about_vision' => 'Menjadi pusat keunggulan nasional dan mitra strategis industri terpercaya dalam standarisasi mutu inspeksi pelapisan (coating inspection) dan penyediaan jasa coating blasting painting berdaya saing internasional.',
            'about_mission' => "1. Menyediakan layanan jasa Operator Blasting, Aplikator Protective Coating, dan Coating Inspector berstandar internasional (SSPC, NACE/AMPP, ISO 8501, ISO 12944).\n2. Memberikan layanan jasa preparasi permukaan (dry abrasive blasting, hydroblasting) dan aplikasi protective coating industri dengan kontrol kualitas mutu yang presisi.\n3. Menegakkan budaya keselamatan kerja (K3) tinggi dalam operasional blasting painting, termasuk penggunaan APD helm blasting, respirator suplai udara, dan pengendalian bahaya ruang terbatas.\n4. Mendukung keandalan dan integritas aset industri nasional (*asset integrity*) melalui pencegahan degradasi korosi jangka panjang yang efisien dan berkelanjutan.",
            'floating_wa_text' => 'Halo Admin Utama Jasa Coating Blasting Painting, saya ingin konsultasi pengerjaan proyek dan penawaran teknis jasa blasting painting.'
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Statistics
        $statistics = [
            [
                'key' => 'proyek_industri',
                'label' => 'Proyek Industri Selesai',
                'value' => '1.800+',
                'icon' => 'bi-check-circle-fill',
                'description' => 'Pekerjaan Blasting, Protective Coating, & Inspeksi Mutu',
                'sort_order' => 1
            ],
            [
                'key' => 'standar_mutu',
                'label' => 'Kepatuhan Standar Teknis',
                'value' => '100%',
                'icon' => 'bi-patch-check-fill',
                'description' => 'Standar Internasional SSPC, NACE / AMPP, ISO 8501, ISO 12944, & ASTM',
                'sort_order' => 2
            ],
            [
                'key' => 'jangkauan_provinsi',
                'label' => 'Jangkauan Wilayah Layanan',
                'value' => '38',
                'icon' => 'bi-geo-alt-fill',
                'description' => 'Provinsi Layanan Pengerjaan Proyek Industri di Seluruh Indonesia',
                'sort_order' => 3
            ],
            [
                'key' => 'mitra_industri',
                'label' => 'Perusahaan & Galangan Mitra Binaan',
                'value' => '500+',
                'icon' => 'bi-trophy-fill',
                'description' => 'Galangan Kapal, Kilang Petrokimia, Fabrikasi Baja, & Fasilitas Migas',
                'sort_order' => 4
            ]
        ];

        foreach ($statistics as $stat) {
            Statistic::updateOrCreate(['key' => $stat['key']], $stat);
        }

        // 4. Programs (Layanan Jasa) Seeding from CoatingBlastingPaintingSchemeService
        $programs = CoatingBlastingPaintingSchemeService::getMasterPrograms();
        foreach ($programs as $index => $prog) {
            Program::updateOrCreate(
                ['slug' => $prog['slug']],
                [
                    'title' => $prog['title'],
                    'level_name' => $prog['level_name'] ?? 'Layanan Jasa Coating Blasting Painting Resmi',
                    'level_code' => $prog['level_code'] ?? 'Blasting & Painting',
                    'badge' => $prog['badge'] ?? 'Layanan Unggulan',
                    'duration' => $prog['duration'] ?? 'Kontrak Proyek Fleksibel',
                    'method' => $prog['method'] ?? 'Pengerjaan Lapangan Berstandar Internasional',
                    'certification' => $prog['certification'] ?? 'Kualifikasi Mutu Berstandar SSPC / NACE',
                    'price_note' => $prog['price_note'] ?? 'Hubungi Tim Konsultan Teknis & Estimator Proyek',
                    'target_audience' => $prog['target_audience'] ?? '',
                    'requirements' => json_encode($prog['requirements'] ?? []),
                    'curriculum' => json_encode($prog['curriculum'] ?? []),
                    'facilities' => json_encode($prog['facilities'] ?? []),
                    'short_description' => $prog['short_description'] ?? '',
                    'full_description' => $prog['overview'] ?? ($prog['short_description'] ?? ''),
                    'image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&auto=format&fit=crop&q=80',
                    'is_active' => true,
                    'sort_order' => $index + 1
                ]
            );
        }

        // 5. Featured Articles (Homepage & All Catalog)
        $articles = [
            [
                'title' => 'Layanan Jasa Operator Abrasive Blasting: Standar Kebersihan Sa 2.5 Sa 3 dan Pengaturan Tekanan Nozzle Venturi',
                'slug' => 'jasa-operator-abrasive-blasting-standar-kebersihan-sa-2-5-sa-3-dan-pengaturan-tekanan-nozzle-venturi',
                'category' => 'Abrasive Blasting & Preparasi Sa 2.5',
                'author' => 'Lead Coating Inspector & Corrosion Protection Specialist',
                'read_time' => 28,
                'views_count' => 6240,
                'is_featured' => true,
                'is_published' => true,
                'featured_image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Panduan komprehensif pengerjaan operator abrasive blasting profesional. Penguasaan blast pot, pemilihan media garnet steel grit, standar ISO 8501-1, dan keselamatan kerja.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Layanan Jasa Operator Abrasive Blasting: Standar Kebersihan Sa 2.5 Sa 3 dan Pengaturan Tekanan Nozzle Venturi', 'Indonesia')['content']
            ],
            [
                'title' => 'Layanan Jasa Aplikator Protective Coating: Teknik Airless Spray, Pengukuran WFT DFT dan Pencegahan Cacat Pelapisan',
                'slug' => 'jasa-aplikator-protective-coating-teknik-airless-spray-pengukuran-wft-dft-dan-pencegahan-cacat-pelapisan',
                'category' => 'Protective Coating & Industrial Painting',
                'author' => 'Lead Coating Inspector & Corrosion Protection Specialist',
                'read_time' => 26,
                'views_count' => 5890,
                'is_featured' => true,
                'is_published' => true,
                'featured_image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Pengerjaan aplikator cat pelindung industri. Polimer epoxy, polyurethane, teknik semprot airless spray gun rasio 45:1 hingga 68:1, dan uji ketebalan film kering SSPC-PA 2.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Layanan Jasa Aplikator Protective Coating: Teknik Airless Spray, Pengukuran WFT DFT dan Pencegahan Cacat Pelapisan', 'Indonesia')['content']
            ],
            [
                'title' => 'Layanan Jasa Coating Inspector Quality Control: Metodologi Uji Adhesi Pull-Off ASTM D4541 dan Deteksi Holiday NACE SP0188',
                'slug' => 'jasa-coating-inspector-quality-control-metodologi-uji-adhesi-pull-off-astm-d4541-dan-deteksi-holiday-nace-sp0188',
                'category' => 'Coating Inspection QC & Pengujian Mutu',
                'author' => 'Lead Coating Inspector & Corrosion Protection Specialist',
                'read_time' => 25,
                'views_count' => 4520,
                'is_featured' => true,
                'is_published' => true,
                'featured_image' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Layanan inspeksi kualitas cat proteksi korosi. Pengujian daya rekat hidrolik dolly, uji kontinuitas lapisan spark tester tegangan tinggi, dan bresle test klorida garam terlarut.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Layanan Jasa Coating Inspector Quality Control: Metodologi Uji Adhesi Pull-Off ASTM D4541 dan Deteksi Holiday NACE SP0188', 'Indonesia')['content']
            ],
            [
                'title' => 'Layanan Jasa Sandblasting Pelapisan Tangki Timbun dan Perpipaan Minyak Gas Sesuai Standar ISO 12944',
                'slug' => 'jasa-sandblasting-pelapisan-tangki-timbun-dan-perpipaan-minyak-gas-sesuai-standar-iso-12944',
                'category' => 'Internal Lining Tangki & Bejana Tekan',
                'author' => 'Lead Coating Inspector & Corrosion Protection Specialist',
                'read_time' => 30,
                'views_count' => 5120,
                'is_featured' => true,
                'is_published' => true,
                'featured_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Aplikasi internal lining tangki penyimpanan bahan bakar dan pipa transmisi fluida korosif. Pengendalian kelembaban dehumidifier di ruang terbatas dan penjaminan mutu lapisan bebas pinhole.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Layanan Jasa Sandblasting Pelapisan Tangki Timbun dan Perpipaan Minyak Gas Sesuai Standar ISO 12944', 'Indonesia')['content']
            ],
            [
                'title' => 'Layanan Jasa K3 Keselamatan Kerja Blasting Painting: Perlindungan Saluran Pernafasan Helm Blasting dan Mitigasi Bahaya Silikosis',
                'slug' => 'jasa-k3-keselamatan-kerja-blasting-painting-perlindungan-saluran-pernafasan-helm-blasting-dan-mitigasi-bahaya-silikosis',
                'category' => 'K3 Blasting Painting & Ruang Terbatas',
                'author' => 'Lead Coating Inspector & Corrosion Protection Specialist',
                'read_time' => 22,
                'views_count' => 3890,
                'is_featured' => true,
                'is_published' => true,
                'featured_image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Protokol keselamatan kerja ketat bagi personel blasting painting. Filtrasi udara pernafasan grade D, pakaian tahan pantulan pasir abrasif, pelindung pendengaran ganda, dan sirkulasi udara tangki.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Layanan Jasa K3 Keselamatan Kerja Blasting Painting: Perlindungan Saluran Pernafasan Helm Blasting dan Mitigasi Bahaya Silikosis', 'Indonesia')['content']
            ]
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }

        // 6. FAQs
        $faqs = [
            [
                'question' => 'Apa saja cakupan layanan utama dalam Jasa Coating Blasting Painting ini?',
                'answer' => 'Lembaga kami menyediakan 8 pilar layanan jasa proteksi korosi berstandar nasional dan internasional: 1) Jasa Operator Abrasive Blasting (Dry Blasting Sa 2.5 & Sa 3); 2) Jasa Aplikator Protective Coating & Industrial Painting; 3) Jasa Coating Inspector QA/QC (Pengawasan & Pengujian Mutu); 4) Jasa Hydroblasting & UHP Waterjetting (Bebas Debu Pasir); 5) Jasa Internal Lining Tangki Timbun & Bejana Tekan; 6) Jasa Pipe Coating, Field Joint Coating & Wrapping Pipa; 7) Jasa Hot-Dip Galvanizing & Thermal Spray Metalizing; serta 8) Jasa K3 & Supervisi Blasting Painting Ruang Terbatas.',
                'sort_order' => 1
            ],
            [
                'question' => 'Apakah layanan jasa ini melayani pengerjaan proyek langsung di lokasi fasilitas industri/galangan kapal klien?',
                'answer' => 'Ya, kami melayani pengerjaan langsung di lokasi proyek (on-site project execution) baik di darat (onshore) maupun anjungan lepas pantai (offshore), fasilitas galangan dock kapal, pabrik kelapa sawit, kilang petrokimia, pembangkit listrik, dan jalur perpipaan di seluruh 38 provinsi di Indonesia.',
                'sort_order' => 2
            ],
            [
                'question' => 'Standar internasional apa saja yang menjadi acuan dalam pengerjaan dan inspeksi mutu pelapisan?',
                'answer' => 'Seluruh prosedur operasional lapangan dan kendali mutu kami berpedoman penuh pada standar internasional utama: SSPC (The Society for Protective Coatings) dan NACE International (kini AMPP), standar ISO 8501-1 (tingkat kebersihan Sa 1, Sa 2, Sa 2.5, Sa 3), ISO 12944 (kategori korosivitas lingkungan C1 hingga CX), serta metode uji ASTM Internasional (ASTM D4417, ASTM D4541, ASTM D3359).',
                'sort_order' => 3
            ],
            [
                'question' => 'Apa perbedaan antara tingkat kebersihan Sa 2.5 (Near-White Metal) dan Sa 3 (White Metal)?',
                'answer' => 'Berdasarkan ISO 8501-1 dan SSPC-SP 10 (Sa 2.5), permukaan logam harus bebas dari minyak, oli, gemuk, kerak giling (mill scale), dan karat kasat mata, dengan sisa noda bayangan diperbolehkan maksimal 5% dari setiap luasan unit permukaan. Sedangkan pada Sa 3 atau SSPC-SP 5 (White Metal), permukaan baja harus 100% bersih mutlak berwarna putih keabu-abuan logam tanpa noda atau bayangan sedikit pun, umumnya dipersyaratkan untuk fasilitas imersi terendam air laut terus-menerus dan lingkungan kimia yang sangat agresif.',
                'sort_order' => 4
            ],
            [
                'question' => 'Bagaimana instrumen uji kendali mutu yang digunakan selama pengerjaan proyek?',
                'answer' => 'Tim teknis kami dilengkapi instrumen inspeksi presisi terkini seperti: Testex Replica Tape Press-O-Film & Digital Spring Micrometer (uji profil kekasaran), Sling Psychrometer & Dew Point Calculator (iklim lingkungan), Magnetic Surface Thermometer, Wet Film Thickness (WFT) Comb, Digital Magnetic DFT Gauge (SSPC-PA 2), Cross-Hatch Cutter & Hydraulic Dolly Pull-Off Adhesion Tester (ASTM D4541), Bresle Patch Chloride Test Kit (ISO 8502-6/9), serta Wet Sponge & High Voltage Spark Holiday Detector (NACE SP0188).',
                'sort_order' => 5
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        Schema::enableForeignKeyConstraints();
    }
}
