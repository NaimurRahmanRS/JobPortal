@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img style="width: 100%" src="{{asset('avatar/apple.png')}}">
                @else
                    <img style="width: 100%" src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}">
                @endif
                <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="card">
                        <div class="card-header">Change Your Company Avatar</div>
                        <div class="card-body">
                            <input type="file" name="logo" class="form-control">
                            <br>
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                @if($errors->has('logo'))
                    <div class="error" style="color: red">
                        {{$errors->first('logo')}}
                    </div>
                @endif
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address">
                                    {{Auth::user()->company->address}}
                                </textarea>
                            </div>
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Phone</label>
                                <input value="{{Auth::user()->company->phone}}" type="text" name="phone" class="form-control">
                            </div>
                            @if($errors->has('phone'))
                                <div class="error" style="color: red">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Website</label>
                                <input value="{{Auth::user()->company->website}}" type="text" name="website" class="form-control">
                            </div>
                            @if($errors->has('website'))
                                <div class="error" style="color: red">
                                    {{$errors->first('website')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Slogan</label>
                                <input value="{{Auth::user()->company->slogan}}" type="text" name="slogan" class="form-control">
                            </div>
                            @if($errors->has('slogan'))
                                <div class="error" style="color: red">
                                    {{$errors->first('slogan')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description">
                                    {{Auth::user()->company->description}}
                                </textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        <p><b>Company Name:</b> {{Auth::user()->company->cname}}</p>
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
                    </div>
                </div>
                <br>
                <form action="{{route('company.coverphoto')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Cover Photo</div>
                        <div class="card-body">
                            <input type="file" name="cover_photo" class="form-control">
                            <br>
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                @if($errors->has('cover_photo'))
                    <div class="error" style="color: red">
                        {{$errors->first('cover_photo')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection


