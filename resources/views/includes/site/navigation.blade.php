<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="devpane" style="max-height: 25px;" src="{{ asset('images/nav_logo.png') }}">
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('meetups') }}">Meetups</a></li>
                <li><a href="{{ url('lists') }}">Lists</a></li>
                <li><a href="{{ url('projects') }}">Projects</a></li>
                <li><a href="{{ url('jobs') }}">Jobs</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(auth()->check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('meetups.meetup.create') }}">Meetup</a></li>
                            <li><a href="{{ route('lists.list.create') }}">List</a></li>
                            <li><a href="#">Project</a></li>
                            <li><a href="#">Job</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            @if(auth()->user()->avatar)
                                <img style="max-height: 20px;" class="img img-circle" src="{{ url(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}"> {{ auth()->user()->username }}
                            @else
                                <img style="max-height: 20px;" class="img img-circle" src="{{ '//www.gravatar.com/avatar/'.md5(strtolower(trim(auth()->user()->email))).'?d=mm&s=20'  }}" alt="{{ auth()->user()->username }}"> {{ auth()->user()->username }}
                            @endif
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('account/update') }}">My Account</a></li>
                            <li><a href="#">My Settings</a></li>
                            <li><a href="#">My Contributions</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                    @else
                    <li><p class="navbar-text">Already have an account?</p></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        Login via
                                        <div class="social-buttons">
                                            <a href="{{ url('auth/github') }}" class="btn btn-gh"><i class="fa fa-github"></i> GitHub</a>
                                            <a href="{{ url('auth/twitter') }}" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        or
                                        {!! Form::open(['url' => 'auth/login', 'method' => 'post']) !!}
                                            <div class="form-group">
                                                <label class="sr-only" for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                                <div class="help-block text-right"><a href="{{ url('password/email') }}">Forget the password ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="{{ url('auth/register') }}"><b>Join Us</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                @endif
            </ul>


        </div>
    </div>
</nav>