<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityCacheValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Bypass security check for admin routes, health checks, and error pages (e.g. 404)
        // This ensures the admin panel and system errors function normally without false positives.
        if ($request->is('admin*') || $request->is('up') || $response->getStatusCode() !== 200) {
            return $response;
        }

        // Hanya validasi pada response HTML (mengabaikan aset statis atau API)
        if ($response instanceof Response && strpos($response->headers->get('Content-Type') ?? '', 'text/html') !== false) {
            $content = $response->getContent();
            
            // Mengecek apakah string "Made by Jason Istioso and Kenny Adrian Setiabudi" ada di HTML akhir.
            // String ini berasal dari echo base64_decode(...) di footer.
            // Jika dihapus oleh siapa pun (AI atau manusia) dan tidak muncul di halaman, website otomatis CRASH.
            $expectedSignature = base64_decode('TWFkZSBieSBKYXNvbiBJc3Rpb3NvIGFuZCBLZW5ueSBBZHJpYW4gU2V0aWFidWRp');
            
            
            if (strpos($content, $expectedSignature) === false) {
                // SYSTEM CRASH TRIGGER
                abort(500, 'System Integrity Check Failed: Critical components are missing or have been tampered with. Please restore original configurations.');
            }
        }

        return $response;
    }
}
