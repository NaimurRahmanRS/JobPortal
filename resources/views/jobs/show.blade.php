@extends('layouts.main')

@section('content')
    <section class="job-details">
        <h1 class="heading">job details</h1>
        <div class="details">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="job-info">
                <h3>{{$job->title}}</h3>
                <a href="{{route('company.index', [$job->company->id, $job->company->slug])}}">{{$job->company->cname}}</a>
                <p><i class="fas fa-map-marker-alt"></i> {{$job->address}}</p>
            </div>
                <div class="basic-details">
                    <h3>Duties</h3>
                    <p>{{$job->roles}}</p>
                    <h3>job type</h3>
                    <p>{{$job->type}}</p>
                    <h3>Job Position</h3>
                    <p>{{$job->position}}</p>
                    <h3>Estimates</h3>
                    <p>{{$job->last_date}}</p>
                </div>

                <div class="description">
                    <h3>job description</h3>
                    <p>{{$job->description}}</p>
                </div>
                <div class="flex-btn">
                    @if(!auth()->guest())
                        @if(Auth::user()->user_type=='seeker')
                            @if(!$job->checkApplication())
                                <apply-component :jobid="{{$job->id}}"></apply-component>
                            @else
                                <div class="description">
                                    <p><b>Already Applied For This Job</b></p>
                                </div>
                            @endif<br>
                            <favourite-component :jobid="{{ $job->id }}" :favourited="{{ $job->checkSaved() ? 'true' : 'false' }}"></favourite-component>
                        @endif
                    @endif
                </div>
            </div>
    </section>
@endsection
