<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $categories = Category::latest('created_at')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function addCategory(){
        return view('admin.category.create');
    }
    public function insertCategory(Request $request){
        $request->validate([
            'name' => 'unique:categories,name|max:100|required'
        ]);
        
        Category::insert([
            'name' => $request->name,
            'icon' => $request->icon
        ]);
        return redirect()->back()->with('successmessage','Category Added successfully');
    }
    public function editCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function updateCategory(Request $request){
        $id = $request->category_id;
        $request->validate([
            'name' => 'required'
        ]);
        Category::whereId($id)->update([
            'name' => $request->name,
            'icon' => $request->icon
        ]);
        return redirect()->back()->with('successmessage','Category Updated successfully');
    }

    public function deleteCategory($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('successmessage','Category deleted successfully');
    }
}
