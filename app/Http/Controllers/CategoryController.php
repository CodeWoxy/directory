<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $r)
    {
        $category= Category::all();
        return view('admin.categories.category',['category'=> $category]);
    }
    public function add(Request $r)
    {
        $category= Category::all();
        return view('admin.categories.categoryAdd',['category'=> $category]);
    }

    public function up (Request $r)
    {
        $c = Category::create(['name' => $r->name]);
        if($c->save()){
            return redirect()->route('admin-cats')->with('success', "Category Added!");
        }else{
            return redirect()->back()->with('error', "Category not saved!");
        }
    }
    public function updateView (Request $r)
    {
        $category= Category::find($r->id)->first();
        return view('admin.categories.categoryUpdate',['category'=> $category]);
    }

    public function update(Request $r)
    {
        $c = Category::find($r->id);
        $c->name = $r->name;

        if($c->save()){
            return redirect()->route('admin-cats')->with('success', "Category Updated!");
        }else{
            return redirect()->back()->with('error', "Category was not updated!");
        }
    }
    public function categorydelete(Request $r)
    {
        $course = Category::where('id',$r->id)->first();
        // return $course;
        if(count(SubCategory::where('category_id',$r->id)->get()) == 0)
        {
            $a = Category::destroy($r->id);
            return redirect('/admin/categories')->with('success', "Category Deleted!");
        }else{
            return redirect('/admin/categories')->with('error', "Sorry you can't Delete this Category!");
        }
    }

    public function getSubCategory(Request $r)
    {
        return SubCategory::where('category_id', $r->id)->get();
    }
}
