@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Now') }}</div>

                <div class="card-body">
                    <form method="POST" class="md-form" onsubmit="return five_tag_check(); return false;" action="{{ route('employeeRegister') }}" enctype='multipart/form-data'>
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

        <div class="form-group row">
            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

    <div class="form-row">
            <label for="DOB" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

            <div class="col">
                <label for="day" class="col col-form-label text-md-right">{{ __('Day') }}</label>
                <select id="day" type="number" class="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day') }}" required autocomplete="day" autofocus>
                    <option value=''>Day</option>
                        @for($x=1;$x<=32;$x++)
                            @if($x<10)
                            <option value='0{{$x}}'>0{{$x}}</option>
                            @else
                            <option value='{{$x}}'>{{$x}}</option>
                            @endif 
                        @endfor
                </select>
                @error('day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col">
                <label for="month" class="col col-form-label text-md-right">{{ __('Month') }}</label>
                    <select id="month" type="text" class="form-control @error('month') is-invalid @enderror" name="month" value="{{ old('month') }}" required autocomplete="month" autofocus>
                        <option value="">Month</option>
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">Jun</option>
                        <option value="7">Jul</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                    @error('month')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            
            <div class="col">
                <label for="year" class="col col-form-label text-md-right">{{ __('Year') }}</label>
                <select id="year" type="number" class="form-control @error('firstname') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year" autofocus>
                    <option value=''>Year</option>
                        @for($x=1950;$x<=(date("Y")-15);$x++)
                            <option value='{{$x}}'>{{$x}}</option>
                        @endfor
                </select>

                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>
        </div>
    
        <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <input type="radio" class=" @error('gender') is-invalid @enderror" name="gender" value="Male"> Male
                    <input type="radio" class=" @error('gender') is-invalid @enderror" name="gender" value="Female"> Female 
                    
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                        
            <div class="form-group row">
                    <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                    <div class="col-md-6">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    +234
                                </div>
                            </div>
                            <input id="mobile_number" type="text" maxlength="11" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="firstname" autofocus>
                        </div>
                        

                        @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                    <label for="job_title" class="col-md-4 col-form-label text-md-right">{{ __('Job Title') }}</label>

                    <div class="col-md-6">
                        <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" required autocomplete="job_title" autofocus>

                        @error('job_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                    <label for="job_sector" class="col-md-4 col-form-label text-md-right">{{ __('Job Sector') }}</label>
                    <div class="col-md-6">
                        <select id="job_sector" type="text" class="form-control @error('job_sector') is-invalid @enderror" name="job_sector" value="{{ old('job_sector') }}" required autocomplete="job_sector" autofocus>
                                <option value="">Job Sector</option>
                                <option value="Accounting, Auditing, Finance">Accounting, Auditing, Finance</option>
                                <option value="Administrative & Office Work">Administrative & Office Work</option>
                                <option value="Agriculture and Farming">Agriculture and Farming</option>
                                <option value="Building & Architecture">Building & Architecture</option>
                                <option value="Community & Social Services">Community & Social Services</option>
                                <option value="Consulting & Strategy">Consulting & Strategy</option>
                                <option value="Creative & Design">Creative & Design</option>
                                <option value="Customer Service & Support">Customer Service & Support</option>
                                <option value="Employability & Soft Skills">Employability & Soft Skills</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Food Services & Catering">Food Services & Catering</option>
                                <option value="Health & Safety">Health & Safety</option>
                                <option value="Hospitality/Leisure/Travel">Hospitality/Leisure/Travel</option>
                                <option value="Human Reasources">Human Reasources</option>
                                <option value="IT & Software">IT & Software</option>
                                <option value="Legal Services">Legal Services</option>
                                <option value="Management & Business">Management & Business</option>
                                <option value="Development">Development</option>
                                <option value="Marketing & Communications">Marketing & Communications</option>
                                <option value="Medical & Pharmaceutical">Medical & Pharmaceutical</option>
                                <option value="Natural Sciences">Natural Sciences</option>
                                <option value="Project & Product Management">Project & Product Management</option>
                                <option value="Quality Control & Assuranc">Quality Control & Assurance</option>
                                <option value="Real Estate & Property Management">Real Estate & Property Management</option>
                                <option value="Research, Teaching & Training">Research, Teaching & Training</option>
                                <option value="Sales">Sales</option>
                                <option value="Security">Security</option>
                                <option value="Supply Chain & Procurement">Supply Chain & Procurement</option>
                                <option value="Trades & Services">Trades & Services</option>
                                <option value="Transport & Logistics">Transport & Logistics</option>
                                <option value="Other">Other</option>
                            </select>
                        @error('job_sector')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                    <label for="highest_qualification" class="col-md-4 col-form-label text-md-right">{{ __('Highest Qualification') }}</label>

                    <div class="col-md-6">
                            <select id="highest_qualification" type="text" class="form-control @error('highest_qualification') is-invalid @enderror" name="highest_qualification" required autocomplete="highest_qualification" autofocus>
                                    <option value="">Highest Qualification</option>
                                    <option value="Secondary School Leaving Certificate">Secondary School Leaving Certificate</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="HND">HND</option>
                                    <option value="OND">OND</option>
                                    <option value="BA/BSc">BA/BSc</option>
                                    <option value="NCE">NCE</option>
                                    <option value="MBA/MSc">MBA/MSc</option>
                                    <option value="MBBS">MBBS</option>
                                    <option value="MPhil/PhD">MPhil/PhD</option>
                                    <option value="Vocational">Vocational</option>
                                    <option value="Others">Others</option>
                                </select>
                        @error('highest_qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                    <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Years of Experience') }}</label>

                    <div class="col-md-6">
                            <select id="experience" type="number" class="form-control @error('firstname') is-invalid @enderror" name="experience" value="{{ old('experience') }}" required autocomplete="experience" autofocus>
                                <option value=''>Years of Experience</option>    
                                <option value='Entry Level'>Entry Level</option>
                                <option value='1'>1 Year</option>
                                        @for($x=2;$x<=31;$x++)
                                            <option value='{{$x}}'>{{$x}} Years</option>
                                        @endfor
                                </select>
                        @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                        <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('Short Descrption About Yourself') }}</label>
                        <div class="col-md-6">
                            <div class="form-group pink-border-focus">
                                    <textarea id="short_description" maxlength="1000" type="text" class="md-textarea form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') }}" required autocomplete="short_description" autofocus  rows="3"></textarea>
                                    </div>
                                    <small class="form-text text-muted">
                                        Your description must be less than 1000 characters long.
                                        </small>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                            <label for="relocation_willingness" class="col-md-4 col-form-label text-md-right">{{ __('Are you willing to Relocate?') }}</label>

                            <div class="col-md-6">
                                <input type="radio" class=" @error('relocation_willingness') is-invalid @enderror" name="relocation_willingness" value="Yes"> Yes
                                <input type="radio" class=" @error('relocation_willingness') is-invalid @enderror" name="relocation_willingness" value="No"> No 
                                
                                @error('relocation_willingness')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="salary_range" class="col-md-4 col-form-label text-md-right">{{ __('Salary Range') }}</label>
            
                                <div class="col-md-6">
                                        <select id="salary_range" type="text" class="form-control @error('salary_range') is-invalid @enderror" name="salary_range" value="{{ old('salary_range') }}" required autocomplete="salary_range" autofocus>
                                                <option value="">Salary Range</option>
                                                <option value="NGN35,000 - NGN50,000">NGN35,000 - NGN50,000</option>
                                                <option value="NGN50,000 - NGN100,000">NGN50,000 - NGN100,000</option>
                                                <option value="NGN100,000 - NGN150,000">NGN100,000 - NGN150,000</option>
                                                <option value="NGN150,000 - NGN200,000">NGN150,000 - NGN300,000</option>
                                                <option value="NGN300,000 - NGN600,000">NGN300,000 - NGN600,000</option>
                                                <option value="NGN600,000 and above">NGN600,000 and above</option>
                                                <option value="Null">Leave Blank</option>
                                            </select>
                                    @error('salary_range')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
            
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
            
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        
                        <div class="form-group row">
                                <label for="cv" class="col-md-4 col-form-label text-md-right">{{ __('CV/Resume') }}</label>
            
                                <div class="col-md-6">
                                        <input id="cv" type="file" class="@error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" required autocomplete="cv" autofocus>
                                        
                                    @error('cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="five_tag_summation" class="col-md-4 col-form-label text-md-right">{{ __('Five Tags to Describe Yourself') }}</label>
            
                                <div class="col-md-6">
                                    <div id="tag_warning" style="color:red"></div>
                                    <div id="post_tag" ></div>
                                    <input id="five_tag_summation" type="text" class="form-control @error('five_tag_summation') is-invalid @enderror" name="five_tag_summation" value="{{ old('five_tag_summation') }}" required autocomplete="five_tag_summation" autofocus>
            
                                    <small class="form-text text-muted">
                                            You should type in no more than five tags.
                                            </small>
                                    @error('five_tag_summation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
