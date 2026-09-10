<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;

class AdminCMSController extends Controller
{
    /**
     * Display the Admin CMS Dashboard.
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Save dynamic content updates and handle file/image uploads.
     */
    public function update(Request $request)
    {
        // 1. Process all standard text/textarea inputs
        if ($request->has('fields')) {
            foreach ($request->input('fields') as $key => $value) {
                PageContent::where('key', $key)->update([
                    'value' => $value
                ]);
            }
        }

        // 2. Process all uploaded file/image inputs
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                if ($file->isValid()) {
                    // Generate unique filename and store it in public/uploads/
                    $filename = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                    
                    // Move it directly into public/uploads
                    $file->move(public_path('uploads'), $filename);
                    
                    // Save path relative to public/
                    $path = 'uploads/' . $filename;
                    
                    PageContent::where('key', $key)->update([
                        'value' => $path
                    ]);
                }
            }
        }

        return back()->with('success', 'Seluruh konten dan gambar berhasil diperbarui secara real-time!');
    }

    /**
     * AJAX Endpoint for Visual Inline CMS Updates.
     */
    public function updateAjax(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'nullable|string',
            'image' => 'nullable|image|max:4096', // Support up to 4MB
        ]);

        $key = $request->input('key');
        $content = PageContent::firstOrCreate(
            ['key' => $key],
            [
                'page' => explode('.', $key)[0] ?? 'general',
                'label' => ucwords(str_replace(['.', '_'], ' ', $key)),
                'value' => '',
                'type' => $request->hasFile('image') ? 'image' : 'text',
            ]
        );

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = str_replace('.', '_', $key) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $path = 'uploads/' . $filename;
                
                $content->update(['value' => $path]);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Gambar berhasil diperbarui secara instan!',
                    'value' => asset($path)
                ]);
            }
        }

        $value = $request->input('value');
        $content->update(['value' => $value]);

        return response()->json([
            'success' => true,
            'message' => 'Konten berhasil diperbarui secara instan!',
            'value' => $value
        ]);
    }

    /**
     * AJAX Endpoint for adding a new dynamic section card (Layanan, Berita, Video).
     */
    public function addCardAjax(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:service,news,video,slide,dosen',
            'page' => 'nullable|string',
            'title' => 'required|string',
            'desc' => 'nullable|string',
            'date' => 'nullable|string',
            'url' => 'nullable|string',
            'long' => 'nullable|string',
            'badge' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
        ]);

        $type = $request->input('type');
        $page = $request->input('page', 'home');
        
        // Compute next ID
        $keys = PageContent::where('key', 'like', "{$page}.{$type}.%.title")->pluck('key');
        $maxId = 0;
        foreach ($keys as $key) {
            $parts = explode('.', $key);
            $id = intval($parts[2] ?? 0);
            if ($id > $maxId) {
                $maxId = $id;
            }
        }
        $nextId = $maxId + 1;

        // Image upload handling
        $imagePath = 'assets/images/pkm2024.jpeg'; // default placeholder
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = "{$page}_{$type}_{$nextId}_image_" . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $imagePath = 'uploads/' . $filename;
            }
        }

        // Insert fields into PageContent table
        if ($type === 'service') {
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.service.{$nextId}.title",
                'label' => "Layanan {$nextId}: Judul",
                'value' => $request->input('title'),
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.service.{$nextId}.desc",
                'label' => "Layanan {$nextId}: Deskripsi",
                'value' => $request->input('desc') ?? '',
                'type' => 'textarea'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.service.{$nextId}.image",
                'label' => "Layanan {$nextId}: Gambar",
                'value' => $imagePath,
                'type' => 'image'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.service.{$nextId}.url",
                'label' => "Layanan {$nextId}: URL Tujuan",
                'value' => $request->input('url') ?? '/penelitian/pengumuman',
                'type' => 'text'
            ]);
        } elseif ($type === 'news') {
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.news.{$nextId}.title",
                'label' => "Berita {$nextId}: Judul",
                'value' => $request->input('title'),
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.news.{$nextId}.date",
                'label' => "Berita {$nextId}: Tanggal",
                'value' => $request->input('date') ?? date('d F Y'),
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.news.{$nextId}.image",
                'label' => "Berita {$nextId}: Gambar",
                'value' => $imagePath,
                'type' => 'image'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.news.{$nextId}.url",
                'label' => "Berita {$nextId}: URL/Rute",
                'value' => $request->input('url') ?? 'javascript:void(0)',
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.news.{$nextId}.long",
                'label' => "Berita {$nextId}: Konten Detail (HTML)",
                'value' => $request->input('long') ?? '',
                'type' => 'textarea'
            ]);
        } elseif ($type === 'video') {
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.video.{$nextId}.title",
                'label' => "Video {$nextId}: Judul",
                'value' => $request->input('title'),
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.video.{$nextId}.desc",
                'label' => "Video {$nextId}: Deskripsi",
                'value' => $request->input('desc') ?? '',
                'type' => 'textarea'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.video.{$nextId}.image",
                'label' => "Video {$nextId}: Thumbnail",
                'value' => $imagePath,
                'type' => 'image'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.video.{$nextId}.url",
                'label' => "Video {$nextId}: URL/Link Video",
                'value' => $request->input('url') ?? 'javascript:void(0)',
                'type' => 'text'
            ]);
        } elseif ($type === 'slide') {
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.slide.{$nextId}.title",
                'label' => "Slide {$nextId}: Judul",
                'value' => $request->input('title'),
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.slide.{$nextId}.badge",
                'label' => "Slide {$nextId}: Badge",
                'value' => $request->input('badge') ?? '',
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.slide.{$nextId}.desc",
                'label' => "Slide {$nextId}: Deskripsi",
                'value' => $request->input('desc') ?? '',
                'type' => 'textarea'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.slide.{$nextId}.image",
                'label' => "Slide {$nextId}: Gambar",
                'value' => $imagePath,
                'type' => 'image'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.slide.{$nextId}.url",
                'label' => "Slide {$nextId}: URL Tujuan",
                'value' => $request->input('url') ?? '#',
                'type' => 'text'
            ]);
        } elseif ($type === 'dosen') {
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.dosen.{$nextId}.title",
                'label' => "Nama Dosen",
                'value' => $request->input('title'),
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.dosen.{$nextId}.badge",
                'label' => "Program Studi",
                'value' => $request->input('badge') ?? '',
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.dosen.{$nextId}.desc",
                'label' => "Keahlian",
                'value' => $request->input('desc') ?? '',
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.dosen.{$nextId}.url",
                'label' => "Google Scholar ID (Opsional)",
                'value' => $request->input('url') ?? '',
                'type' => 'text'
            ]);
            PageContent::create([
                'page' => $page,
                'key' => "{$page}.dosen.{$nextId}.image",
                'label' => "Foto Dosen",
                'value' => $imagePath,
                'type' => 'image'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Item baru berhasil ditambahkan!',
            'id' => $nextId
        ]);
    }

    /**
     * AJAX Endpoint for deleting a dynamic section card.
     */
    public function deleteCardAjax(Request $request)
    {
        $request->validate([
            'prefix' => 'required|string',
        ]);

        $prefix = $request->input('prefix');

        if (!preg_match('/^[a-z_]+\.(service|news|video|slide|dosen)\.\d+$/', $prefix)) {
            return response()->json([
                'success' => false,
                'message' => 'Format prefix tidak valid!'
            ], 400);
        }

        PageContent::where('key', 'like', "{$prefix}.%")->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus secara permanen!'
        ]);
    }

    /**
     * AJAX Endpoint for updating an existing dynamic section card.
     */
    public function updateCardAjax(Request $request)
    {
        $request->validate([
            'key' => 'required|string', // E.g., home.service.1
            'type' => 'required|string|in:service,news,video,slide,dosen',
            'title' => 'required|string',
            'desc' => 'nullable|string',
            'date' => 'nullable|string',
            'url' => 'nullable|string',
            'long' => 'nullable|string',
            'badge' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
        ]);

        $prefix = $request->input('key');
        $type = $request->input('type');
        $page = explode('.', $prefix)[0];

        // 1. Update Title
        PageContent::updateOrCreate(
            ['key' => "{$prefix}.title"],
            ['page' => $page, 'value' => $request->input('title')]
        );

        // 2. Update Desc/Date/Badge
        if ($type === 'news') {
            PageContent::updateOrCreate(
                ['key' => "{$prefix}.date"],
                ['page' => $page, 'value' => $request->input('date')]
            );
            PageContent::updateOrCreate(
                ['key' => "{$prefix}.long"],
                ['page' => $page, 'value' => $request->input('long', '')]
            );
        } elseif ($type === 'slide' || $type === 'dosen') {
            PageContent::updateOrCreate(
                ['key' => "{$prefix}.desc"],
                ['page' => $page, 'value' => $request->input('desc', '')]
            );
            PageContent::updateOrCreate(
                ['key' => "{$prefix}.badge"],
                ['page' => $page, 'value' => $request->input('badge', '')]
            );
        } else {
            PageContent::updateOrCreate(
                ['key' => "{$prefix}.desc"],
                ['page' => $page, 'value' => $request->input('desc', '')]
            );
        }

        // 3. Update URL
        PageContent::updateOrCreate(
            ['key' => "{$prefix}.url"],
            ['page' => $page, 'value' => $request->input('url', '')]
        );

        // 4. Update Image (if uploaded)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $parts = explode('.', $prefix);
                $id = $parts[2] ?? time();
                
                $filename = "{$page}_{$type}_{$id}_image_" . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $imagePath = 'uploads/' . $filename;

                PageContent::updateOrCreate(
                    ['key' => "{$prefix}.image"],
                    ['page' => $page, 'value' => $imagePath]
                );
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Kartu berhasil diperbarui!'
        ]);
    }
}
