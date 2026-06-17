<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\room_categories;
use Illuminate\Http\Request;

class Category extends Controller
{
    //

    public function index()
    {
        $dataCategory = room_categories::all();

        // dd($dataCategory);

        return view('admin.category.index', compact('dataCategory'));
    }

    public function view($id)
    {
        $view = room_categories::findOrFail($id);

        // dd($view);

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
        $updateCategory = room_categories::findOrFail($id);

        // dd($updateCategory);
        return view('admin.category.update', compact('updateCategory'));
    }

    public function update(Request $request, $id)
    {
        $category = room_categories::findOrFail($id);

        $category->update($request->all());

        return redirect()->route('index-category')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function destroy($id)
{
    $category = room_categories::findOrFail($id);

// dd($category);

    $category->delete();

    return redirect()
        ->route('index-category')
        ->with('success', 'Kategori berhasil dihapus.');
}
}
