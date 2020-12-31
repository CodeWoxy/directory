<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $r)
    {
        $category= Company::with('category')->get();
        return view('admin.companies.company',['company'=> $category]);
    }
    public function addView(Request $r)
    {
        $category= Category::all();
        return view('admin.companies.companyAdd',['category'=> $category]);
    }

    public function up (Request $r)
    {
        $c = Company::create(['name' => $r->name,'category_id'=>$r->category]);
        if($c->save()){
            return redirect()->route('admin-company')->with('success', "Company Added!");
        }else{
            return redirect()->back()->with('error', "Company not saved!");
        }
    }
    public function updateView (Request $r)
    {
        $company= Company::where('id',$r->id)->first();
        // return $company;
        $category= Category::all();
        return view('admin.companies.companyUpdate',['company'=> $company,'category'=> $category]);
    }

    public function update(Request $r)
    {
        $c = Company::find($r->id);
        $c->name = $r->name;
        $c->category_id = $r->category;

        if($c->save()){
            return redirect()->route('admin-company')->with('success', "Company Updated!");
        }else{
            return redirect()->back()->with('error', "Company was not updated!");
        }
    }
    public function delete(Request $r)
    {
        $course = Company::where('id',$r->id)->first();
        // return $course;
        if(count(Company::where('category_id',$r->id)->get()) == 0)
        {
            $a = company::destroy($r->id);
            return redirect('/admin/company')->with('success', "Company Deleted!");
        }else{
            return redirect('/admin/company')->with('error', "Sorry you can't Delete this Company!");
        }
    }
}
