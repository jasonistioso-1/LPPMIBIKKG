<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    /**
     * Store a newly created menu item.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'parent_id' => 'nullable|exists:menus,id',
            'route_name' => 'nullable|string|max:100',
            'url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        Menu::create([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'route_name' => $request->input('route_name'),
            'url' => $request->input('url'),
            'order' => $request->input('order', 0),
        ]);

        return back()->with('success', 'Menu baru berhasil ditambahkan secara live!');
    }

    /**
     * Update the specified menu item.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'parent_id' => 'nullable|exists:menus,id',
            'route_name' => 'nullable|string|max:100',
            'url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update([
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'route_name' => $request->input('route_name'),
            'url' => $request->input('url'),
            'order' => $request->input('order', 0),
        ]);

        return back()->with('success', 'Informasi menu berhasil diperbarui!');
    }

    /**
     * Remove the specified menu item.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return back()->with('success', 'Menu beserta seluruh sub-menunya berhasil dihapus!');
    }
}
