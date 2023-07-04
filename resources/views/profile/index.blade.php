@extends('layouts.main')

@section('content')
    <section class="view-company">
        <h1 class="heading">Update Your Profile</h1>
        <div class="details">
            <div class="info">
                <div class="avatar">
                    @if(empty(Auth::user()->profile->avatar))
                        <img src="{{asset('avatar/apple.png')}}" alt="">
                    @else
                        <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}">
                    @endif
                </div>
                <h3>{{Auth::user()->name}}</h3>
                <p><b>Date of Birth:</b> {{date('F d Y', strtotime(Auth::user()->profile->dob))}}</p>
                <p><b>Email:</b> {{Auth::user()->email}}</p>
                <p><b>Address:</b> {{Auth::user()->profile->address}}</p>
                <p><b>Phone Number:</b> {{Auth::user()->profile->phone_number}}</p>
                <p><b>Experience:</b> {{Auth::user()->profile->experience}}</p>
                <p><b>BIO Data:</b> {{Auth::user()->profile->bio}}</p>
                <p><b>Member Since:</b> {{date('F d Y', strtotime(Auth::user()->created_at))}}</p>
                @if(!empty(Auth::user()->profile->cover_letter))
                    <p>
                        <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                            Cover Letter
                        </a>
                    </p>
                @else
                    <p>Please Upload Your Cover Letter</p>
                @endif

                @if(!empty(Auth::user()->profile->resume))
                    <p>
                        <a href="{{Storage::url(Auth::user()->profile->resume)}}">
                            Resume
                        </a>
                    </p>
                @else
                    <p>Please Upload Your Resume</p>
                @endif
                <br>
                @if(Session::has('message'))
                    <div style="font-size: 1.5rem" class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
            </div><br>

            <div class="account-form-container">
                <section class="account-form">
                    <form action="{{route('profile.store')}}" method="post">
                        @csrf
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Address</label>
                            <textarea class="input" rows="3" name="address">
                                    {{Auth::user()->profile->address}}
                                </textarea>
                        @if($errors->has('address'))
                            <div class="error" style="color: red">
                                {{$errors->first('address')}}
                            </div>
                        @endif
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Phone Number</label>
                            <input value="{{Auth::user()->profile->phone_number}}" type="text" name="phone_number" class="input">
                        @if($errors->has('phone_number'))
                            <div class="error" style="color: red">
                                {{$errors->first('phone_number')}}
                            </div>
                        @endif
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Experience</label>
                            <textarea class="input" rows="3" name="experience">
                                    {{Auth::user()->profile->experience}}
                                </textarea>
                        @if($errors->has('experience'))
                            <div class="error" style="color: red">
                                {{$errors->first('experience')}}
                            </div>
                        @endif
                            <label style="text-align: left; display: block; font-size: 1.5rem;">BIO Data</label>
                            <textarea class="input" rows="3" name="bio">
                                    {{Auth::user()->profile->bio}}
                                </textarea>
                        @if($errors->has('bio'))
                            <div class="error" style="color: red">
                                {{$errors->first('bio')}}
                            </div>
                        @endif
                            <button class="btn btn-success">Submit</button><br><br>
                    </form>
                </section>
            </div><br><br>

            <ul>
                <li>
            <form action="{{route('profile.avatar')}}" class="input" method="post" enctype="multipart/form-data">
                    @csrf
                    <label style="text-align: left; display: block; font-size: 2.2rem;">Update Your Avatar</label>
                            <input type="file" name="avatar">
                            <button class="btn" style="font-size: 1.5rem">Update</button>
            </form>
            @if($errors->has('avatar'))
                <div class="error" style="color: red">
                    {{$errors->first('avatar')}}
                </div>
            @endif
                </li><br>
                <li>
                    <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label style="text-align: left; display: block; font-size: 2.2rem;">Update Your Cover Letter</label>
                                <input type="file" name="cover_letter" class="input">
                                <button class="btn" style="font-size: 1.5rem">Update</button>
                    </form>
                    @if($errors->has('cover_letter'))
                        <div class="error" style="color: red">
                            {{$errors->first('cover_letter')}}
                        </div>
                    @endif
                </li><br>
                <li>
                    <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label style="text-align: left; display: block; font-size: 2.2rem;">Update Your Resume</label>
                                <input type="file" name="resume" class="input">
                                <button class="btn" style="font-size: 1.5rem">Update</button>
                    </form>
                    @if($errors->has('resume'))
                        <div class="error" style="color: red">
                            {{$errors->first('resume')}}
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </section>
@endsection

