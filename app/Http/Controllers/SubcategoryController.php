<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function create()
    {
        return view('pages.addsubcat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255'
        ],[
            'required' => 'Заполните поле',
            'max' => 'Слишком длинное поле!'
        ]);

        Subcategory::query()->create($validated);

        return redirect()->route('profile', '#admin')->withErrors(['success'=>'Подкатегория добавлена!']);
    }

    public function delete(Subcategory $subcategory)
    {
        return view('pages.deletesubcat', compact('subcategory'));
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('profile', '#admin')->withErrors(['success'=>'Подкатегория удалена!']);
    }
}
