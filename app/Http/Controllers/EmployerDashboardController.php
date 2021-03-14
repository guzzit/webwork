<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Employer;
//use App\Employee;
use Auth;

class EmployerDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer');
        //$this->middleware('guest');
        //$this->middleware('guest:employee')->except('logout');
        //$this->middleware('guest:employer')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = Employer::find($user_id);
        return view('employerDashboard')->with('jobs', $user->jobs);
    }
}
