<?php




namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Secure Administrator Account
        User::firstOrCreate(
            ['username' => 'admin'],
            ['password' => bcrypt('LPPMkkg2026!')]
        );

        // Seed Homepage CMS Content Blocks
        $elements = [
            // Home Page Hero Section
            [
                'page' => 'home',
                'key' => 'home.hero.title',
                'label' => 'Judul Hero (Baris 1)',
                'value' => 'Selamat Datang',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.hero.middle',
                'label' => 'Judul Hero (Baris 2 - Penghubung)',
                'value' => 'di',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.hero.accent',
                'label' => 'Judul Hero (Baris 3 - Aksen)',
                'value' => 'LPPM IBIKKG',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.hero.desc',
                'label' => 'Deskripsi Hero Utama',
                'value' => 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Institut Bisnis dan Informatika Kwik Kian Gie berkomitmen memajukan riset ilmiah, pengabdian masyarakat, serta publikasi berkualitas tinggi.',
                'type' => 'textarea',
            ],

            // Home Page Stats Section
            [
                'page' => 'home',
                'key' => 'home.stats.pilar_count',
                'label' => 'Angka Statistik 1',
                'value' => '3',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.stats.pilar_label',
                'label' => 'Label Statistik 1',
                'value' => 'Pilar Utama',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.stats.publikasi_count',
                'label' => 'Angka Statistik 2',
                'value' => '100+',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.stats.publikasi_label',
                'label' => 'Label Statistik 2',
                'value' => 'Publikasi Aktif',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.stats.standar_count',
                'label' => 'Angka Statistik 3',
                'value' => 'Unggul',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.stats.standar_label',
                'label' => 'Label Statistik 3',
                'value' => 'Standar Mutu',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.stats.dukungan_count',
                'label' => 'Angka Statistik 4',
                'value' => '100%',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.stats.dukungan_label',
                'label' => 'Label Statistik 4',
                'value' => 'Dukungan Dosen',
                'type' => 'text',
            ],

            // Profil Tentang Kami Section
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.hero.title',
                'label' => 'Judul Tentang Kami',
                'value' => 'Tentang LPPM IBI KKG',
                'type' => 'text',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.hero.desc',
                'label' => 'Deskripsi Singkat Tentang Kami',
                'value' => 'Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) merupakan unit strategis yang mengelola, mengembangkan, dan mendukung penuh pelaksanaan riset ilmiah, pengabdian masyarakat, publikasi ilmiah, serta penguatan jejaring kerja sama tridharma.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.short_profile.title',
                'label' => 'Judul Profil Singkat',
                'value' => 'Profil Singkat',
                'type' => 'text',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.short_profile.text1',
                'label' => 'Paragraf Profil Singkat 1',
                'value' => 'LPPM IBI KKG bertugas mengelola proses administratif, akademik, dan strategis dalam pelaksanaan penelitian dosen, pengabdian kepada masyarakat, publikasi ilmiah, serta pengembangan kolaborasi dengan mitra internal maupun eksternal.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.short_profile.text2',
                'label' => 'Paragraf Profil Singkat 2',
                'value' => 'Melalui pengelolaan yang profesional, transparan, dan berbasis teknologi informasi, LPPM berkomitmen memfasilitasi sivitas akademika guna melahirkan karya riset inovatif dan program pengabdian yang memberikan kontribusi nyata bagi masyarakat luas.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.tasks.text',
                'label' => 'Tugas Utama (Satu baris per Tugas, tekan Enter)',
                'value' => "Mengelola administrasi dan pendanaan internal/eksternal penelitian dosen.\nMengoordinasikan dan merancang agenda pengabdian kepada masyarakat (Abdimas).\nMendorong luaran ilmiah bermutu tinggi melalui pembinaan berkelanjutan.\nMenyediakan standarisasi panduan, dokumen administrasi, serta template resmi.\nMembangun kerja sama strategis multi-sektoral dengan industri, pemerintah, dan LSM.",
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.functions.text',
                'label' => 'Fungsi Strategis (Satu baris per Fungsi, tekan Enter)',
                'value' => "Sebagai katalisator utama pengembangan iklim riset institusi.\nSebagai jembatan hilirisasi karya keilmuan dosen ke masyarakat.\nSebagai fasilitator peningkatan sitasi dan indeks publikasi ilmiah global.\nSebagai penyedia platform terintegrasi untuk seluruh layanan tridharma.",
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.pillar.penelitian',
                'label' => 'Ruang Lingkup: Deskripsi Penelitian',
                'value' => 'Mengelola pengajuan proposal hibah, proses monitoring evaluasi berkala, pelaporan keuangan, hingga pendampingan paten dan HKI hasil riset dosen.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.pillar.abdimas',
                'label' => 'Ruang Lingkup: Deskripsi Abdimas',
                'value' => 'Menyelenggarakan kegiatan pengabdian masyarakat berorientasi dampak, memandu program binaan desa mitra, serta mengoordinasikan laporan pengabdian.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.pillar.publikasi',
                'label' => 'Ruang Lingkup: Deskripsi Publikasi & Jurnal',
                'value' => 'Dukungan penyuntingan artikel ilmiah, penyediaan direktori jurnal bereputasi nasional dan internasional, serta pengurusan insentif publikasi.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.values.tertib',
                'label' => 'Core Value: Deskripsi Tertib',
                'value' => 'Tata kelola administrasi yang rapi, transparan, terdokumentasi, dan sesuai dengan standar nasional DIKTI.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.values.transparan',
                'label' => 'Core Value: Deskripsi Transparan',
                'value' => 'Keterbukaan informasi terkait skema dana hibah riset, penilaian proposal, hasil monev, hingga pembagian insentif.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.values.adaptif',
                'label' => 'Core Value: Deskripsi Adaptif',
                'value' => 'Terus berinovasi dan menyesuaikan layanan dengan kebutuhan digitalisasi tridharma perguruan tinggi.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.values.berkualitas',
                'label' => 'Core Value: Deskripsi Berkualitas',
                'value' => 'Memprioritaskan mutu hasil luaran yang berdaya saing nasional serta berorientasi dampak global.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.commitment.title',
                'label' => 'Judul Komitmen Kami',
                'value' => 'Pemberdayaan Berkelanjutan & Dampak Nyata',
                'type' => 'text',
            ],
            [
                'page' => 'profil.tentang-kami',
                'key' => 'about.commitment.text',
                'label' => 'Paragraf Komitmen Kami',
                'value' => 'LPPM IBI KKG berkomitmen untuk secara konsisten memberikan pelayanan prima yang adaptif dan berorientasi kualitas. Melalui sinergi riset akademis dan program pengabdian inovatif, kami bertekad mempercepat pertumbuhan keilmuan civitas akademika dan mewujudkan kolaborasi bernilai tambah tinggi bagi masyarakat dan mitra strategis.',
                'type' => 'textarea',
            ],

            // Profil Visi & Misi Section
            [
                'page' => 'profil.visi-misi',
                'key' => 'visi_misi.hero.title',
                'label' => 'Judul Visi & Misi',
                'value' => 'Arah Strategis',
                'type' => 'text',
            ],
            [
                'page' => 'profil.visi-misi',
                'key' => 'visi_misi.hero.desc',
                'label' => 'Deskripsi Hero Visi & Misi',
                'value' => 'Tujuan dan Sasaran Strategis Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) IBI Kwik Kian Gie.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.visi-misi',
                'key' => 'visi_misi.visi.text',
                'label' => 'Teks Visi LPPM',
                'value' => 'Menjadi lembaga pengelola tridharma yang unggul secara nasional, adaptif, dan berorientasi kualitas untuk menghasilkan riset inovatif dan pengabdian yang berdampak nyata bagi masyarakat luas pada tahun 2030.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.visi-misi',
                'key' => 'visi_misi.misi.text',
                'label' => 'Teks Misi LPPM (Gunakan Enter untuk pemisah)',
                'value' => "Meningkatkan kuantitas dan kualitas penelitian dosen yang relevan dengan kebutuhan industri.\nMenyelenggarakan pengabdian masyarakat berbasis produk inovasi dan tepat guna.\nMendorong luaran jurnal ilmiah terakreditasi nasional (SINTA) dan internasional bereputasi.",
                'type' => 'textarea',
            ],

            // Profil Struktur Organisasi
            [
                'page' => 'profil.struktur-organisasi',
                'key' => 'struktur.hero.title',
                'label' => 'Judul Struktur Organisasi',
                'value' => 'Struktur Organisasi',
                'type' => 'text',
            ],
            [
                'page' => 'profil.struktur-organisasi',
                'key' => 'struktur.hero.desc',
                'label' => 'Deskripsi Hero Struktur',
                'value' => 'Susunan kepengurusan dan tata kelola organisasi Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) IBI Kwik Kian Gie.',
                'type' => 'textarea',
            ],
            [
                'page' => 'profil.struktur-organisasi',
                'key' => 'struktur.pimpinan.ketua',
                'label' => 'Nama Ketua LPPM',
                'value' => 'Dr. Carmel Meiden, S.E., M.Si., Ak, CA, CSRA.',
                'type' => 'text',
            ],
            [
                'page' => 'profil.struktur-organisasi',
                'key' => 'struktur.pimpinan.sekretaris',
                'label' => 'Nama Sekretaris LPPM',
                'value' => 'Amelia Sandra, S.E., Ak., M.Si., M.Ak.',
                'type' => 'text',
            ],

            // Profil Prestasi
            [
                'page' => 'profil.prestasi',
                'key' => 'prestasi.hero.title',
                'label' => 'Judul Halaman Prestasi',
                'value' => 'Prestasi & Penghargaan',
                'type' => 'text',
            ],
            [
                'page' => 'profil.prestasi',
                'key' => 'prestasi.hero.desc',
                'label' => 'Deskripsi Halaman Prestasi',
                'value' => 'Catatan keunggulan akademik, hibah penelitian nasional, dan luaran bermutu tinggi dari sivitas akademika IBI Kwik Kian Gie.',
                'type' => 'textarea',
            ],

            // Halaman Akademisi (Dosen)
            [
                'page' => 'akademisi',
                'key' => 'dosen.hero.title',
                'label' => 'Judul Menu Akademisi',
                'value' => 'Akademisi & Dosen Peneliti',
                'type' => 'text',
            ],
            [
                'page' => 'akademisi',
                'key' => 'dosen.hero.desc',
                'label' => 'Deskripsi Menu Akademisi',
                'value' => 'Direktori dosen pengajar, kepangkatan akademik, serta fokus kepakaran tridharma penelitian di IBI Kwik Kian Gie.',
                'type' => 'textarea',
            ],

            // Halaman Penelitian & Abdimas
            [
                'page' => 'penelitian',
                'key' => 'penelitian.hero.title',
                'label' => 'Judul Halaman Penelitian',
                'value' => 'Penelitian & Pengabdian LPPM',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian',
                'key' => 'penelitian.hero.desc',
                'label' => 'Deskripsi Halaman Penelitian',
                'value' => 'Informasi skema pendanaan riset internal/nasional, pengumuman seleksi, dan panduan pengabdian masyarakat.',
                'type' => 'textarea',
            ],

            // Halaman Publikasi
            [
                'page' => 'publikasi',
                'key' => 'publikasi.hero.title',
                'label' => 'Judul Halaman Publikasi',
                'value' => 'Publikasi & Jurnal Ilmiah',
                'type' => 'text',
            ],
            [
                'page' => 'publikasi',
                'key' => 'publikasi.hero.desc',
                'label' => 'Deskripsi Halaman Publikasi',
                'value' => 'Akses jurnal resmi terakreditasi, artikel ilmiah, prosiding nasional, serta direktori indeksasi sitasi dosen.',
                'type' => 'textarea',
            ],

            // Halaman Dokumen
            [
                'page' => 'dokumen',
                'key' => 'dokumen.hero.title',
                'label' => 'Judul Halaman Dokumen',
                'value' => 'Dokumen Panduan & Unduhan',
                'type' => 'text',
            ],
            [
                'page' => 'dokumen',
                'key' => 'dokumen.hero.desc',
                'label' => 'Deskripsi Halaman Dokumen',
                'value' => 'Unduh panduan resmi hibah penelitian, template laporan pengabdian masyarakat, dan berkas administrasi LPPM.',
                'type' => 'textarea',
            ],

            // Halaman Kontak
            [
                'page' => 'kontak',
                'key' => 'contact.address',
                'label' => 'Alamat Kantor LPPM',
                'value' => 'Jl. Yos Sudarso Kav. 87, Sunter, Jakarta Utara',
                'type' => 'textarea',
            ],
            [
                'page' => 'kontak',
                'key' => 'contact.phone',
                'label' => 'Nomor Telepon Kantor',
                'value' => '(021) 6530 7062',
                'type' => 'text',
            ],
            [
                'page' => 'kontak',
                'key' => 'contact.email',
                'label' => 'Alamat Email',
                'value' => 'lppm@kwikkiangie.ac.id',
                'type' => 'text',
            ],
            [
                'page' => 'kontak',
                'key' => 'contact.hours',
                'label' => 'Jam Operasional Layanan',
                'value' => 'Senin - Jumat: 07.30 - 16.30 WIB',
                'type' => 'text',
            ],

            // Gambar Beranda Hero Slides
            [
                'page' => 'home',
                'key' => 'home.slide1.image',
                'label' => 'Gambar Slide 1 (Seminar Riset)',
                'value' => 'assets/images/LCD - Selamat dan Sukses Dosen IBIKKG].jpg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.slide2.image',
                'label' => 'Gambar Slide 2 (Program Pengabdian)',
                'value' => 'assets/images/pkm2024.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.slide3.image',
                'label' => 'Gambar Slide 3 (Kolaborasi Masyarakat)',
                'value' => 'assets/images/pkm2025.jpeg',
                'type' => 'image',
            ],

            // Gambar Struktur Organisasi (Ketua)
            [
                'page' => 'profil.struktur-organisasi',
                'key' => 'struktur.pimpinan.foto1',
                'label' => 'Foto Kepala LPPM (Tampilan Utama)',
                'value' => 'assets/images/struktur-organisasi/pakimam1.jpg',
                'type' => 'image',
            ],
            [
                'page' => 'profil.struktur-organisasi',
                'key' => 'struktur.pimpinan.foto2',
                'label' => 'Foto Kepala LPPM (Tampilan Hover)',
                'value' => 'assets/images/struktur-organisasi/pakimam2.png',
                'type' => 'image',
            ],

            // Gambar Prestasi Sertifikat
            [
                'page' => 'profil.prestasi',
                'key' => 'prestasi.cert.sosro',
                'label' => 'Sertifikat Piagam Kuliah Umum Sosro',
                'value' => 'assets/images/prestasi_sosro.jpg',
                'type' => 'image',
            ],
            [
                'page' => 'profil.prestasi',
                'key' => 'prestasi.cert.dikantara',
                'label' => 'Sertifikat Pelatihan Guru Dikantara',
                'value' => 'assets/images/prestasi_dikantara.jpg',
                'type' => 'image',
            ],
            [
                'page' => 'profil.prestasi',
                'key' => 'prestasi.cert.apresiasi',
                'label' => 'Sertifikat Apresiasi Rektorat KKG',
                'value' => 'assets/images/prestasi_apresiasi_pakimam.png',
                'type' => 'image',
            ],

            // Dynamic Services (Layanan)
            [
                'page' => 'home',
                'key' => 'home.service.1.title',
                'label' => 'Layanan 1: Judul',
                'value' => 'Penelitian',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.1.desc',
                'label' => 'Layanan 1: Deskripsi',
                'value' => 'Informasi skema, pengumuman, dan data penelitian dosen.',
                'type' => 'textarea',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.1.image',
                'label' => 'Layanan 1: Gambar',
                'value' => 'assets/images/pkm2024.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.1.url',
                'label' => 'Layanan 1: URL Tujuan',
                'value' => '/penelitian/pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.2.title',
                'label' => 'Layanan 2: Judul',
                'value' => 'Abdimas',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.2.desc',
                'label' => 'Layanan 2: Deskripsi',
                'value' => 'Program pengabdian kepada masyarakat yang relevan dan berdampak.',
                'type' => 'textarea',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.2.image',
                'label' => 'Layanan 2: Gambar',
                'value' => 'assets/images/pkm2025.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.2.url',
                'label' => 'Layanan 2: URL Tujuan',
                'value' => '/abdimas/pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.3.title',
                'label' => 'Layanan 3: Judul',
                'value' => 'Publikasi',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.3.desc',
                'label' => 'Layanan 3: Deskripsi',
                'value' => 'Jurnal, artikel ilmiah, dan prosiding untuk luaran akademik kampus.',
                'type' => 'textarea',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.3.image',
                'label' => 'Layanan 3: Gambar',
                'value' => 'assets/images/LCD - Selamat dan Sukses Dosen IBIKKG].jpg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.3.url',
                'label' => 'Layanan 3: URL Tujuan',
                'value' => '/publikasi/jurnal',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.4.title',
                'label' => 'Layanan 4: Judul',
                'value' => 'Dokumen',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.4.desc',
                'label' => 'Layanan 4: Deskripsi',
                'value' => 'Panduan, template, dan unduhan untuk kebutuhan administrasi akademik.',
                'type' => 'textarea',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.4.image',
                'label' => 'Layanan 4: Gambar',
                'value' => 'assets/images/pkm2024.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.service.4.url',
                'label' => 'Layanan 4: URL Tujuan',
                'value' => '/dokumen/unduhan',
                'type' => 'text',
            ],

            // Dynamic News (Berita)
            [
                'page' => 'home',
                'key' => 'home.news.1.title',
                'label' => 'Berita 1: Judul',
                'value' => 'Workshop Penyusunan Proposal Penelitian Hibah bersama Dr. Zulfikar Ikhsan Pane',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.1.date',
                'label' => 'Berita 1: Tanggal',
                'value' => '20 Mei 2026',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.1.image',
                'label' => 'Berita 1: Gambar',
                'value' => 'assets/images/workshop-zul.png',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.1.url',
                'label' => 'Berita 1: URL/Rute',
                'value' => '/penelitian/pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.2.title',
                'label' => 'Berita 2: Judul',
                'value' => 'Coaching Clinic Internal: Persiapan Kompetisi Hibah Kemendiktisaintek BIMA 2025 (Diikuti 15 Dosen)',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.2.date',
                'label' => 'Berita 2: Tanggal',
                'value' => 'November 2025',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.2.image',
                'label' => 'Berita 2: Gambar',
                'value' => 'assets/images/1.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.2.url',
                'label' => 'Berita 2: URL/Rute',
                'value' => '/penelitian/pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.3.title',
                'label' => 'Berita 3: Judul',
                'value' => 'Partisipasi IBI KKG dalam Kegiatan Pengabdian Masyarakat Internasional di Surabaya',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.3.date',
                'label' => 'Berita 3: Tanggal',
                'value' => '4 Desember 2025',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.3.image',
                'label' => 'Berita 3: Gambar',
                'value' => 'assets/images/2.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.3.url',
                'label' => 'Berita 3: URL/Rute',
                'value' => '/penelitian/pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.4.title',
                'label' => 'Berita 4: Judul',
                'value' => 'Kegiatan International Community Development bersama BPSDM Palembang',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.4.date',
                'label' => 'Berita 4: Tanggal',
                'value' => '14-17 September 2024',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.4.image',
                'label' => 'Berita 4: Gambar',
                'value' => 'assets/images/pkm2024.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.4.url',
                'label' => 'Berita 4: URL/Rute',
                'value' => '/penelitian/pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.5.title',
                'label' => 'Berita 5: Judul',
                'value' => 'Monitoring dan Evaluasi (Monev) Penerima Hibah Pengabdian Masyarakat Kemendiktisaintek',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.5.date',
                'label' => 'Berita 5: Tanggal',
                'value' => '21 April 2025',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.5.image',
                'label' => 'Berita 5: Gambar',
                'value' => 'assets/images/pkm2025.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.5.url',
                'label' => 'Berita 5: URL/Rute',
                'value' => '/penelitian/pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.6.title',
                'label' => 'Berita 6: Judul',
                'value' => 'Selamat dan Sukses Dosen IBI KKG atas peraihan Pendanaan Penelitian Dosen Pemula Kemdikti Saintek 2026',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.6.date',
                'label' => 'Berita 6: Tanggal',
                'value' => 'April 2026',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.6.image',
                'label' => 'Berita 6: Gambar',
                'value' => 'assets/images/LCD - Selamat dan Sukses Dosen IBIKKG].jpg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.6.url',
                'label' => 'Berita 6: URL/Rute',
                'value' => '/publikasi/jurnal',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.7.title',
                'label' => 'Berita 7: Judul',
                'value' => 'Pengajuan Terbuka Artikel Majalah WARTEL Semester I Tahun 2026',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.7.date',
                'label' => 'Berita 7: Tanggal',
                'value' => 'Batas akhir: 4 Mei 2026',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.7.image',
                'label' => 'Berita 7: Gambar',
                'value' => 'assets/images/wartel-2026.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.7.url',
                'label' => 'Berita 7: URL/Rute',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.news.7.long',
                'label' => 'Berita 7: Konten Detail (HTML)',
                'value' => '<p><strong>Yth. Bapak/Ibu Humas PTS di lingkungan LLDikti Wilayah III</strong></p>\n\n<p>Dalam rangka penerbitan <strong>Majalah WARTEL Semester I Tahun 2026</strong>, kami mengundang sivitas akademika dan mitra untuk berpartisipasi mengirimkan artikel dengan tema:</p>\n\n<p><strong>Kerja Sama, Hasil Nyata: Potret Sinergi Perguruan Tinggi dalam Pembangunan Berkelanjutan</strong></p>\n\n<p>Artikel diharapkan menyoroti hasil nyata kerja sama, khususnya yang berdampak pada:</p>\n<ul>\n  <li>Kolaborasi dengan mitra</li>\n  <li>Karya ilmiah, karya terapan, atau karya seni yang telah dimanfaatkan, diterapkan, atau dihilirisasi</li>\n  <li>Program yang menjawab kebutuhan masyarakat</li>\n</ul>\n\n<p><strong>Ketentuan singkat:</strong></p>\n<ul>\n  <li>500–600 kata</li>\n  <li>Artikel berbentuk non-ilmiah / semi populer</li>\n  <li>Format file .doc atau .docx (Word)</li>\n  <li>Melampirkan 3 foto pendukung berkualitas HD</li>\n  <li>Orisinal, bukan hasil plagiasi atau saduran</li>\n  <li>Menggunakan Bahasa Indonesia yang baik dan benar</li>\n</ul>\n\n<p><strong>Link submit:</strong> <a href=\'http://s.id/AjuanArtikelMajalah2026\' target=\'_blank\' rel=\'noopener noreferrer\'>s.id/AjuanArtikelMajalah2026</a></p>\n<p><strong>Narahubung:</strong> WhatsApp 0821-2235-5330</p>\n<p>Mari publikasikan karya terbaik dan perkuat dampak kolaborasi perguruan tinggi.</p>',
                'type' => 'textarea',
            ],

            // Dynamic Videos
            [
                'page' => 'home',
                'key' => 'home.video.1.title',
                'label' => 'Video 1: Judul',
                'value' => 'Profil LPPM IBI KKG',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.1.desc',
                'label' => 'Video 1: Deskripsi',
                'value' => 'Video profil lembaga, budaya akademik, dan arah pengembangan LPPM.',
                'type' => 'textarea',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.1.image',
                'label' => 'Video 1: Thumbnail',
                'value' => 'assets/images/yt.png',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.1.url',
                'label' => 'Video 1: URL/Link Video',
                'value' => 'https://youtu.be/uD1E8MuZK5c?si=_ioYpiPkEzS7rbd7',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.2.title',
                'label' => 'Video 2: Judul',
                'value' => 'Kegiatan LPPM (Slot Kosong)',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.2.desc',
                'label' => 'Video 2: Deskripsi',
                'value' => 'Dokumentasi kegiatan penelitian, publikasi, dan pengabdian kepada masyarakat.',
                'type' => 'textarea',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.2.image',
                'label' => 'Video 2: Thumbnail',
                'value' => 'assets/images/pkm2025.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.2.url',
                'label' => 'Video 2: URL/Link Video',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.3.title',
                'label' => 'Video 3: Judul',
                'value' => 'Seminar Nasional LPPM (Slot Kosong)',
                'type' => 'text',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.3.desc',
                'label' => 'Video 3: Deskripsi',
                'value' => 'Dokumentasi kolaborasi riset, hilirisasi produk inovasi, serta diseminasi keilmuan akademisi.',
                'type' => 'textarea',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.3.image',
                'label' => 'Video 3: Thumbnail',
                'value' => 'assets/images/1.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'home',
                'key' => 'home.video.3.url',
                'label' => 'Video 3: URL/Link Video',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],
        ];

        foreach ($elements as $el) {
            \App\Models\PageContent::updateOrCreate(['key' => $el['key']], $el);
        }

        // Seed Penelitian & Abdimas Pengumuman CMS Content Blocks
        $extraElements = [
            // Penelitian Pengumuman Hero Section
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.hero.badge',
                'label' => 'Hero Badge',
                'value' => 'Penelitian · Pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.hero.title',
                'label' => 'Hero Title',
                'value' => 'Pengumuman Penelitian LPPM',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.hero.desc',
                'label' => 'Hero Deskripsi',
                'value' => 'Halaman ini berisi informasi terbaru terkait hibah, jadwal pengajuan, revisi proposal, seminar, monitoring, dan ketentuan lain yang berkaitan dengan kegiatan penelitian dosen.',
                'type' => 'textarea',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.active_count',
                'label' => 'Stat 1 Angka',
                'value' => '3',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.active_label',
                'label' => 'Stat 1 Label',
                'value' => 'Pengumuman Aktif',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.period_count',
                'label' => 'Stat 2 Angka',
                'value' => '2026',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.period_label',
                'label' => 'Stat 2 Label',
                'value' => 'Periode Berjalan',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.deadline_count',
                'label' => 'Stat 3 Angka',
                'value' => '10 Feb',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.deadline_label',
                'label' => 'Stat 3 Label',
                'value' => 'Batas Submit',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.admin_count',
                'label' => 'Stat 4 Angka',
                'value' => 'LPPM',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.stats.admin_label',
                'label' => 'Stat 4 Label',
                'value' => 'Pengelola',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.section.tag',
                'label' => 'Section Tag',
                'value' => 'Pengumuman Penelitian',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.section.title',
                'label' => 'Section Title',
                'value' => 'Informasi Terbaru untuk Kegiatan Penelitian',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.section.desc',
                'label' => 'Section Deskripsi',
                'value' => 'Silakan pantau halaman ini secara berkala untuk mengetahui pembaruan jadwal, ketentuan, dan tahapan kegiatan penelitian.',
                'type' => 'textarea',
            ],

            // Penelitian Pengumuman Cards (Default)
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.1.title',
                'label' => 'Pengumuman 1: Judul',
                'value' => 'Pembukaan Hibah Internal Penelitian 2026',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.1.date',
                'label' => 'Pengumuman 1: Status',
                'value' => 'Status: Aktif',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.1.desc',
                'label' => 'Pengumuman 1: Deskripsi',
                'value' => 'LPPM membuka program hibah internal penelitian tahun 2026 bagi dosen tetap. Silakan persiapkan proposal sesuai format resmi.',
                'type' => 'textarea',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.1.long',
                'label' => 'Pengumuman 1: Detail List',
                'value' => "Batas submit proposal: 10 Februari 2026\nFormat proposal mengikuti template resmi LPPM\nPengajuan dilakukan melalui admin atau sistem yang ditentukan",
                'type' => 'textarea',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.1.image',
                'label' => 'Pengumuman 1: Poster',
                'value' => 'assets/images/pkm2024.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.1.url',
                'label' => 'Pengumuman 1: Link',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],

            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.2.title',
                'label' => 'Pengumuman 2: Judul',
                'value' => 'Revisi Proposal Penelitian',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.2.date',
                'label' => 'Pengumuman 2: Status',
                'value' => 'Status: Berjalan',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.2.desc',
                'label' => 'Pengumuman 2: Deskripsi',
                'value' => 'Dosen yang proposalnya telah melalui tahap evaluasi awal diwajibkan melakukan revisi sesuai masukan reviewer.',
                'type' => 'textarea',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.2.long',
                'label' => 'Pengumuman 2: Detail List',
                'value' => "Batas revisi proposal: 18 Februari 2026\nPastikan seluruh catatan reviewer telah ditindaklanjuti\nGunakan dokumen final yang telah diberi nama sesuai format",
                'type' => 'textarea',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.2.image',
                'label' => 'Pengumuman 2: Poster',
                'value' => 'assets/images/pkm2025.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.2.url',
                'label' => 'Pengumuman 2: Link',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],

            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.3.title',
                'label' => 'Pengumuman 3: Judul',
                'value' => 'Jadwal Seminar Proposal Penelitian',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.3.date',
                'label' => 'Pengumuman 3: Status',
                'value' => 'Status: Menunggu Jadwal',
                'type' => 'text',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.3.desc',
                'label' => 'Pengumuman 3: Deskripsi',
                'value' => 'Seminar proposal akan dilaksanakan setelah proses verifikasi berkas selesai. Siapkan file materi presentasi.',
                'type' => 'textarea',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.3.long',
                'label' => 'Pengumuman 3: Detail List',
                'value' => "Peserta wajib menyiapkan materi presentasi ringkas\nTim pengusul diharapkan hadir sesuai jadwal yang ditetapkan\nInformasi teknis seminar diumumkan lebih lanjut oleh LPPM",
                'type' => 'textarea',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.3.image',
                'label' => 'Pengumuman 3: Poster',
                'value' => 'assets/images/1.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'penelitian.pengumuman',
                'key' => 'penelitian.pengumuman.news.3.url',
                'label' => 'Pengumuman 3: Link',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],

            // Abdimas Pengumuman Hero Section
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.hero.badge',
                'label' => 'Hero Badge',
                'value' => 'Abdimas · Pengumuman',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.hero.title',
                'label' => 'Hero Title',
                'value' => 'Pengumuman Program Abdimas',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.hero.desc',
                'label' => 'Hero Deskripsi',
                'value' => 'Halaman ini berisi informasi terbaru terkait pengajuan proposal abdimas, monitoring lapangan, dan deseminasi hasil pengabdian masyarakat.',
                'type' => 'textarea',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.active_count',
                'label' => 'Stat 1 Angka',
                'value' => '2',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.active_label',
                'label' => 'Stat 1 Label',
                'value' => 'Pengumuman Aktif',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.period_count',
                'label' => 'Stat 2 Angka',
                'value' => '2026',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.period_label',
                'label' => 'Stat 2 Label',
                'value' => 'Periode Berjalan',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.deadline_count',
                'label' => 'Stat 3 Angka',
                'value' => '20 Feb',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.deadline_label',
                'label' => 'Stat 3 Label',
                'value' => 'Batas Pengajuan',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.admin_count',
                'label' => 'Stat 4 Angka',
                'value' => 'LPPM',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.stats.admin_label',
                'label' => 'Stat 4 Label',
                'value' => 'Pengelola',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.section.tag',
                'label' => 'Section Tag',
                'value' => 'Pengumuman Abdimas',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.section.title',
                'label' => 'Section Title',
                'value' => 'Informasi Terbaru Kegiatan Abdimas',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.section.desc',
                'label' => 'Section Deskripsi',
                'value' => 'Pantau halaman ini untuk mengetahui pembaruan jadwal pelaksanaan abdimas, monitoring lapangan, dan laporan akhir.',
                'type' => 'textarea',
            ],

            // Abdimas Pengumuman Cards (Default)
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.1.title',
                'label' => 'Pengumuman 1: Judul',
                'value' => 'Pembukaan Proposal Abdimas 2026',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.1.date',
                'label' => 'Pengumuman 1: Status',
                'value' => 'Status: Aktif',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.1.desc',
                'label' => 'Pengumuman 1: Deskripsi',
                'value' => 'LPPM membuka pengajuan proposal program pengabdian kepada masyarakat periode semester genap 2025/2026.',
                'type' => 'textarea',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.1.long',
                'label' => 'Pengumuman 1: Detail List',
                'value' => "Batas pengajuan proposal: 20 Februari 2026\nDokumen mengikuti format resmi LPPM\nProposal diserahkan sesuai mekanisme yang ditentukan",
                'type' => 'textarea',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.1.image',
                'label' => 'Pengumuman 1: Poster',
                'value' => 'assets/images/pkm2024.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.1.url',
                'label' => 'Pengumuman 1: Link',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],

            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.2.title',
                'label' => 'Pengumuman 2: Judul',
                'value' => 'Monitoring Program Abdimas Lapangan',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.2.date',
                'label' => 'Pengumuman 2: Status',
                'value' => 'Status: Terjadwal',
                'type' => 'text',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.2.desc',
                'label' => 'Pengumuman 2: Deskripsi',
                'value' => 'Kegiatan monitoring akan dilakukan untuk memastikan pelaksanaan abdimas di lapangan berjalan dengan lancar.',
                'type' => 'textarea',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.2.long',
                'label' => 'Pengumuman 2: Detail List',
                'value' => "Jadwal monitoring diumumkan oleh admin LPPM\nTim diwajibkan menyiapkan laporan progres singkat\nDokumentasi kegiatan harus tersedia saat monitoring",
                'type' => 'textarea',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.2.image',
                'label' => 'Pengumuman 2: Poster',
                'value' => 'assets/images/pkm2025.jpeg',
                'type' => 'image',
            ],
            [
                'page' => 'abdimas.pengumuman',
                'key' => 'abdimas.pengumuman.news.2.url',
                'label' => 'Pengumuman 2: Link',
                'value' => 'javascript:void(0)',
                'type' => 'text',
            ],
        ];

        foreach ($extraElements as $el) {
            \App\Models\PageContent::updateOrCreate(['key' => $el['key']], $el);
        }

        // Seed Dosen (Lecturers) from public/dosen/dosen-data.json
        $jsonPath = public_path('dosen/dosen-data.json');
        if (file_exists($jsonPath)) {
            $dosenData = json_decode(file_get_contents($jsonPath), true);
            if (is_array($dosenData)) {
                $prodiToPage = [
                    'Akuntansi' => 'dosen.akuntansi',
                    'Magister Akuntansi' => 'dosen.akuntansi',
                    'Manajemen' => 'dosen.manajemen',
                    'Magister Manajemen' => 'dosen.manajemen',
                    'Teknik Informatika' => 'dosen.teknikinformatika',
                    'Sistem Informasi' => 'dosen.sisteminformasi',
                    'Ilmu Komunikasi' => 'dosen.ilmukomunikasi',
                    'Administrasi Bisnis' => 'dosen.ilmuadministrasibisnis',
                ];

                $counters = [];

                foreach ($dosenData as $d) {
                    $prodi = $d['prodi'] ?? '';
                    $page = $prodiToPage[$prodi] ?? '';
                    if (!$page) continue;

                    if (!isset($counters[$page])) {
                        $counters[$page] = 1;
                    }
                    $id = $counters[$page]++;

                    $prefix = "{$page}.dosen.{$id}";

                    $fields = [
                        'title' => ['label' => 'Nama Dosen', 'value' => $d['nama'], 'type' => 'text'],
                        'badge' => ['label' => 'Program Studi', 'value' => $prodi, 'type' => 'text'],
                        'desc' => ['label' => 'Keahlian', 'value' => $d['keahlian'] ?? '-', 'type' => 'text'],
                        'url' => ['label' => 'Google Scholar ID (Opsional)', 'value' => $d['gsUser'] ?? '', 'type' => 'text'],
                        'image' => ['label' => 'Foto Dosen', 'value' => 'assets/images/pkm2024.jpeg', 'type' => 'image'],
                    ];

                    foreach ($fields as $field => $meta) {
                        \App\Models\PageContent::updateOrCreate(
                            ['key' => "{$prefix}.{$field}"],
                            [
                                'page' => $page,
                                'label' => $meta['label'],
                                'value' => $meta['value'],
                                'type' => $meta['type'],
                            ]
                        );
                    }
                }
            }
        }

        // Call MenuSeeder
        $this->call(MenuSeeder::class);
    }
}
