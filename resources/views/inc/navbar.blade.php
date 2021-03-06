<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->   
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="/uploads/logo/ingram-blue.png" style="height:100%;display:inline-block;"><span id="systemname"> Controllership</span> 
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li id="login"><a href="{{ route('login') }}">Login</a></li>
                        <li id="register"><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src ="/uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%;">
                                <span id="username">{{ Auth::user()->name }}</span> <span class="caret"></span>
                            </a>

                            {{-- Navbar Menu --}}
                            <ul class="dropdown-menu" role="menu">   
                                <li><a href="/home"><span class = "	glyphicon glyphicon-dashboard"> Dashboard</span></a></li>
                                <li><a href="{{ route('excel-file',['type'=>'csv']) }}"><span class = "glyphicon glyphicon-cloud-download"> Download</span></a></li>
                                <li><a href="/"><span class = "glyphicon glyphicon-list"> Masterlist</span></a></li>
                                <li><a href="profile"><span class = "	glyphicon glyphicon-user"> Profile</span></a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <span class = "glyphicon glyphicon-log-out"> Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
