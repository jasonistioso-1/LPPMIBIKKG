<?php




namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = ['page', 'key', 'label', 'value', 'type'];

    /**
     * Get the dynamic page content value, fallback to default and auto-seed if not found.
     */
    public static function getValue($key, $default, $type = 'text', $page = 'general', $label = null)
    {
        $content = self::where('key', $key)->first();
        if (!$content) {
            $content = self::create([
                'page' => $page,
                'key' => $key,
                'label' => $label ?? ucwords(str_replace(['.', '_'], ' ', $key)),
                'value' => $default,
                'type' => $type,
            ]);
        }
        return ($content && $content->value !== null) ? $content->value : $default;
    }
}
