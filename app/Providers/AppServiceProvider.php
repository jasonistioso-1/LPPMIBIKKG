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
                $oldPenelitian = \App\Models\Menu::whereNull('parent_id')
                    ->where(function($q) {
                        $q->where('name', 'PENELITIAN')->orWhere('name', 'Penelitian');
                    })->first();
                $oldAbdimas = \App\Models\Menu::whereNull('parent_id')
                    ->where(function($q) {
                        $q->where('name', 'ABDIMAS')->orWhere('name', 'Abdimas');
                    })->first();

                if ($oldPenelitian || $oldAbdimas) {
                    $parent = $oldPenelitian ?? $oldAbdimas;
                    $parent->name = 'PENELITIAN & PKM';
                    $parent->route_name = 'penelitian.pengumuman';
                    $parent->order = 4;
                    $parent->save();

                    if ($oldPenelitian && $oldAbdimas && $oldPenelitian->id !== $oldAbdimas->id) {
                        \App\Models\Menu::where('parent_id', $oldAbdimas->id)->update(['parent_id' => $parent->id]);
                        $oldAbdimas->delete();
                    }

                    $c1 = \App\Models\Menu::where('parent_id', $parent->id)->where('route_name', 'penelitian.pengumuman')->first();
                    if ($c1) { $c1->update(['name' => 'Pengumuman Penelitian', 'order' => 1]); }

                    $c2 = \App\Models\Menu::where('parent_id', $parent->id)->where('route_name', 'penelitian.skema')->first();
                    if ($c2) { $c2->update(['name' => 'Skema Penelitian', 'order' => 2]); }

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

                    $c4 = \App\Models\Menu::where('parent_id', $parent->id)->where('route_name', 'abdimas.pengumuman')->first();
                    if ($c4) { $c4->update(['name' => 'Pengumuman PKM', 'order' => 4]); }

                    $c5 = \App\Models\Menu::where('parent_id', $parent->id)->where('route_name', 'abdimas.skema')->first();
                    if ($c5) { $c5->update(['name' => 'Skema PKM', 'order' => 5]); }

                    $c6 = \App\Models\Menu::where('parent_id', $parent->id)
                        ->where(function($q) {
                            $q->where('route_name', 'abdimas.data-abdimas')->orWhere('name', 'Data Abdimas');
                        })->first();
                    if ($c6) { $c6->update(['name' => 'Data PKM', 'order' => 6]); }

                    $orderMap = ['PUBLIKASI' => 5, 'SUBMIT' => 6, 'DOKUMEN' => 7, 'KONTAK' => 8];
                    foreach ($orderMap as $mName => $ord) {
                        \App\Models\Menu::whereNull('parent_id')->where('name', $mName)->update(['order' => $ord]);
                    }
                }
            }
        } catch (\Throwable $e) {
            // Ignore during setup/migrations without database
        }
    }
}
