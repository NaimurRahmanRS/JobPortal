@extends('layouts.main')

@section('content')
    <section class="jobs-container">
        <h1 class="heading">Applicants</h1>
        @foreach($applicants as $applicant)
            <h3 class="heading" style="font-size: 2rem;">{{$applicant->title}}</h3>
            <div class="box-container">
                @foreach($applicant->users as $user)
                    <div class="box">
                        <div class="company">
                            @if(empty($user->profile->avatar))
                                <img src="{{asset('avatar/apple.png')}}" alt="">
                            @else
                                <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}">
                            @endif
                            <div>
                                <h3>{{$user->profile->gender}}</h3>
                                <p>Born: {{date('F d Y', strtotime($user->profile->dob))}}</p>
                            </div>
                        </div>

                        <h3 class="job-title">{{$user->name}}</h3>

                        <p class="location"><i class="fas fa-map-marker-alt"></i><span>{{$user->profile->address}}</span></p>

                        <div class="tags">
                            <p><span>Phone: {{$user->profile->phone_number}}</span></p>
                            <p><span>Email: {{$user->email}}</span></p>
                            <p><span>Bio: {{$user->profile->bio}}</span></p>
                            <p><span>Experience: {{$user->profile->experience}}</span></p>
                        </div>

                        @if(!empty($user->profile->cover_letter))
                        <div class="flex-btn">
                            <a href="{{Storage::url($user->profile->cover_letter)}}" class="btn">
                                Cover Letter
                            </a>
                        </div>
                        @endif
                        @if(!empty($user->profile->resume))
                        <div class="flex-btn">
                            <a href="{{Storage::url($user->profile->resume)}}" class="btn">
                                Resume
                            </a>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div><br><br>
        @endforeach
    </section>
@endsection
