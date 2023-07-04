<header class="header">
    <section class="flex">
        <div id="menu-btn" class="fas fa-bars-staggered"></div>

        <a href="/" class="logo">
            <i class="fas fa-briefcase"></i>
            JobHunt
        </a>

        <nav class="navbar">
            <a href="/">home</a>
            <a href="/about">about us</a>
            <a href="{{route('alljobs')}}">all jobs</a>
            <a href="/contact">contact us</a>
            <a href="/register">Seeker</a>
            <a href="{{route('employer.registration')}}">Employer</a>
        </nav>

        @if(!auth::check())
            <a href="/login" class="btn" style="margin-top: 0;">Login</a>
        @else
            <div class="nav-item dropdown" style="font-size: 1.5rem;">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    @if(Auth::user()->user_type=='employer')
                        {{Auth::user()->company->cname}}
                    @endif
                    @if(Auth::user()->user_type=='seeker')
                        {{ Auth::user()->name }}
                    @endif
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                     style="font-size: 1.5rem;">
                    @if(Auth::user()->user_type=='employer')
                        <a class="dropdown-item" href="{{ route('company.create') }}">
                            {{ __('Company') }}
                        </a>
                        <a class="dropdown-item" href="{{route('job.create')}}">
                            Post Job
                        </a>
                        <a class="dropdown-item" href="{{ route('job.myjobs') }}">
                            {{ __('My Jobs') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('applicant') }}">
                            Applicants
                        </a>
                    @else
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('favourite') }}">
                            {{ __('Favourite Jobs') }}
                        </a>
                    @endif


                    <a class="dropdown-item" style="margin-top: 0;" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endif
    </section>
</header>
