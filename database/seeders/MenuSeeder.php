<?php




namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing menus first to prevent duplicates
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Menu::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // Copy missing images if necessary
        $akuntansi_image = public_path('assets/images/dosen/akre_akuntansi.jpg');
        if (!file_exists($akuntansi_image)) {
            $adbis_image = public_path('assets/images/dosen/akre_adbis.jpg');
            if (file_exists($adbis_image)) {
                copy($adbis_image, $akuntansi_image);
            }
        }
        $manajemen_image = public_path('assets/images/dosen/akre_manajemen.jpg');
        if (!file_exists($manajemen_image)) {
            $mana_image = public_path('assets/images/dosen/akre_mana.jpeg');
            if (file_exists($mana_image)) {
                copy($mana_image, $manajemen_image);
            }
        }

        // 1. BERANDA
        Menu::create([
            'name' => 'BERANDA',
            'route_name' => 'home',
            'order' => 1,
        ]);

        // 2. PROFIL
        $profil = Menu::create([
            'name' => 'PROFIL',
            'route_name' => 'profil.tentang-kami',
            'order' => 2,
        ]);
        Menu::create(['parent_id' => $profil->id, 'name' => 'Tentang Kami', 'route_name' => 'profil.tentang-kami', 'order' => 1]);
        Menu::create(['parent_id' => $profil->id, 'name' => 'Visi & Misi', 'route_name' => 'profil.visi-misi', 'order' => 2]);
        Menu::create(['parent_id' => $profil->id, 'name' => 'Struktur Organisasi', 'route_name' => 'profil.struktur-organisasi', 'order' => 3]);
        Menu::create(['parent_id' => $profil->id, 'name' => 'Prestasi', 'route_name' => 'profil.prestasi', 'order' => 4]);

        // 3. AKADEMISI
        $akademisi = Menu::create([
            'name' => 'AKADEMISI',
            'route_name' => 'dosen.ilmuadministrasibisnis',
            'order' => 3,
        ]);
        Menu::create(['parent_id' => $akademisi->id, 'name' => 'Ilmu Administrasi Bisnis', 'route_name' => 'dosen.ilmuadministrasibisnis', 'order' => 1]);
        Menu::create(['parent_id' => $akademisi->id, 'name' => 'Akuntansi', 'route_name' => 'dosen.akuntansi', 'order' => 2]);
        Menu::create(['parent_id' => $akademisi->id, 'name' => 'Manajemen', 'route_name' => 'dosen.manajemen', 'order' => 3]);
        Menu::create(['parent_id' => $akademisi->id, 'name' => 'Ilmu Komunikasi', 'route_name' => 'dosen.ilmukomunikasi', 'order' => 4]);
        Menu::create(['parent_id' => $akademisi->id, 'name' => 'Sistem Informasi', 'route_name' => 'dosen.sisteminformasi', 'order' => 5]);
        Menu::create(['parent_id' => $akademisi->id, 'name' => 'Teknik Informatika', 'route_name' => 'dosen.teknikinformatika', 'order' => 6]);

        // 4. PENELITIAN & PKM
        $penelitianPkm = Menu::create([
            'name' => 'PENELITIAN & PKM',
            'route_name' => 'penelitian.pengumuman',
            'order' => 4,
        ]);
        Menu::create(['parent_id' => $penelitianPkm->id, 'name' => 'Pengumuman Penelitian', 'route_name' => 'penelitian.pengumuman', 'order' => 1]);
        Menu::create(['parent_id' => $penelitianPkm->id, 'name' => 'Skema Penelitian', 'route_name' => 'penelitian.skema', 'order' => 2]);
        Menu::create(['parent_id' => $penelitianPkm->id, 'name' => 'SELARAS', 'url' => 'https://selaraslppmkkg.info/', 'order' => 3]);
        Menu::create(['parent_id' => $penelitianPkm->id, 'name' => 'Pengumuman PKM', 'route_name' => 'abdimas.pengumuman', 'order' => 4]);
        Menu::create(['parent_id' => $penelitianPkm->id, 'name' => 'Skema PKM', 'route_name' => 'abdimas.skema', 'order' => 5]);
        Menu::create(['parent_id' => $penelitianPkm->id, 'name' => 'Data PKM', 'route_name' => 'abdimas.data-abdimas', 'order' => 6]);

        // 5. PUBLIKASI
        $publikasi = Menu::create([
            'name' => 'PUBLIKASI',
            'route_name' => 'publikasi.jurnal',
            'order' => 5,
        ]);
        Menu::create(['parent_id' => $publikasi->id, 'name' => 'Jurnal', 'route_name' => 'publikasi.jurnal', 'order' => 1]);
        Menu::create(['parent_id' => $publikasi->id, 'name' => 'Prosiding', 'route_name' => 'publikasi.prosiding', 'order' => 2]);
        Menu::create(['parent_id' => $publikasi->id, 'name' => 'Artikel Ilmiah', 'route_name' => 'publikasi.artikel-ilmiah', 'order' => 3]);

        // 6. SUBMIT
        Menu::create([
            'name' => 'SUBMIT',
            'url' => 'https://linktr.ee/lppmkkg?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAb21jcARV2mBleHRuA2FlbQIxMQBzcnRjBmFwcF9pZA81NjcwNjczNDMzNTI0MjcAAafTUkyVZTPIEdYv3YA75ggeg88EUVuc7PPWR_iW7NUnzA2H2WRV_vXbLpHn3g_aem_SeaeWPaf6-dTQwW8Hb-ZuQ',
            'order' => 6,
        ]);

        // 7. DOKUMEN
        $dokumen = Menu::create([
            'name' => 'DOKUMEN',
            'route_name' => 'dokumen.panduan',
            'order' => 7,
        ]);
        Menu::create(['parent_id' => $dokumen->id, 'name' => 'Panduan', 'route_name' => 'dokumen.panduan', 'order' => 1]);
        Menu::create(['parent_id' => $dokumen->id, 'name' => 'Template', 'route_name' => 'dokumen.template', 'order' => 2]);
        Menu::create(['parent_id' => $dokumen->id, 'name' => 'Unduhan', 'route_name' => 'dokumen.unduhan', 'order' => 3]);

        // 8. KONTAK
        $kontak = Menu::create([
            'name' => 'KONTAK',
            'route_name' => 'kontak.informasi-kontak',
            'order' => 8,
        ]);
        Menu::create(['parent_id' => $kontak->id, 'name' => 'Informasi', 'route_name' => 'kontak.informasi-kontak', 'order' => 1]);
        Menu::create(['parent_id' => $kontak->id, 'name' => 'Jam Layanan', 'route_name' => 'kontak.jam-layanan', 'order' => 2]);
        Menu::create(['parent_id' => $kontak->id, 'name' => 'Lokasi', 'route_name' => 'kontak.lokasi-kampus', 'order' => 3]);
    }
}
