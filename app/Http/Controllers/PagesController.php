<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to WEBWORK";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = "About Us";
        return view('pages.about')->with('title', $title);
    }
    public function services(){
        //$title = "Our Services";
        $data = array(
            'title' => 'services',
            'date'  => date('y-m-d'),
            'services' => ['accurate, efficient job targeting', 'live interview platform']
        );
        return view('pages.services')->with($data);
    }
    public function blog(){
        $title = "our blog";
        return view('pages.blog')->with('title', $title);
    }
    public function search(Request $request)
    {
      // dd($request);
       $this->validate($request, [
        'job_sector'=>'required',
        'city'=>'nullable'
    ]);
        
        $job_sector = $request->input('job_sector');
        $city = $request->input('city');

        $jobs = Job::where('job_sector', '=' ,$job_sector)
                    ->where('city', '=', $city)    
                    ->paginate(12);
        //$job = Job::find(50);
        //dd($jobs);

        //$jobs = Job::orderBy('created_at','desc')->paginate(12);

        //dd($jobs);
       return view('/jobs/search')->with('jobs', $jobs);
       // return redirect('/jobs/search')->with('jobs', $jobs);;
    }
}
