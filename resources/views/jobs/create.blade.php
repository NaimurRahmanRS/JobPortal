@extends('layouts.main')

@section('content')
    <div class="account-form-container">
        <section class="account-form">

            <form action="{{route('job.store')}}" method="post">
                @csrf
                <h3>Create New Job</h3>
                    <label style="text-align: left; display: block; font-size: 1.5rem;">Title</label>
                    <input type="text" name="title" class="input">

                @if($errors->has('title'))
                    <div class="error" style="color: red">
                        {{$errors->first('title')}}
                    </div>
                @endif

                    <label style="text-align: left; display: block; font-size: 1.5rem;">Roles</label>
                    <input type="text" name="roles" class="input">

                @if($errors->has('roles'))
                    <div class="error" style="color: red">
                        {{$errors->first('roles')}}
                    </div>
                @endif

                    <label style="text-align: left; display: block; font-size: 1.5rem;">Description</label>
                    <textarea name="description" class="input"></textarea>

                @if($errors->has('description'))
                    <div class="error" style="color: red">
                        {{$errors->first('description')}}
                    </div>
                @endif

                    <label style="text-align: left; display: block; font-size: 1.5rem;">Position</label>
                    <input type="text" name="position" class="input">

                @if($errors->has('position'))
                    <div class="error" style="color: red">
                        {{$errors->first('position')}}
                    </div>
                @endif

                    <label style="text-align: left; display: block; font-size: 1.5rem;">Category</label>
                    <select name="category" required class="input">
                        @foreach(App\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>


                    <label style="text-align: left; display: block; font-size: 1.5rem;">Address</label>
                    <textarea name="address" class="input"></textarea>

                @if($errors->has('address'))
                    <div class="error" style="color: red">
                        {{$errors->first('address')}}
                    </div>
                @endif

                    <label style="text-align: left; display: block; font-size: 1.5rem;">Type</label>
                    <select name="type" class="input">
                        <option value="fulltime">Full Time</option>
                        <option value="parttime">Part Time</option>
                        <option value="casual">Casual</option>
                    </select>


                    <label style="text-align: left; display: block; font-size: 1.5rem;">Status</label>
                    <select name="status" class="input">
                        <option value="live">Live</option>
                        <option value="draft">Draft</option>
                    </select>


                    <label style="text-align: left; display: block; font-size: 1.5rem;">Apply Deadline</label>
                    <input type="date" name="last_date" class="input" required>


                    <button class="btn">Submit</button>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
            </form>
        </section>
    </div>
@endsection
