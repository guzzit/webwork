    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/services" tabindex="-1" aria-disabled="true">Services</a>
                      </li>
                      <li class="nav-item">
                              <a class="nav-link" href="/posts" tabindex="-1" aria-disabled="true">Blog</a>
                            </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                    </ul>
                    <ul class="nav my-2 my-sm-0">
                      <li class="nav-item" ><a class="nav-link" href="/posts/create" aria-disabled="true">Create Post</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    
                    @auth('employee')
                    <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::guard('employee')->user()->firstname }} <span class="caret"></span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a  class="dropdown-item" href="/dashboard">Dashboard</a>
                                  <a  class="dropdown-item" href="{{ route('employeeLogout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
  
                                  <form id="logout-form" action="{{ route('employeeLogout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                            </li>
                    @endauth
            
                      @auth('employer')
                      <li>
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('employer')->user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a  class="dropdown-item" href="/dashboard">Dashboard</a>
                                <a  class="dropdown-item" href="{{ route('employerLogout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('employerLogout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                          </li>
                     @endauth
                    
                    @if(!Auth::guard('employee')->user() && (!Auth::guard('employer')->user()))

                        @if (Route::has('register'))
                        @guest
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li class="nav-item">
                                <a class="nav-link dropdown-item" href="{{ route('employeeLogin') }}">{{ __('Login as Job Seeker') }}</a>
                              </li>
                              <li class="nav-item dropdown-item">
                                <a class="nav-link dropdown-item" href="{{ route('employerLogin') }}">{{ __('Login as  Employer') }}</a>
                              </li>
                            </div>
                          </div>
                          <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Register
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li class="nav-item">
                                  <a class="nav-link dropdown-item" href="{{ route('employeeRegister') }}">{{ __('Register as Job Seeker') }}</a>
                                </li>
                                <li class="nav-item dropdown-item">
                                  <a class="nav-link dropdown-item" href="{{ route('employerRegister') }}">{{ __('Register as  Employer') }}</a>
                                </li>
                              </div>
                            </div>
                       @endguest
                      @if(Auth::user())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a  class="dropdown-item" href="/dashboard">Dashboard</a>
                                <a  class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    