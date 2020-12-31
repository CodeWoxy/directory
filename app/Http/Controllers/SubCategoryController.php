<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Company;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $r)
    {
        $category= SubCategory::with('category')->with('subcategory')->with('package')->get();
        return view('admin.subCategories.subcategory',['subcategory'=> $category]);
    }
    public function addView(Request $r)
    {
        $category= Category::all();
        return view('admin.subCategories.subcategoryAdd',['category'=> $category]);
    }

    public function up (Request $r)
    {
        $c = SubCategory::create(['name' => $r->name,'category_id'=>$r->category]);
        if($c->save()){
            return redirect()->route('admin-subcategory')->with('success', "SubCategory Added!");
        }else{
            return redirect()->back()->with('error', "SubCategory not saved!");
        }
    }
    public function updateView (Request $r)
    {
        $subcategory= SubCategory::where('id',$r->id)->first();
        // return $subcategory;
        $category= Category::all();
        return view('admin.subCategories.subcategoryUpdate',['subcategory'=> $subcategory,'category'=> $category]);
    }

    public function update(Request $r)
    {
        $c = SubCategory::find($r->id);
        $c->name = $r->name;
        $c->category_id = $r->category;

        if($c->save()){
            return redirect()->route('admin-subcategory')->with('success', "SubCategory Updated!");
        }else{
            return redirect()->back()->with('error', "SubCategory was not updated!");
        }
    }
    public function delete(Request $r)
    {
        $course = SubCategory::where('id',$r->id)->first();
        // return $course;
        if(count(Company::where('category_id',$r->id)->get()) == 0)
        {
            $a = SubCategory::destroy($r->id);
            return redirect('/admin/subcategory')->with('success', "SubCategory Deleted!");
        }else{
            return redirect('/admin/subcategory')->with('error', "Sorry you can't Delete this SubCategory!");
        }
    }
}
