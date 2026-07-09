<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\rooms;
use App\Models\room_categories;
use Illuminate\Http\Request;

class AdminRooms extends Controller
{
    //
    public function index()
    {
        $rooms = rooms::with('category')->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function view($id)
{
    // Ubah $view menjadi $room
    $room = rooms::with('facilities')->findOrFail($id);

    // Kirim dengan nama compact('room')
    return view('admin.rooms.view', compact('room'));
}

    public function showCreateForm()
    {
        $category = room_categories::all();
        return view('admin.rooms.create', compact('category'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:255',
                'category_id' => 'required|exists:room_categories,id',
                'building' => 'required|string|max:255',
                'floor' => 'required|integer|min:1',
                'capacity' => 'required|integer|min:1',
                'description' => 'required|string',
                'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048',
                'is_active' => 'required|boolean',
                'open_time' => 'required',
                'close_time' => 'required',
            ],
            [
                'name.required' => 'Nama ruangan wajib diisi.',
                'code.required' => 'Kode ruangan wajib diisi.',
                'category_id.required' => 'Kategori ruangan wajib dipilih.',
                'category_id.exists' => 'Kategori yang dipilih tidak valid.',
                'building.required' => 'Gedung wajib diisi.',
                'floor.required' => 'Lantai wajib diisi.',
                'floor.integer' => 'Lantai harus berupa angka.',
                'capacity.required' => 'Kapasitas wajib diisi.',
                'capacity.integer' => 'Kapasitas harus berupa angka.',
                'description.required' => 'Deskripsi wajib diisi.',
                'image.required' => 'Gambar ruangan wajib diunggah.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.mimes' => 'Format gambar hanya boleh PNG, JPG, JPEG, atau WEBP.',
                'image.max' => 'Ukuran gambar maksimal 2 MB.',
                'is_active.required' => 'Status ruangan wajib dipilih.',
                'open_time.required' => 'Jam buka wajib diisi.',
                'close_time.required' => 'Jam tutup wajib diisi.',
            ],
        );

        // Simpan gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/rooms'), $imageName);

        // Simpan data ke database
        rooms::create([
            'name' => $validated['name'],
            'code' => $validated['code'],
            'category_id' => $validated['category_id'],
            'building' => $validated['building'],
            'floor' => $validated['floor'],
            'capacity' => $validated['capacity'],
            'description' => $validated['description'],
            'image' => $imageName,
            'is_active' => $validated['is_active'],
            'open_time' => $validated['open_time'],
            'close_time' => $validated['close_time'],
        ]);

        return redirect()->route('index-rooms')->with('success', 'Data ruangan berhasil ditambahkan.');
    }

    public function roomUpdateForm($id)
    {
        $room = rooms::findOrFail($id);
        $category = room_categories::all();

        return view('admin.rooms.update', compact('room', 'category'));
    }

    public function updateRoom(Request $request, $id)
    {
        $room = rooms::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'required',
            'building' => 'required',
            'floor' => 'required',
            'capacity' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'open_time' => 'required',
            'close_time' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($room->image && file_exists(public_path('uploads/rooms/' . $room->image))) {
                unlink(public_path('uploads/rooms/' . $room->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/rooms'), $imageName);

            $validated['image'] = $imageName;
        }

        // Jika tidak upload gambar baru, gambar lama tetap digunakan
        $room->update($validated);

        return redirect()->route('index-rooms')->with('success', 'Data ruangan berhasil diperbarui.');
    }

    public function destroyRoom($id)
    {
        $room = rooms::findOrFail($id);

        // Hapus file gambar jika ada
        if ($room->image && file_exists(public_path('uploads/rooms/' . $room->image))) {
            unlink(public_path('uploads/rooms/' . $room->image));
        }

        // Hapus data dari database
        $room->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('index-rooms')->with('success', 'Data ruangan berhasil dihapus.');
    }
}
