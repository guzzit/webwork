<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

use App\Employee;
use App\Job;
use Auth;

class EmployeeDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
        //$this->middleware('guest');
        //$this->middleware('guest:employee')->except('logout');
        //$this->middleware('guest:employer')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        //dd(Auth::guard('employee')->user()->id);
        $employee_id = Auth::guard('employee')->user()->id;
        $employee_job_sector = Auth::guard('employee')->user()->job_sector;
        $employee_job_title = Auth::guard('employee')->user()->job_title;
        $employee_salary = Auth::guard('employee')->user()->salary_range;
        $employee_city = Auth::guard('employee')->user()->city;
        $employee_relocate = Auth::guard('employee')->user()->relocation_willingness;
        $employee_tags = Auth::guard('employee')->user()->five_tag_summation;
        $employee_experience = Auth::guard('employee')->user()->experience;
        $employee_qualification = Auth::guard('employee')->user()->highest_qualification;
        //r_jobs means recommended jobs
        $r_jobs = array();
        //$jobs = Job::select('*');
        $jobs = Job::where('id', '>' , 0)->get();
        //dd($jobs);
       
        $chod = array();
        $salary_array = array("NGN35,000 - NGN50,000",
                            "NGN50,000 - NGN100,000",
                            "NGN100,000 - NGN150,000", "NGN150,000 - NGN200,000",
                            "NGN300,000 - NGN600,000","NGN600,000 and above");

        foreach($jobs as $job){
            if($job->job_sector == $employee_job_sector){
                $point = 10;
                $chod[$job->id] = $point;
            }
            else{
                continue;
            }
            if($job->job_title == $employee_job_title){
                $chod[$job->id] = $chod[$job->id] + 10;
            }
            if($job->salary == $employee_salary){
                $chod[$job->id] = $chod[$job->id] + 10;
            }
            else{
                for($i=0;$i<count($salary_array);$i++){
                    if($salary_array[$i] == $employee_salary){
                        //give 5 points if it the job_salary value is in a range just lower or higher 
                        //than the employee's salary value
                        if(($salary_array[$i-1]) && ($salary_array[$i-1] == $job->salary) || ($salary_array[$i+1]) && ($salary_array[$i+1] == $job->salary)){
                            $chod[$job->id] = $chod[$job->id] + 5;
                        }
                        break;
                    }
                }
            }
            if($job->city == $employee_city){
                $chod[$job->id] = $chod[$job->id] + 10;
                //dd($job->id);
            }
            elseif ($employee_relocate == 'Yes'){
                $chod[$job->id] = $chod[$job->id] + 5;
            }
            if($job->five_tag_summation){
                $j_commas_strip = str_replace(',','', $job->five_tag_summation);
                $j_hash_strip = str_replace('#','',  $j_commas_strip);
                $j_tags = explode(' ', $j_hash_strip);
                //dd($j_tags);
                foreach($j_tags as $j_tag){
                    $j_tag = trim($j_tag);
                }
                $e_commas_strip = str_replace(',','', $employee_tags);
                $e_hash_strip = str_replace('#','',  $e_commas_strip);
                $e_tags = explode(' ', $e_hash_strip);
                foreach($e_tags as $e_tag){
                    $e_tag = trim($e_tag);
                }
               

                $common_tags = array_intersect($j_tags, $e_tags);
                $points = count($common_tags) * 3;
                $chod[$job->id] = $chod[$job->id] + $points;
            }
            if($employee_experience){
                $diff = $employee_experience - $job->experience;
                $diff_square = $diff * $diff;
                $diff_root = sqrt($diff_square);
                $points = $diff_root;
                $chod[$job->id] = $chod[$job->id] + $points;
            }
            if($job->highest_qualification == $employee_qualification){
                $chod[$job->id] = $chod[$job->id] + 5;
            }
        }
        
        arsort($chod);
       // dd($chod);
        foreach($chod as $key => $value){
            foreach($jobs as $job){
                if($key == $job->id){
                    $r_jobs[] = $job;
                }
            }
        }
        //dd($r_jobs);
        //dd($r_jobs[0]);
       // $jobs = $r_jobs;
        $currentPage = Paginator::resolveCurrentPage();
        $col = collect($r_jobs);
        $perPage = 10;
        $currentPageItems = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $jobs = new Paginator($currentPageItems, count($col), $perPage);
        $jobs->setPath($request->url());
        $jobs->appends($request->all());

        return view('/employeeDashboard', compact('jobs'));

       // return view('/employeeDashboard')->with('jobs', $jobs);
        // $user_id = auth()->user()->id;
        // $user = Employer::find($user_id);
        // return view('employerDashboard')->with('jobs', $user->jobs);
    }
}
