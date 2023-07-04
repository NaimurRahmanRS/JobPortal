@extends('layouts.main')

@section('content')
    <section class="jobs-container">
        <h1 class="heading">My Jobs</h1>
        <div class="box-container">
            @foreach($jobs as $job)
                <div class="box">
                    <div class="company">
                        @if($job->company->logo=='avatar/apple.png')
                            <img src="{{asset($job->company->logo)}}" alt="">
                        @else
                            <img src="{{asset('uploads/avatar')}}/{{$job->company->logo}}">
                        @endif
                        <div>
                            <h3>{{$job->company->cname}}</h3>
                            <p>{{$job->created_at->diffForHumans()}}</p>
                        </div>
                    </div>

                    <h3 class="job-title">{{$job->position}}</h3>

                    <p class="location"><i class="fas fa-map-marker-alt"></i><span>{{$job->address}}</span></p>

                    <div class="tags">
                        {{--                <p><i class="fas fa-dollar-sign"></i><span>5k - 8k</span></p>--}}
                        <p><i class="fas fa-briefcase"></i><span>{{$job->type}}</span></p>
                        <p><i class="fas fa-clock"></i><span>{{date('F d Y', strtotime($job->last_date))}}</span></p>
                    </div>

                    <div class="flex-btn">
                        <a href="{{route('job.show', [$job->id, $job->slug])}}" class="btn">view details</a>
                        @if(Auth::user()->user_type=='seeker')
                            <div class="tags">
                                <favourite-component :jobid="{{ json_encode($job->id) }}"
                                                     :favourited="{{ $job->checkSaved() ? 'true' : 'false' }}"></favourite-component>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
