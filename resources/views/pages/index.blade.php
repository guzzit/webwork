@extends('layout.app')
@section('content')
<div class="jumbotron text-center">
<h1>{{$title}}</h1> 
<h3>the finest networking platform in Nigeria</h3>
<h1>Search for your perfect</h1>
    {!! Form::open(['action' => "JobsController@search", 'method' => 'GET']) !!}

     {{ csrf_field() }}
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
                        <option value="Human Reasources">Human Resources</option>
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
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
            <div class="col-md-6">
                <select id="job_sector" type="text" class="form-control @error('job_sector') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                        <option value="">City</option>
                        <option value='Lagos'>Lagos</option>
                        <option value="Abuja">Abuja</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Abia">Abia</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Enugu">Enugu</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Kanu">Kanu</option>
                        <option value="Bornu">Bornu</option>
                        <option value="Delta">Delta</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Calabar">Calabar</option>
                        <option value="Imo">Imo</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="Akwa Ibom">Akwa Ibom</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kastina">Kastina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Nasarawa">Nasarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamfara</option>
                    </select>
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    </div>
        
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
<p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
</div>
@endsection
   
