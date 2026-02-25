<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data first
        Service::truncate();
        
        $services = [
            [
                'title' => 'Service Komputer & Laptop',
                'slug' => 'service-komputer-laptop',
                'short_description' => 'Perbaikan hardware, instalasi software, optimasi kecepatan untuk semua merek.',
                'full_description' => 'Layanan service komputer dan laptop profesional di rumah Anda. Kami menangani berbagai masalah hardware dan software, instalasi ulang, upgrade performa, dan pembersihan virus. Teknisi bersertifikat akan datang ke lokasi Anda dengan peralatan lengkap.',
                'estimated_price' => 'Rp 150.000',
                'price_note' => 'Harga dapat bervariasi tergantung kerusakan dan suku cadang',
                'icon_url' => 'computer',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Instalasi WiFi Rumah',
                'slug' => 'instalasi-wifi-rumah',
                'short_description' => 'Setup WiFi lengkap dengan optimasi sinyal untuk seluruh rumah.',
                'full_description' => 'Jasa instalasi dan setup jaringan WiFi untuk rumah dan kantor kecil. Kami melakukan survey lokasi, instalasi kabel, konfigurasi router, dan optimasi cakupan sinyal agar semua ruangan mendapat koneksi yang stabil.',
                'estimated_price' => 'Rp 500.000',
                'price_note' => 'Belum termasuk harga router dan perangkat jaringan',
                'icon_url' => 'wifi',
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Hapus Virus & Malware',
                'slug' => 'hapus-virus-malware',
                'short_description' => 'Pembersihan total dari virus, malware, dan ransomware.',
                'full_description' => 'Layanan pembersihan virus, malware, spyware, dan ransomware dari komputer/laptop Anda. Kami juga akan menginstal software antivirus dan memberikan saran keamanan untuk mencegah infeksi di masa depan.',
                'estimated_price' => 'Rp 350.000',
                'price_note' => 'Termasuk instalasi antivirus gratis',
                'icon_url' => 'security',
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'Backup & Recovery Data',
                'slug' => 'backup-recovery-data',
                'short_description' => 'Penyelamatan data hilang dan setup backup otomatis.',
                'full_description' => 'Layanan recovery data dari hardisk yang rusak, terformat, atau terinfeksi virus. Kami juga menyediakan setup sistem backup otomatis untuk melindungi data penting Anda di masa depan.',
                'estimated_price' => 'Rp 300.000',
                'price_note' => 'Tingkat keberhasilan tergantung kondisi media penyimpanan',
                'icon_url' => 'backup',
                'is_active' => true,
                'display_order' => 4,
            ],
            [
                'title' => 'Setup Smart Home',
                'slug' => 'setup-smart-home',
                'short_description' => 'Instalasi perangkat smart home dan otomatisasi.',
                'full_description' => 'Jasa instalasi dan konfigurasi perangkat smart home seperti smart light, smart camera, smart door lock, dan perangkat IoT lainnya. Kami juga setup otomatisasi sesuai kebutuhan Anda.',
                'estimated_price' => 'Rp 400.000',
                'price_note' => 'Belum termasuk harga perangkat smart home',
                'icon_url' => 'home',
                'is_active' => true,
                'display_order' => 5,
            ],
            [
                'title' => 'Konsultasi IT Gratis',
                'slug' => 'konsultasi-it-gratis',
                'short_description' => 'Konsultasi gratis untuk solusi IT terbaik Anda.',
                'full_description' => 'Dapatkan konsultasi gratis dari tim ahli IT kami. Kami akan membantu menganalisis kebutuhan teknologi Anda dan memberikan rekomendasi solusi terbaik yang sesuai dengan budget.',
                'estimated_price' => 'Gratis',
                'price_note' => 'Konsultasi via WhatsApp/Telepon',
                'icon_url' => 'consult',
                'is_active' => true,
                'display_order' => 6,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create(array_merge($serviceData, [
                'scope' => json_encode([]),
            ]));
        }

        $this->command->info('✅ Service data seeded successfully!');
        $this->command->info('📝 All prices are in Rupiah (Rp) format only.');
    }
}
