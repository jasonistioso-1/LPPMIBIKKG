<?php




namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enforce core system constraints dynamically (Anti-Bypass Professional Pattern)
        app('router')->pushMiddlewareToGroup('web', \App\Http\Middleware\SecurityCacheValidator::class);

        // Seamless auto-migration for PENELITIAN & PKM and SELARAS menu
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('menus')) {
                $parent = \App\Models\Menu::whereNull('parent_id')
                    ->where(function($q) {
                        $q->where('name', 'PENELITIAN & PKM')
                          ->orWhere('name', 'Penelitian dan PKM')
                          ->orWhere('name', 'PENELITIAN')
                          ->orWhere('name', 'Penelitian');
                    })->first();

                if ($parent) {
                    $parent->name = 'PENELITIAN & PKM';
                    $parent->route_name = 'penelitian.pengumuman';
                    $parent->order = 4;
                    $parent->save();

                    // Delete old ABDIMAS parent menu if still exists
                    \App\Models\Menu::whereNull('parent_id')
                        ->where(function($q) {
                            $q->where('name', 'ABDIMAS')->orWhere('name', 'Abdimas');
                        })->delete();

                    // Delete the three PKM submenus
                    \App\Models\Menu::where('parent_id', $parent->id)
                        ->where(function($q) {
                            $q->whereIn('name', ['Pengumuman PKM', 'Skema PKM', 'Data PKM', 'Data Abdimas'])
                              ->orWhereIn('route_name', ['abdimas.pengumuman', 'abdimas.skema', 'abdimas.data-abdimas']);
                        })->delete();

                    $c1 = \App\Models\Menu::where('parent_id', $parent->id)
                        ->where(function($q) {
                            $q->where('route_name', 'penelitian.pengumuman')
                              ->orWhere('name', 'Pengumuman')
                              ->orWhere('name', 'Pengumuman Penelitian');
                        })->first();
                    if ($c1) { $c1->update(['name' => 'Pengumuman', 'route_name' => 'penelitian.pengumuman', 'order' => 1]); }

                    $c2 = \App\Models\Menu::where('parent_id', $parent->id)
                        ->where(function($q) {
                            $q->where('route_name', 'penelitian.skema')
                              ->orWhere('name', 'Skema')
                              ->orWhere('name', 'Skema Penelitian');
                        })->first();
                    if ($c2) { $c2->update(['name' => 'Skema', 'route_name' => 'penelitian.skema', 'order' => 2]); }

                    $c3 = \App\Models\Menu::where('parent_id', $parent->id)
                        ->where(function($q) {
                            $q->where('route_name', 'penelitian.data-penelitian')
                              ->orWhere('name', 'Data Penelitian')
                              ->orWhere('name', 'SELARAS');
                        })->first();
                    if ($c3) {
                        $c3->update(['name' => 'SELARAS', 'route_name' => null, 'url' => 'https://selaraslppmkkg.info/', 'order' => 3]);
                    } else {
                        \App\Models\Menu::create(['parent_id' => $parent->id, 'name' => 'SELARAS', 'url' => 'https://selaraslppmkkg.info/', 'order' => 3]);
                    }

                    $orderMap = ['PUBLIKASI' => 5, 'SUBMIT' => 6, 'DOKUMEN' => 7, 'KONTAK' => 8];
                    foreach ($orderMap as $mName => $ord) {
                        \App\Models\Menu::whereNull('parent_id')->where('name', $mName)->update(['order' => $ord]);
                    }
                }
            }

            // Auto-sync Serah Terima Jabatan news & hero slide into PageContent seamlessly
            if (\Illuminate\Support\Facades\Schema::hasTable('page_contents')) {
                $checkNews = \App\Models\PageContent::where('key', 'home.news.1.title')->first();
                if (!$checkNews || !str_contains($checkNews->value, 'Serah Terima Jabatan')) {
                    for ($i = 7; $i >= 1; $i--) {
                        $next = $i + 1;
                        $items = \App\Models\PageContent::where('key', 'like', "home.news.{$i}.%")->get();
                        foreach ($items as $item) {
                            $suffix = substr($item->key, strlen("home.news.{$i}."));
                            $newKey = "home.news.{$next}.{$suffix}";
                            \App\Models\PageContent::where('key', $newKey)->delete();
                            $item->key = $newKey;
                            $item->label = str_replace("Berita {$i}:", "Berita {$next}:", $item->label);
                            $item->save();
                        }
                    }

                    $title = "Serah Terima Jabatan LPPM: Kepala Bidang Penelitian Dr. Zulfikar Ikhsan Pane kepada Dr. Roni Sirait";
                    $date = "2 November 2026";
                    $image = "assets/images/serah_terima_penelitian_crop.jpg";
                    $url = "/penelitian/pengumuman";
                    $long = '<p><strong>JAKARTA</strong> &mdash; Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Institut Bisnis dan Informatika Kwik Kian Gie menyelenggarakan prosesi resmi <strong>Serah Terima Jabatan Kepala Bidang Penelitian</strong> pada hari <strong>Senin, 2 November 2026</strong>, bertempat di Kampus IBI Kwik Kian Gie, pukul <strong>10.00 s.d. 11.30 WIB</strong>.</p>' . "\n\n" .
                            '<p>Dalam agenda penting ini, amanah kepemimpinan Kepala Bidang Penelitian LPPM secara resmi diserahterimakan dari pejabat lama, <strong>Dr. Zulfikar Ikhsan Pane, S.E., Ak.</strong>, kepada pejabat baru, <strong>Dr. Ronnie Togar Mulia Sirait, S.E., M.M.</strong> (Dr. Roni Sirait).</p>' . "\n\n" .
                            '<p>Prosesi serah terima jabatan ini berlangsung secara khidmat dan disaksikan langsung oleh jajaran pimpinan institut, dekanat, pimpinan program studi, serta pengurus LPPM IBI Kwik Kian Gie. Penyerahan dokumen kerja dan wewenang ini menandai kelanjutan estafet kepemimpinan riset dalam rangka memperkuat tata kelola penelitian, peningkatan publikasi ilmiah bereputasi, serta hilirisasi inovasi karya dosen.</p>' . "\n\n" .
                            '<p>Segenap civitas akademika dan keluarga besar LPPM IBI Kwik Kian Gie menyampaikan apresiasi dan terima kasih yang sebesar-besarnya kepada <strong>Dr. Zulfikar Ikhsan Pane, S.E., Ak.</strong> atas dedikasi serta kontribusi luar biasa selama masa pengabdiannya, serta menyampaikan selamat bertugas dan sukses kepada <strong>Dr. Ronnie Togar Mulia Sirait, S.E., M.M.</strong> dalam memimpin Bidang Penelitian LPPM IBI KKG ke depan.</p>';

                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.news.1.title'],
                        ['page' => 'home', 'label' => 'Berita 1: Judul', 'value' => $title, 'type' => 'text']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.news.1.date'],
                        ['page' => 'home', 'label' => 'Berita 1: Tanggal', 'value' => $date, 'type' => 'text']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.news.1.image'],
                        ['page' => 'home', 'label' => 'Berita 1: Gambar', 'value' => $image, 'type' => 'image']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.news.1.url'],
                        ['page' => 'home', 'label' => 'Berita 1: URL/Rute', 'value' => $url, 'type' => 'text']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.news.1.long'],
                        ['page' => 'home', 'label' => 'Berita 1: Konten Detail (HTML)', 'value' => $long, 'type' => 'textarea']
                    );

                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.slide.1.title'],
                        ['page' => 'home', 'label' => 'Slide 1: Title', 'value' => 'Serah Terima Jabatan LPPM', 'type' => 'text']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.slide.1.badge'],
                        ['page' => 'home', 'label' => 'Slide 1: Badge', 'value' => 'Sertijab Penelitian', 'type' => 'text']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.slide.1.desc'],
                        ['page' => 'home', 'label' => 'Slide 1: Desc', 'value' => 'Serah Terima Jabatan Kepala Bidang Penelitian LPPM IBI KKG dari Dr. Zulfikar Ikhsan Pane kepada Dr. Roni Sirait.', 'type' => 'textarea']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.slide.1.image'],
                        ['page' => 'home', 'label' => 'Slide 1: Image', 'value' => $image, 'type' => 'image']
                    );
                    \App\Models\PageContent::updateOrCreate(
                        ['key' => 'home.slide.1.url'],
                        ['page' => 'home', 'label' => 'Slide 1: Url', 'value' => $url, 'type' => 'text']
                    );
                }
            }
        } catch (\Throwable $e) {
            // Ignore during setup/migrations without database
        }
    }
}
