<?php
namespace App\Http\Controllers\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

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
        $categorie = Categories::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Category created successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $categories = Categories::where('name', 'like', '%' . $query . '%')->get();
    
        return view('categories.search_results', compact('categories'));
    }

    public function deleteAll(Request $request)
    {
        $selectedCategoryIds = $request->input('selectedCategories');
    
        if (is_array($selectedCategoryIds) && count($selectedCategoryIds) > 0) {
            Categories::whereIn('id', $selectedCategoryIds)->delete();
        } else {
            return redirect()->route('events.index')->with('error', 'No categories selected for deletion.');
        }
    
        return redirect()->route('events.index')->with('success', 'Category(s) deleted successfully.');
    }
    


}