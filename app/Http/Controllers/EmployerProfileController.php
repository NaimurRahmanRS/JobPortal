<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Employer;
use Illuminate\Support\Facades\Validator;

class EmployerProfileController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function store(){
        $user = User::create([
            'email' => request('email'),
            'user_type' => request('user_type'),
            'password' => Hash::make(request('password')),
        ]);
        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => str_slug(request('cname')),
        ]);
        return redirect()->back()
            ->with('message', 'Email Must Be Verified & Login To Get Verified');
    }
}
