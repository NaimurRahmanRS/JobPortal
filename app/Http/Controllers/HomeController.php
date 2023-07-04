<?php

namespace App\Http\Controllers;

use App\Company;
use App\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs=Auth::user()->favourites;
        return view('favourites', compact('jobs'));
    }

    public function prob()
    {
        $jobs = job::latest()->limit(6)->get();
        $categories = Category::with('jobs')->get();
        $companies = Company::latest()->limit(12)->get();
        return view('welcome', compact('jobs', 'companies', 'categories'));
    }
}
