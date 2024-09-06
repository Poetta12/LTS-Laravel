<?php

namespace App\Http\Controllers\View;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryViewController extends Controller //Classe qui va servir de controller pour afficher les pages
{
    public function index()
    {
        return view('categories.index', ['category' => Category::all()]);
    }

    public function showProductList(Category $id)
    {
        /*$category=Categorie::where('id', $id)->get(); */

        //$id > produits()->where('categories_id', $id)->get();

        return view('categories.product_listing', ['category' => $id]);
    }

    public function create()
    {

        return view('categories.create');
    }

    public function store(Request $request)
    {

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('/category');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.update', compact('category'));
    }

    public function update(Request $request, Category $id)
    {

        $id->name = $request->name;
        $id->save();

        return redirect('/category');

    }

    public function delete( $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();


        return redirect('/category');
    }
}
