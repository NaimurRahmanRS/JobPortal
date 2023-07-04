@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="card-header">{{$job->title}}</div>

                    <div class="card-body">
                        <p>
                            <h3>Description</h3>
                            {{$job->description}}
                        </p>
                        <p>
                            <h3>Duties</h3>
                            {{$job->roles}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info</div>

                    <div class="card-body">
                        <p>Company: <a href="{{route('company.index', [$job->company->id, $job->company->slug])}}">
                                {{$job->company->cname}}
                            </a>
                        </p>
                        <p>Address: {{$job->address}}</p>
                        <p>Job Position: {{$job->position}}</p>
                        <p>Estimates: {{$job->last_date}}</p>
                    </div>
                    @if(Auth::user()->user_type=='seeker')
                        @if(!$job->checkApplication())
                            <apply-component :jobid="{{$job->id}}"></apply-component>
                        @else
                            <div class="card-body">
                                <p><b>Already Applied For This Job</b></p>
                            </div>
                        @endif<br>
                            <favourite-component :jobid="{{ $job->id }}" :favourited="{{ $job->checkSaved() ? 'true' : 'false' }}"></favourite-component>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
