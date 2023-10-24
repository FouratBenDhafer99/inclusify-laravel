<?php
namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryEvent;

class CategorieController extends Controller
{
    public function index()
    {
        // Your logic to retrieve and display a list of categories goes here
    }


    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Create a new category without timestamps
        $categorie = CategoryEvent::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('admin.events.list')
            ->with('success', 'Category created successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $categories = CategoryEvent::where('name', 'like', '%' . $query . '%')->get();

        return view('categories.search_results', compact('categories'));
    }

    public function deleteAll(Request $request)
    {
        $selectedCategoryIds = $request->input('selectedCategories');

        if (is_array($selectedCategoryIds) && count($selectedCategoryIds) > 0) {
            CategoryEvent::whereIn('id', $selectedCategoryIds)->delete();
        } else {
            return redirect()->route('admin.events')->with('error', 'No categories selected for deletion.');
        }

        return redirect()->route('admin.events')->with('success', 'Category(s) deleted successfully.');
    }

    public function edit($id)
    {
        $category = CategoryEvent::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = CategoryEvent::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.events', ['activeTab' => 'categoryTab'])->with('success', 'Category updated successfully.');
    }



}
