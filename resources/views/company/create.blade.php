@extends('layouts.main')

@section('content')
    <section class="view-company">
        <h1 class="heading">company details</h1>
        <div class="details">
            <div class="info">
                <div class="cover">
                    @if(empty(Auth::user()->company->cover_photo))
                        <img src="{{asset('cover/banner.jpg')}}" alt="">
                    @else
                        <img src="{{asset('uploads/cover')}}/{{Auth::user()->company->cover_photo}}">
                    @endif
                </div>
                <div class="avatar">
                    @if(empty(Auth::user()->company->logo))
                        <img src="{{asset('avatar/apple.png')}}" alt="">
                    @else
                        <img src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}">
                    @endif
                </div>
                <h3>{{Auth::user()->company->cname}}</h3>
                <p><b>Company Email:</b> {{Auth::user()->email}}</p>
                <p><b>Address:</b> {{Auth::user()->company->address}}</p>
                <p><b>Company Page:</b> <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                <p><b>Phone:</b> {{Auth::user()->company->phone}}</p>
                <p><b>Website:</b> {{Auth::user()->company->website}}</p>
                <p><b>Slogan:</b> {{Auth::user()->company->slogan}}</p>
                <p><b>Description:</b> {{Auth::user()->company->description}}</p>
                <p><b>Member Since:</b> {{date('F d Y', strtotime(Auth::user()->created_at))}}</p>
                @if(!empty(Auth::user()->company->cover_photo))
                    <p>
                        <a href="{{asset('uploads/cover')}}/{{Auth::user()->company->cover_photo}}">
                            Cover Photo
                        </a>
                    </p>
                @else
                    <p>Please Upload Your Cover Photo</p>
                @endif
                <br>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
            </div><br>

            <div class="account-form-container">
                <section class="account-form">
                    <form action="{{route('company.store')}}" method="post">
                        @csrf
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Address</label>
                            <textarea class="input" rows="3" name="address">
                                    {{Auth::user()->company->address}}
                                </textarea>
                        @if($errors->has('address'))
                            <div class="error" style="color: red">
                                {{$errors->first('address')}}
                            </div>
                        @endif
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Phone</label>
                            <input value="{{Auth::user()->company->phone}}" type="text" name="phone" class="input">
                        @if($errors->has('phone'))
                            <div class="error" style="color: red">
                                {{$errors->first('phone')}}
                            </div>
                        @endif
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Website</label>
                            <input value="{{Auth::user()->company->website}}" type="text" name="website" class="input">
                        @if($errors->has('website'))
                            <div class="error" style="color: red">
                                {{$errors->first('website')}}
                            </div>
                        @endif
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Slogan</label>
                            <input value="{{Auth::user()->company->slogan}}" type="text" name="slogan" class="input">
                        @if($errors->has('slogan'))
                            <div class="error" style="color: red">
                                {{$errors->first('slogan')}}
                            </div>
                        @endif
                            <label style="text-align: left; display: block; font-size: 1.5rem;">Description</label>
                            <textarea class="input" rows="3" name="description">
                                    {{Auth::user()->company->description}}
                                </textarea>
                        @if($errors->has('description'))
                            <div class="error" style="color: red">
                                {{$errors->first('description')}}
                            </div>
                        @endif
                            <button class="btn">Submit</button>
                    </form>
                </section>
            </div><br><br>

            <ul>
                <li>
                    <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label style="text-align: left; display: block; font-size: 2.2rem;">Update Your Company Avatar</label>
                                <input type="file" name="logo" class="input">
                                <button class="btn" style="font-size: 1.5rem">Update</button>
                    </form>
                    @if($errors->has('logo'))
                        <div class="error" style="color: red">
                            {{$errors->first('logo')}}
                        </div>
                    @endif
                </li>

                <li>
                    <form action="{{route('company.coverphoto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label style="text-align: left; display: block; font-size: 2.2rem;">Update Your Cover Photo</label>
                                <input type="file" name="cover_photo" class="input">
                                <button class="btn" style="font-size: 1.5rem">Update</button>
                    </form>
                    @if($errors->has('cover_photo'))
                        <div class="error" style="color: red">
                            {{$errors->first('cover_photo')}}
                        </div>
                    @endif
                </li>
            </ul>

        </div>
    </section>
@endsection


