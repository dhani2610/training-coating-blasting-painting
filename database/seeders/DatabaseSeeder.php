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
use Illuminate\Support\Str;

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
            ['email' => 'admin@trainingcoatingblastingpainting.my.id'],
            [
                'name' => 'Administrator Training Coating Blasting Painting',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings
        $settings = [
            'site_name' => 'Training Coating Blasting Painting',
            'site_tagline' => 'Pusat Pelatihan & Sertifikasi Protective Coating, Sandblasting, dan Industrial Painting di Indonesia',
            'company_name' => 'Lembaga Training Coating Blasting Painting Indonesia',
            'license_info' => 'Standar Pelatihan & Akreditasi Sertifikasi SSPC, NACE / AMPP, ISO 8501-1, ISO 12944, & Kualifikasi Profesional',
            'whatsapp' => '081399810272', // Main WA Utama (Highlighted)
            'whatsapp_detail_1' => '08118500177',
            'whatsapp_detail_2' => '081399810272',
            'whatsapp_detail_3' => '087894580806',
            'whatsapp_detail_4' => '087894580649',
            'email' => 'kontak@trainingcoatingblastingpainting.my.id',
            'email_secondary' => 'info@trainingcoatingblastingpainting.my.id',
            'phone' => '081399810272',
            'address' => 'Pusat Workshop Pelatihan & Laboratorium Uji Training Coating Blasting Painting Indonesia, Jakarta',
            'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28298835848!2d106.759478!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e498c0a531%3A0x7d87f7b2c0e86b0a!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid',
            'office_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB | Hotline Konsultasi Pendaftaran & WA: 24 Jam',
            'hero_title' => 'Pusat Pelatihan & Sertifikasi Training Coating Blasting Painting di Indonesia',
            'hero_description' => 'Program Training & Sertifikasi Operator Blasting Sa 2.5 Sa 3, Aplikator Protective Coating, Coating Inspector QC Berstandar SSPC NACE ISO 12944, serta Workshop Praktikum Abrasive Blasting Terakreditasi.',
            'about_history' => 'Lembaga Training Coating Blasting Painting didirikan oleh asosiasi praktisi senior dan instruktur master spesialis proteksi korosi, coating inspector berstandar internasional (NACE / AMPP dan SSPC), serta engineer material permukaan terkemuka di Indonesia. Kami berdedikasi mentransformasikan kompetensi juru semprot pasir dan aplikator cat industri menuju standar mutu tertinggi. Kami telah melatih dan meluluskan lebih dari 3.800 peserta dari berbagai sektor industri di 38 provinsi di Indonesia yang mencakup galangan kapal maritim, kilang minyak dan gas, pabrik petrokimia, pertambangan, fabrikasi baja berat, dan infrastruktur strategis nasional.',
            'about_vision' => 'Menjadi pusat keunggulan pelatihan nasional dan mitra terpercaya industri dalam mencetak tenaga ahli proteksi korosi dan coating inspector berdaya saing internasional.',
            'about_mission' => "1. Menyelenggarakan program Training Operator Blasting, Aplikator Protective Coating, dan Coating Inspector berstandar internasional (SSPC, NACE/AMPP, ISO 8501, ISO 12944).\n2. Memfasilitasi workshop praktikum hands-on dry abrasive blasting, hydroblasting, dan aplikasi airless spray dengan kontrol kualitas mutu yang presisi.\n3. Menanamkan budaya keselamatan kerja (K3) tinggi dalam operasional blasting painting, termasuk penggunaan APD helm blasting suplai udara dan pengendalian bahaya ruang terbatas.\n4. Mendukung keandalan dan integritas aset industri nasional melalui ketersediaan personel pelapisan pelindung yang bersertifikat kompetensi resmi.",
            'floating_wa_text' => 'Halo Admin Utama Training Coating Blasting Painting, saya ingin konsultasi pendaftaran pelatihan sertifikasi coating blasting painting.',
            'whatsapp_template' => 'Halo Admin Utama Training Coating Blasting Painting, saya ingin konsultasi pendaftaran pelatihan dan sertifikasi coating blasting painting untuk wilayah {region}. Mohon info jadwal batch terbaru dan silabus teknis.'
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Statistics
        $statistics = [
            [
                'key' => 'alumni_peserta',
                'label' => 'Alumni & Peserta Tersertifikasi',
                'value' => '3.800+',
                'icon' => 'bi-mortarboard-fill',
                'description' => 'Alumni Operator Blasting, Aplikator Cat, & Coating Inspector QA/QC',
                'sort_order' => 1
            ],
            [
                'key' => 'standar_mutu',
                'label' => 'Kepatuhan Standar Internasional',
                'value' => '100%',
                'icon' => 'bi-patch-check-fill',
                'description' => 'Standar Akreditasi SSPC, NACE / AMPP, ISO 8501, ISO 12944, & ASTM',
                'sort_order' => 2
            ],
            [
                'key' => 'jangkauan_provinsi',
                'label' => 'Jangkauan Wilayah Pelatihan',
                'value' => '38',
                'icon' => 'bi-geo-alt-fill',
                'description' => 'Provinsi Penyelenggaraan Public Training & In-House Corporate di Indonesia',
                'sort_order' => 3
            ],
            [
                'key' => 'mitra_industri',
                'label' => 'Perusahaan & Galangan Pengirim Peserta',
                'value' => '500+',
                'icon' => 'bi-building-check',
                'description' => 'Galangan Kapal, Kilang Petrokimia, Fabrikator Baja, & Kontraktor Migas',
                'sort_order' => 4
            ]
        ];

        foreach ($statistics as $stat) {
            Statistic::updateOrCreate(['key' => $stat['key']], $stat);
        }

        // 4. Programs (Training Schemes) Seeding from CoatingBlastingPaintingSchemeService
        $programs = CoatingBlastingPaintingSchemeService::getMasterPrograms();
        foreach ($programs as $index => $prog) {
            Program::updateOrCreate(
                ['slug' => $prog['slug']],
                [
                    'title' => $prog['title'],
                    'code' => $prog['level_code'] ?? 'CBP-' . ($index + 1),
                    'level_name' => $prog['level_name'] ?? 'Training & Sertifikasi Profesi Resmi',
                    'level_code' => $prog['level_code'] ?? 'Blasting & Painting',
                    'badge' => $prog['badge'] ?? 'Program Unggulan',
                    'duration' => $prog['duration'] ?? '3 - 4 Hari (Teori & Praktik)',
                    'method' => $prog['method'] ?? 'Tatap Muka Workshop Offline & Praktik Hands-on',
                    'certification' => $prog['certification'] ?? 'Sertifikasi Kompetensi Berstandar SSPC / NACE',
                    'price_note' => $prog['price_note'] ?? 'Hubungi Tim Konsultan Pendaftaran & Customer Care',
                    'target_audience' => $prog['target_audience'] ?? '',
                    'requirements' => $prog['requirements'] ?? [],
                    'curriculum' => $prog['curriculum'] ?? [],
                    'facilities' => $prog['facilities'] ?? [],
                    'short_description' => $prog['short_description'],
                    'full_description' => $prog['overview'],
                    'sort_order' => $index + 1,
                    'is_featured' => true,
                    'is_active' => true,
                ]
            );
        }

        // 5. Sample Articles
        $sampleArticles = [
            [
                'title' => 'Training Operator Abrasive Blasting Standar Kebersihan Sa 2.5 Sa 3 dan Pengaturan Tekanan Nozzle Venturi',
                'slug' => 'training-operator-abrasive-blasting-standar-kebersihan-sa-2-5-sa-3-dan-pengaturan-tekanan-nozzle-venturi',
                'category' => 'Teknik Blasting & Preparasi',
                'author' => 'Tim Instruktur Master Blasting',
                'read_time' => 12,
                'excerpt' => 'Panduan komprehensif pelatihan operator abrasive blasting. Memahami standar visual ISO 8501-1, kalkulasi tekanan 100 PSI nozzle venturi, seleksi garnet mesh 30/60, dan profil jangkar 50-85 mikron.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Training Operator Abrasive Blasting Standar Kebersihan Sa 2.5 Sa 3 dan Pengaturan Tekanan Nozzle Venturi', 'Indonesia')['content']
            ],
            [
                'title' => 'Training Aplikator Protective Coating Industri: Pengoperasian Pompa Airless Spray dan Kepatuhan Aturan SSPC-PA 2',
                'slug' => 'training-aplikator-protective-coating-industri-pengoperasian-pompa-airless-spray-dan-kepatuhan-aturan-sspc-pa-2',
                'category' => 'Aplikasi Cat Industri',
                'author' => 'Instruktur Protective Coating',
                'read_time' => 14,
                'excerpt' => 'Materi pelatihan aplikator cat industri bertekanan tinggi. Pengoperasian pompa airless 68:1, pengukuran WFT, verifikasi DFT aturan 80-20 SSPC-PA 2, dan teknik stripe coating sudut las.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Training Aplikator Protective Coating Industri: Pengoperasian Pompa Airless Spray dan Kepatuhan Aturan SSPC-PA 2', 'Indonesia')['content']
            ],
            [
                'title' => 'Training Coating Inspector QA/QC: Pengujian Bresle Patch Chloride Test dan Holiday Pinhole Detection NACE SP0188',
                'slug' => 'training-coating-inspector-qc-pengujian-bresle-patch-chloride-test-dan-holiday-pinhole-detection-nace-sp0188',
                'category' => 'Inspeksi Mutu QA/QC',
                'author' => 'Coating Inspector Senior NACE',
                'read_time' => 15,
                'excerpt' => 'Modul pelatihan inspektur mutu pelapisan. Prosedur ekstraksi garam klorida ISO 8502-6, pengujian kebocoran dielektrik holiday detector, dan uji kekuatan adhesi hidrolik ASTM D4541.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Training Coating Inspector QA/QC: Pengujian Bresle Patch Chloride Test dan Holiday Pinhole Detection NACE SP0188', 'Indonesia')['content']
            ],
            [
                'title' => 'Training Hydroblasting & UHP Waterjetting 40.000 PSI: Pencegahan Flash Rusting dan Standar Kebersihan ISO 8501-4',
                'slug' => 'training-hydroblasting-uhp-waterjetting-40000-psi-pencegahan-flash-rusting-dan-standar-kebersihan-iso-8501-4',
                'category' => 'Hydroblasting UHP',
                'author' => 'Spesialis Waterjetting UHP',
                'read_time' => 11,
                'excerpt' => 'Pelatihan pembersihan permukaan tanpa debu pasir menggunakan jet air ultra tinggi. Evaluasi visual Wa 1 hingga Wa 3, penambahan inhibitor korosi, dan keselamatan APD kevlar 2800 bar.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Training Hydroblasting & UHP Waterjetting 40.000 PSI: Pencegahan Flash Rusting dan Standar Kebersihan ISO 8501-4', 'Indonesia')['content']
            ],
            [
                'title' => 'Training K3 Keselamatan Kerja Blasting Painting: Perlindungan Saluran Pernafasan Helm Blasting dan Mitigasi Bahaya Silikosis',
                'slug' => 'training-k3-keselamatan-kerja-blasting-painting-perlindungan-saluran-pernafasan-helm-blasting-dan-mitigasi-bahaya-silikosis',
                'category' => 'Keselamatan K3 Industri',
                'author' => 'Lead Auditor K3 & HSE Specialist',
                'read_time' => 13,
                'excerpt' => 'Protokol keselamatan kerja ketat bagi personel blasting painting. Filtrasi udara pernafasan grade D, pakaian tahan pantulan pasir abrasif, pelindung pendengaran ganda, dan sirkulasi udara tangki.',
                'content' => CoatingBlastingPaintingSchemeService::generateDeepArticle('Training K3 Keselamatan Kerja Blasting Painting: Perlindungan Saluran Pernafasan Helm Blasting dan Mitigasi Bahaya Silikosis', 'Indonesia')['content']
            ]
        ];

        foreach ($sampleArticles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }

        // 6. FAQs
        $faqs = [
            [
                'question' => 'Apa saja program utama dalam Training Coating Blasting Painting ini?',
                'answer' => 'Lembaga kami menyelenggarakan 8 program training dan sertifikasi kompetensi berstandar internasional: 1) Training Operator Abrasive Blasting (Dry Blasting Sa 2.5 & Sa 3); 2) Training Aplikator Protective Coating & Industrial Painting; 3) Training Coating Inspector QA/QC (Pengawasan & Pengujian Mutu NACE/SSPC); 4) Training Hydroblasting & UHP Waterjetting (Bebas Debu Pasir); 5) Training Internal Tank Lining & Bejana Tekan; 6) Training Pipe Coating, Field Joint & Wrapping Pipa; 7) Training Hot-Dip Galvanizing & Thermal Spray Metalizing (TSA); serta 8) Training K3 & Supervisi Blasting Painting Ruang Terbatas.',
                'sort_order' => 1
            ],
            [
                'question' => 'Apakah tersedia skema pelatihan In-House Training langsung di lokasi perusahaan/galangan kapal?',
                'answer' => 'Ya, kami melayani program In-House Corporate Training di lokasi fasilitas industri, pabrik, galangan dock kapal, kilang petrokimia, dan area proyek di seluruh 38 provinsi di Indonesia. Materi kurikulum dan durasi dapat disesuaikan secara khusus dengan spesifikasi teknis dan sistem cat yang diterapkan di perusahaan Anda.',
                'sort_order' => 2
            ],
            [
                'question' => 'Standar internasional apa saja yang menjadi acuan kurikulum pelatihan ini?',
                'answer' => 'Seluruh materi kurikulum, metodologi praktikum, dan kriteria penilaian kami berpedoman penuh pada standar internasional terdepan: SSPC (The Society for Protective Coatings) dan NACE International (kini AMPP), ISO 8501-1 (standar visual kebersihan substrat Sa 1 hingga Sa 3), ISO 12944 (klasifikasi korosivitas lingkungan C1 hingga CX), serta metode uji ASTM Internasional (ASTM D4417, ASTM D4541, ASTM D3359).',
                'sort_order' => 3
            ],
            [
                'question' => 'Berapa lama durasi pelatihan dan bagaimana proporsi antara teori dan praktik?',
                'answer' => 'Durasi pelatihan reguler berkisar antara 3 hingga 5 hari tergantung pada jenjang program yang dipilih. Pelatihan dirancang dengan proporsi 40% pemahaman teori ilmiah & standar teknis serta 60% praktikum hands-on intensif di workshop dan laboratorium uji mutu menggunakan peralatan bertekanan nyata.',
                'sort_order' => 4
            ],
            [
                'question' => 'Fasilitas apa saja yang diperoleh peserta selama mengikuti pelatihan?',
                'answer' => 'Setiap peserta mendapatkan sertifikat kompetensi resmi, modul buku materi lengkap, safety pocket guide, perlengkapan APD praktikum (helm blasting suplai udara, wearpack, sarung tangan), akses pengujian instrumen laboratorium (PosiTector, Bresle kit, holiday detector, pull-off tester), konsumsi lengkap (makan siang dan 2x coffee break), serta keanggotaan jaringan alumni praktisi proteksi korosi nasional.',
                'sort_order' => 5
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        Schema::enableForeignKeyConstraints();
    }
}
