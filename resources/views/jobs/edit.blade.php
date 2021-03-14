@extends('layout.app')

@section('content')
    <h1>Post Vacancy</h1>
    {!! Form::open(['action' => ['JobsController@update', $job->id],
     'method' => 'POST', 'onsubmit' => 'return five_tag_check(); return false']) !!}
        <div class='form-group'> 
            {{Form::label('title','Job Title')}}
            {{Form::text('title',$job->job_title, ['class'=>'form-control', 'placeholder'=>'title'])}}
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

    <div class='form-group'> 
        {{Form::label('city','City')}}
        {{Form::text('city',$job->city, ['class'=>'form-control', 'placeholder'=>'city'])}}
    </div>

        <div class='form-group'> 
                {{Form::label('short_description','Short Description')}}
                {{Form::textarea('short_description',$job->short_description, ['class'=>'form-control', 'placeholder'=>'briefly describe the job'])}}
            </div>
        
            <div class='form-group'> 
                {{Form::label('role','Role')}}
                {{Form::textarea('role',$job->role, ['class'=>'form-control', 'placeholder'=>'briefly elucidate the role involed'])}}
            </div>

            <div class='form-group'> 
                {{Form::label('skills_requirements','Skills/Requirements')}}
                {{Form::textarea('skills_requirements',$job->skills_requirements, ['class'=>'form-control', 'placeholder'=>'briefly elucidate the skills and requirements necessary'])}}
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
            <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary Range') }}</label>

            <div class="col-md-6">
                    <select id="salary" type="text" class="form-control @error('salary_range') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="salary" autofocus>
                            <option value="">Salary Range</option>
                            <option value="NGN35,000 - NGN50,000">NGN35,000 - NGN50,000</option>
                            <option value="NGN50,000 - NGN100,000">NGN50,000 - NGN100,000</option>
                            <option value="NGN100,000 - NGN150,000">NGN100,000 - NGN150,000</option>
                            <option value="NGN150,000 - NGN200,000">NGN150,000 - NGN300,000</option>
                            <option value="NGN300,000 - NGN600,000">NGN300,000 - NGN600,000</option>
                            <option value="NGN600,000 and above">NGN600,000 and above</option>
                            <option value="Null">Leave Blank</option>
                        </select>
                @error('salary')
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
                <input id="five_tag_summation" type="text" class="form-control @error('five_tag_summation') is-invalid @enderror" name="five_tag_summation" value="{{ $job->five_tag_summation }}" required autocomplete="five_tag_summation" autofocus>

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

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


    
@endsection

