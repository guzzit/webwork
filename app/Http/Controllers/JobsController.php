<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Job;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:employer', ['except'=>['index', 'show', 'search']]);
    }

    public function index()
    {
        $jobs = Job::orderBy('created_at','desc')->paginate(12);
        return view('jobs.index')->with('jobs',$jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'job_sector'=>'required',
            'city'=>'required',
            'short_description'=>'required',
            'role'=>'required',
            'skills_requirements'=>'required',
            'highest_qualification'=>'required',
            'experience'=>'required',
            'salary'=>'required',
            'five_tag_summation'=>'required'
        ]);
        
        //handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename (note pathinfo is a normal php function to get info about file)
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //$extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);

            //set unique name
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('cover_image')->storeas('public/coverimage', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $job = new Job;
        $job->job_title = $request->input('title');
        $job->job_sector = $request->input('job_sector');
        $job->short_description = $request->input('short_description');
        $job->role = $request->input('role');
        $job->skills_requirements = $request->input('skills_requirements');
        $job->salary = $request->input('salary');
        $job->city = $request->input('city');
        $job->five_tag_summation = $request->input('five_tag_summation');
        $job->highest_qualification = $request->input('highest_qualification');
        $job->experience = $request->input('experience');
        $job->employer_id = auth()->user()->id;
        $job->save();

        return redirect('/posts')->with('success','Job Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("hello");
        $job = Job::find($id);
        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        //check for correct user
        //dd($job->employer_id);
        if(auth()->user()->id != $job->employer_id){
            return redirect('/jobs')->with('error', 'Unauthorised Page');
        };
        return view('jobs.edit')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'job_sector'=>'required',
            'city'=>'required',
            'short_description'=>'required',
            'role'=>'required',
            'skills_requirements'=>'required',
            'highest_qualification'=>'required',
            'experience'=>'required',
            'salary'=>'required',
            'five_tag_summation'=>'required'
        ]);
        
        //handle file upload
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename (note pathinfo is a normal php function to get info about file)
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //$extension = pathinfo($fileNameWithExt, PATHINFO_EXTENSION);

            //set unique name
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload image
            $path = $request->file('cover_image')->storeas('public/coverimage', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $job = Job::find($id); 
        $job->job_title = $request->input('title');
        $job->job_sector = $request->input('job_sector');
        $job->short_description = $request->input('short_description');
        $job->role = $request->input('role');
        $job->skills_requirements = $request->input('skills_requirements');
        $job->salary = $request->input('salary');
        $job->city = $request->input('city');
        $job->five_tag_summation = $request->input('five_tag_summation');
        $job->highest_qualification = $request->input('highest_qualification');
        $job->experience = $request->input('experience');
        $job->save();

        return redirect('/jobs')->with('success','Job Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        //check for correct user
        if(auth()->user()->id != $job->employer_id){
            return redirect('/jobs')->with('error', 'Unauthorised Page');
        };

       
        $job->delete();

        return redirect('/jobs')->with('success','Job Deleted');
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
