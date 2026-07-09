<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\room_categories;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function index()
    {
        $dataCategory = room_categories::all();
        return view('admin.category.index', compact('dataCategory'));
    }

    public function view($id)
    {
        $view = room_categories::findOrFail($id);
        return view('admin.category.view', compact('view'));
    }

    public function showCreateForm()
    {
        return view('admin.category.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:room_categories,slug',
            'icon' => 'nullable',
            'color' => 'nullable',
            'description' => 'nullable',
            'max_booking_days_ahead' => 'required|integer',
            'max_duration_hours' => 'required|integer',
            'min_duration_minutes' => 'required|integer',
            'requires_approval' => 'required|boolean',
            'is_active' => 'required|boolean',
            'sort_order' => 'required|integer',
        ]);

        room_categories::create($request->all());

        return redirect()->route('index-category')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function showUpdateForm($id)
    {
        $category = room_categories::findOrFail($id);

        return view('admin.category.update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Cari data kategori berdasarkan ID, ganti 'Category' dengan nama Model Kategori Anda (misal: RoomCategory)
        $category = room_categories::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:room_categories,slug,' . $id, // sesuaikan nama tabel kategori Anda
            'icon' => 'nullable|string|max:255',
            'color' => 'required|string|max:7',
            'description' => 'nullable|string',
            'max_booking_days_ahead' => 'required|integer|min:0',
            'max_duration_hours' => 'required|integer|min:0',
            'min_duration_minutes' => 'required|integer|min:0',
            'sort_order' => 'required|integer|min:0',
        ]);

        // Ambil semua input data
        $input = $request->all();

        // Checkbox di HTML tidak mengirimkan data jika tidak dicentang,
        // jadi kita set manual nilainya ke 0 jika kosong.
        $input['requires_approval'] = $request->has('requires_approval') ? 1 : 0;
        $input['is_active'] = $request->has('is_active') ? 1 : 0;

        // Update data kategori
        $category->update($input);

        // Redirect ke halaman indeks kategori
        return redirect()->route('index-category')->with('success', 'Kategori ruangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = room_categories::findOrFail($id);
        $category->delete();

        return redirect()->route('index-category')->with('success', 'Kategori berhasil dihapus.');
    }
}
