<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing articles first
        Article::truncate();

        $articles = [
            [
                'title' => '5 Cara Merawat Laptop Agar Awet dan Tahan Lama',
                'slug' => '5-cara-merawat-laptop-agar-awet',
                'excerpt' => 'Laptop adalah investasi penting untuk pekerjaan dan aktivitas sehari-hari. Simak 5 tips praktis merawat laptop agar tetap awet dan berkinerja optimal.',
                'content' => '<p>Laptop merupakan perangkat elektronik yang menjadi kebutuhan penting dalam kehidupan sehari-hari, baik untuk bekerja, belajar, maupun hiburan. Agar laptop Anda tetap awet dan berkinerja optimal dalam jangka waktu lama, berikut adalah 5 cara merawat laptop yang bisa Anda terapkan.</p>

<h2>1. Jaga Kebersihan Laptop</h2>
<p>Debu dan kotoran dapat menumpuk di keyboard, layar, dan ventilasi udara laptop. Bersihkan layar laptop secara rutin menggunakan kain microfiber yang lembut. Untuk keyboard, gunakan kuas kecil atau compressed air untuk membersihkan debu di sela-sela tombol. Ventilasi udara yang bersih akan membantu sirkulasi udara tetap lancar dan mencegah overheating.</p>

<h2>2. Hindari Penggunaan Berlebihan</h2>
<p>Menggunakan laptop secara terus-menerus dalam waktu lama dapat menyebabkan komponen cepat panas dan aus. Berikan waktu istirahat untuk laptop Anda minimal 1-2 jam setelah penggunaan 4-5 jam berturut-turut. Matikan laptop saat tidak digunakan untuk mengistirahatkan komponen internal.</p>

<h2>3. Perhatikan Suhu dan Ventilasi</h2>
<p>Pastikan laptop digunakan di permukaan yang rata dan keras. Hindari menggunakan laptop di atas kasur, bantal, atau permukaan empuk lainnya yang dapat menutup ventilasi udara. Suhu ideal untuk penggunaan laptop adalah antara 10-35 derajat Celsius. Gunakan cooling pad jika diperlukan untuk membantu sirkulasi udara.</p>

<h2>4. Rawat Baterai dengan Baik</h2>
<p>Untuk menjaga kesehatan baterai laptop, hindari mengisi daya terus-menerus dalam waktu lama. Lepaskan charger ketika baterai sudah penuh. Jangan biarkan baterai habis total (0%) terlalu sering karena dapat mengurangi umur baterai. Idealnya, charge laptop ketika baterai mencapai 20-30%.</p>

<h2>5. Update Software dan Antivirus</h2>
<p>Selalu update sistem operasi dan software ke versi terbaru untuk mendapatkan patch keamanan dan peningkatan performa. Instal antivirus yang terpercaya dan lakukan scanning secara rutin untuk melindungi laptop dari malware dan virus yang dapat merusak sistem.</p>

<h2>Kesimpulan</h2>
<p>Dengan menerapkan 5 cara merawat laptop di atas, Anda dapat memperpanjang umur laptop dan menjaga kinerjanya tetap optimal. Perawatan yang baik tidak hanya menghemat biaya perbaikan, tetapi juga memastikan produktivitas Anda tidak terganggu akibat masalah teknis pada laptop.</p>',
                'category' => 'Tips',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Cara Mengatasi WiFi Lemot dan Tidak Stabil di Rumah',
                'slug' => 'cara-mengatasi-wifi-lemot-tidak-stabil',
                'excerpt' => 'WiFi lemot dan tidak stabil bisa sangat mengganggu aktivitas online Anda. Temukan solusi praktis untuk meningkatkan kecepatan dan kestabilan WiFi di rumah.',
                'content' => '<p>Koneksi WiFi yang lemot dan tidak stabil memang sangat mengganggu, terutama saat Anda sedang bekerja dari rumah, mengikuti meeting online, atau streaming film favorit. Berikut adalah beberapa cara efektif untuk mengatasi masalah WiFi lemot dan tidak stabil di rumah Anda.</p>

<h2>1. Posisikan Router di Tempat Strategis</h2>
<p>Posisi router sangat mempengaruhi kualitas sinyal WiFi. Tempatkan router di lokasi yang tinggi dan terbuka, jauh dari dinding tebal, logam, atau perangkat elektronik lain yang dapat mengganggu sinyal.</p>

<h2>2. Ganti Channel WiFi</h2>
<p>Router WiFi bekerja pada channel tertentu. Jika tetangga Anda menggunakan channel yang sama, dapat terjadi interferensi yang membuat WiFi lemot. Gunakan aplikasi WiFi Analyzer untuk menemukan channel yang paling sepi.</p>

<h2>3. Update Firmware Router</h2>
<p>Produsen router secara rutin merilis update firmware untuk meningkatkan performa dan keamanan perangkat. Periksa website produsen router Anda untuk update firmware terbaru.</p>

<h2>4. Batasi Jumlah Perangkat yang Terhubung</h2>
<p>Semakin banyak perangkat yang terhubung ke WiFi, semakin lambat koneksi yang diterima masing-masing perangkat. Batasi jumlah perangkat yang terhubung atau gunakan Quality of Service (QoS) settings di router.</p>

<h2>5. Restart Router Secara Berkala</h2>
<p>Router juga membutuhkan waktu istirahat. Restart router minimal seminggu sekali dapat membantu membersihkan cache dan meningkatkan performa. Cabut kabel power router, tunggu 30 detik, lalu nyalakan kembali.</p>

<h2>Kapan Harus Memanggil Teknisi?</h2>
<p>Jika Anda sudah mencoba semua tips di atas namun WiFi masih bermasalah, mungkin ada masalah dengan perangkat router atau infrastruktur jaringan. Saatnya memanggil teknisi profesional untuk melakukan pemeriksaan dan instalasi ulang jaringan WiFi Anda.</p>',
                'category' => 'Jaringan',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tanda-Tanda Komputer Terinfeksi Virus dan Cara Mengatasinya',
                'slug' => 'tanda-komputer-terinfeksi-virus-cara-mengatasi',
                'excerpt' => 'Kenali gejala komputer yang terinfeksi virus dan pelajari langkah-langkah efektif untuk membersihkan dan melindungi komputer Anda dari ancaman malware.',
                'content' => '<p>Virus komputer dan malware lainnya dapat menyebabkan berbagai masalah serius, mulai dari penurunan performa hingga pencurian data penting. Mengenali tanda-tanda infeksi virus sejak dini dapat membantu Anda mengambil tindakan sebelum kerusakan menjadi lebih parah.</p>

<h2>Tanda-Tanda Komputer Terinfeksi Virus</h2>

<h3>1. Performa Komputer Menurun Drastis</h3>
<p>Komputer yang tiba-tiba menjadi sangat lambat, sering hang, atau crash tanpa alasan yang jelas bisa menjadi indikasi adanya virus yang berjalan di background.</p>

<h3>2. Muncul Pop-up Iklan yang Mengganggu</h3>
<p>Adware adalah jenis malware yang menampilkan iklan pop-up secara berlebihan. Jika Anda melihat banyak pop-up iklan muncul bahkan saat tidak browsing, waspadai infeksi adware.</p>

<h3>3. Program Antivirus Tidak Bisa Dibuka</h3>
<p>Banyak virus yang dirancang untuk menonaktifkan program antivirus agar tidak terdeteksi. Jika antivirus Anda tiba-tiba tidak bisa dibuka, segera waspada.</p>

<h3>4. File Hilang atau Rusak</h3>
<p>Beberapa virus dapat mengenkripsi, menyembunyikan, atau menghapus file Anda. Jika file-file penting tiba-tiba hilang, ini bisa menjadi tanda infeksi ransomware.</p>

<h2>Cara Mengatasi Komputer Terinfeksi Virus</h2>
<ol>
<li>Putuskan koneksi internet segera</li>
<li>Masuk ke Safe Mode</li>
<li>Hapus file temporary</li>
<li>Scan dengan antivirus yang terupdate</li>
<li>Install ulang software penting setelah pembersihan</li>
</ol>

<h2>Pencegahan</h2>
<p>Untuk mencegah infeksi virus di masa depan, selalu update sistem operasi dan software, gunakan antivirus yang terpercaya, jangan klik link atau download file dari sumber yang tidak dikenal, dan backup data penting secara rutin.</p>',
                'category' => 'Keamanan',
                'is_published' => true,
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'Panduan Lengkap Backup Data untuk Pemula',
                'slug' => 'panduan-lengkap-backup-data-pemula',
                'excerpt' => 'Data adalah aset berharga. Pelajari cara backup data yang benar untuk melindungi file-file penting Anda dari kehilangan akibat kerusakan hardware atau serangan virus.',
                'content' => '<p>Data adalah aset berharga di era digital ini. Foto kenangan, dokumen penting, proyek pekerjaan, semua tersimpan dalam komputer dan smartphone. Namun, apa yang terjadi jika perangkat Anda rusak atau hilang? Backup data adalah solusi untuk melindungi semua file penting Anda.</p>

<h2>Mengapa Backup Data Itu Penting?</h2>
<p>Banyak orang baru menyadari pentingnya backup setelah kehilangan data berharga. Kerusakan hard drive, serangan ransomware, pencurian perangkat, atau kesalahan tidak sengaja dapat menghapus semua data Anda dalam sekejap.</p>

<h2>Metode Backup Data</h2>

<h3>1. External Hard Drive / USB Flash Drive</h3>
<p>Cara paling sederhana adalah menyalin file ke external hard drive atau USB flash drive. Kelebihan: cepat, murah, dan mudah digunakan. Kekurangan: perangkat fisik bisa rusak atau hilang.</p>

<h3>2. Cloud Storage</h3>
<p>Layanan seperti Google Drive, OneDrive, Dropbox, dan iCloud memungkinkan Anda menyimpan file di cloud. Kelebihan: bisa diakses dari mana saja, aman dari bencana fisik.</p>

<h3>3. Network Attached Storage (NAS)</h3>
<p>NAS adalah perangkat penyimpanan yang terhubung ke jaringan rumah/kantor. Kelebihan: kapasitas besar, bisa diakses multiple user, otomatisasi backup.</p>

<h2>Strategi Backup 3-2-1</h2>
<ul>
<li><strong>3</strong> salinan data (1 original + 2 backup)</li>
<li><strong>2</strong> jenis media penyimpanan berbeda</li>
<li><strong>1</strong> salinan disimpan di lokasi berbeda (offsite)</li>
</ul>

<h2>Kesimpulan</h2>
<p>Jangan tunggu sampai kehilangan data baru menyadari pentingnya backup. Mulailah hari ini dengan memilih metode backup yang sesuai dengan kebutuhan dan budget Anda. Ingat, data yang tidak di-backup adalah data yang sudah hilang!</p>',
                'category' => 'Tips',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Mengenal Smart Home: Teknologi Rumah Pintar untuk Pemula',
                'slug' => 'mengenal-smart-home-teknologi-rumah-pintar',
                'excerpt' => 'Smart home atau rumah pintar semakin populer. Pelajari dasar-dasar teknologi smart home dan cara memulainya untuk membuat rumah Anda lebih nyaman dan efisien.',
                'content' => '<p>Teknologi smart home atau rumah pintar telah menjadi semakin terjangkau dan mudah diimplementasikan. Dari lampu yang bisa dikontrol dengan suara hingga kamera keamanan yang bisa dipantau dari smartphone, smart home menawarkan kenyamanan, keamanan, dan efisiensi energi.</p>

<h2>Apa Itu Smart Home?</h2>
<p>Smart home adalah sistem otomatisasi rumah yang memungkinkan Anda mengontrol berbagai perangkat elektronik melalui smartphone, tablet, atau perintah suara.</p>

<h2>Perangkat Smart Home untuk Pemula</h2>

<h3>1. Smart Speaker / Voice Assistant</h3>
<p>Google Home, Amazon Alexa, atau Apple HomePod adalah pusat kontrol untuk smart home Anda. Dengan perintah suara, Anda bisa mengontrol lampu, AC, musik, dan perangkat lainnya.</p>

<h3>2. Smart Lighting (Lampu Pintar)</h3>
<p>Lampu pintar memungkinkan Anda mengatur kecerahan, warna, dan jadwal nyala/mati lampu dari smartphone.</p>

<h3>3. Smart Camera (Kamera Pintar)</h3>
<p>Kamera keamanan pintar memungkinkan Anda memantau rumah dari mana saja dengan fitur motion detection, night vision, dan two-way audio.</p>

<h3>4. Smart Plug (Stopkontak Pintar)</h3>
<p>Cara termudah dan termurah untuk memulai smart home. Colokkan perangkat elektronik biasa ke smart plug, dan Anda bisa mengontrol nyala/matinya dari smartphone.</p>

<h2>Keuntungan Smart Home</h2>
<ul>
<li>Kenyamanan: Kontrol semua perangkat dari satu aplikasi</li>
<li>Keamanan: Monitoring rumah 24/7 dari smartphone</li>
<li>Efisiensi Energi: Otomatisasi mengurangi konsumsi listrik</li>
</ul>

<h2>Mulai dari Mana?</h2>
<p>Untuk pemula, mulailah dengan perangkat sederhana seperti smart speaker dan smart plug. TechFix menawarkan konsultasi gratis untuk membantu Anda merencanakan dan menginstalasi smart home system.</p>',
                'category' => 'Smart Home',
                'is_published' => true,
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($articles as $articleData) {
            Article::create($articleData);
        }

        $this->command->info('✅ Berhasil membuat ' . count($articles) . ' artikel baru!');
        $this->command->info('');
        $this->command->info('📝 Artikel yang dibuat:');
        foreach ($articles as $index => $article) {
            $this->command->info('   ' . ($index + 1) . '. ' . $article['title'] . ' [' . $article['category'] . ']');
        }
    }
}
