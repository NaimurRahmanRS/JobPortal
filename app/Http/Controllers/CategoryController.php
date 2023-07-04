<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\job;
class CategoryController extends Controller
{
    public function index($id){
        $jobs = Job::where('category_id', $id)->latest()->paginate(12);
        $categoryName = Category::where('id',$id)->first();
        return view('jobs.job-category',compact('jobs', 'categoryName'));
    }
}
