<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\roomfacilities;
use Illuminate\Http\Request;
use App\Models\rooms;

class AdminFacilities extends Controller
{
    //
    public function index()
    {
        $facilities = roomfacilities::with('roomName')->get();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function showFormFacilities()
    {
        $rooms = rooms::all();

        return view('admin.facilities.create', compact('rooms'));
    }

    public function facilitiesSubmit(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'condition' => 'required',
        ]);

        roomfacilities::create([
            'room_id' => $request->room_id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'condition' => $request->condition,
        ]);

        return redirect()->route('facility-index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function detailFacilities($id)
    {
        $view = roomfacilities::findOrFail($id);

        // dd($view);

        return view('admin.facilities.detail', compact('view'));
    }

    public function updateFacilitiesForm($id)
    {
        $update = roomfacilities::findOrFail($id);
        $rooms = rooms::all();

        return view('admin.facilities.update', compact('update', 'rooms'));
    }
    public function updateFacilities(Request $request, $id)
    {
        $update = roomfacilities::findOrFail($id);

        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'condition' => 'required',
        ]);

        $update->update([
            'room_id' => $request->room_id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'condition' => $request->condition,
        ]);

        return redirect()->route('facility-index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroyFacilities($id)
    {
        $facility = roomfacilities::findOrFail($id);

        $facility->delete();

        return redirect()->route('facility-index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
