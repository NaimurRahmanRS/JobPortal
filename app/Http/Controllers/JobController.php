<?php

namespace App\Http\Controllers;

use App\Company;
use App\job;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct(){
        $this->middleware(['employer','verified'])->except('index', 'show', 'apply', 'alljobs', 'searchJob');
        $this->middleware(['seeker', 'verified'])->only('apply');
    }

    public function index(){
        $jobs = job::latest()->limit(6)->get();
        $categories = Category::with('jobs')->get();
        $companies = Company::latest()->limit(12)->get();
        return view('welcome', compact('jobs', 'companies', 'categories'));
    }

    public function show($id, job $job){
        return view('jobs.show', compact('job'));
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'roles' => request('roles'),
            'description' => request('description'),
            'category_id' => request('category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'status' => request('status'),
            'last_date' => request('last_date'),
        ]);

        return redirect()->back()
            ->with('message', 'Job Posted Successfully');
    }

    public function myjobs(){
        $jobs = job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjobs', compact('jobs'));
    }

    public function apply(Request $request, $id){
        $jobId = job::find($id);
        $jobId->users()->attach(auth::user()->id);
        return redirect()->back()->with('message', 'Job Applied Successfully');
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicants', compact('applicants'));
    }

    public function alljobs(Request $request){
        $keyword = request('title');
        $type = request('type');
        $category = request('category_id');
        $address = request('address');
        if($keyword||$type||$category||$address){
            $jobs = Job::where('title', 'LIKE', '%'.$keyword.'%')
                ->orWhere('type', $type)
                ->orWhere('category_id', $category)
                ->orWhere('address', $address)
                ->latest()
                ->paginate(12);
            return view('jobs.alljobs', compact('jobs'));
        }
        else{
            $jobs = Job::latest()->paginate(12);
            return view('jobs.alljobs', compact('jobs'));
        }
    }

    public function searchJob(Request $request){
        $keyword = $request->get('keyword');
        $users = Job::where('title', 'LIKE', '%'.$keyword.'%')
            ->orWhere('position', 'LIKE', '%'.$keyword.'%')
            ->limit(5)->get();
        return response()->json($users);
    }
}
