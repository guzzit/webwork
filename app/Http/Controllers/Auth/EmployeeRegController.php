<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class EmployeeRegController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $primaryKey = "id";

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:employee');
        $this->middleware('guest');
        $this->middleware('guest:employee')->except('logout');
        $this->middleware('guest:employer')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:3'],
            'month' => ['required', 'integer', 'max:10'],
            'year' => ['required', 'integer', 'max:3000'],
            'gender' => ['required', 'string', 'max:10'],
            'mobile_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees', 'unique:users'],
            'job_title' => ['required', 'string', 'max:255'],
            'job_sector' => ['required', 'string', 'max:255'],
            'highest_qualification' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'integer', 'max:100'],
            'short_description' => ['required', 'string', 'max:1000'],
            'relocation_willingness' => ['required', 'string', 'max:5'],
            'salary_range' => ['required', 'string', 'max:200'],
            'city' => ['required', 'string', 'max:255'],
            'cv' => ['required', 'mimes:pdf,zip,doc,docx,txt', 'max:1999'],
            'five_tag_summation' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Employee::create([
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'DOB' => ($data['year'].'-'.$data['month'].'-'.$data['day']),
            'gender' => $data['gender'],
            'mobile_number' => $data['mobile_number'],
            'email' => $data['email'],
            'job_title' => $data['job_title'],
            'job_sector' => $data['job_sector'],
            'highest_qualification' => $data['highest_qualification'],
            'experience' => $data['experience'],
            'short_description' => $data['short_description'],
            'relocation_willingness' => $data['relocation_willingness'],
            'salary_range' => $data['salary_range'],
            'city' => $data['city'],
            'cv' => $data['cv'],
            'five_tag_summation' => $data['five_tag_summation'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegistration()
    {
        return view('auth.employeeRegister');
    }
}
