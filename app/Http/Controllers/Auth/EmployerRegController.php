<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class EmployerRegController extends Controller
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
            'name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees', 'unique:users'],
            'website' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:1000'],
            'logo' => ['nullable', 'image', 'max:1999'],
            'address' => ['required', 'string', 'max:1000'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Employer
     */
    protected function create(array $data)
    {
        //handle file upload
        if($data['logo']){
            //Get file name with the extension
            $fileNameWithExt = $data['logo']->getClientOriginalName();

            //Get just filename (note pathinfo is a normal php function to get info about file)
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $data['logo']->getClientOriginalExtension();
            //$extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);

            //set unique name
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload image
            $path = $data['logo']->storeas('public/coverimage', $fileNameToStore);

            $data['logo'] = $fileNameToStore;
        }
        return Employer::create([
            'name' => $data['name'],
            'mobile_number' => $data['mobile_number'],
            'email' => $data['email'],
            'website' => $data['website'],
            'short_description' => $data['short_description'],
            'logo' => $data['logo'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegistration()
    {
        return view('auth.employerRegister');
    }
}
