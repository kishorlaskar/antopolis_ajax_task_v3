<?php
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category',compact('categories'));
    }
    public function save  (Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name,
        $category->category_description = $request->category_description,
        $category->publication_status = $request->publication_status,
        $cat = $category->save();
           if ($cat)
           {
               return response()->json([
                   'success' => true,
                   'message' => 'data save succesfully'
               ]);
           }
           else
               {
               return response()->json([
                   'success' => false,
                   'message' => 'Failed to store'
               ]);
           }

    }
}
