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
        } catch (\Throwable $e) {
            // Ignore during setup/migrations without database
        }
    }
}
