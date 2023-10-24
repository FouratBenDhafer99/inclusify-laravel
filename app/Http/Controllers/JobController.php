<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; // Import the Job model


class JobController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salaryRange' => 'required',
            'company' => 'required',
            'address' => 'required',
        ]);

        $job = Job::create($data);

        return redirect()->route('jobs.list')->with('success', 'Job created successfully');
        }

    public function index()
    {
        $jobs = Job::all();

        return view('backoffice.jobs.list', compact('jobs'));    }

    public function show($id)
    {
        $jobs = Job::findOrFail($id);

        return view('backoffice.jobs.list', compact('jobs'));


    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salaryRange' => 'required',
            'company' => 'required',
            'address' => 'required',
        ]);

        $job = Job::findOrFail($id);
        $job->update($data);
        
        return redirect()->route('jobs.list', $job->id)->with('success', 'Job updated successfully');
        //return redirect()->route('jobs.list')->with('success', 'Job updated successfully');

    }


// ...

    public function destroy($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect()->route('jobs.list')->with('error', 'Job not found');
        }

        $job->delete();

        return redirect()->route('jobs.list')->with('success', 'Job deleted successfully');
    }

    ///front office 

    public function indexFront()
    {
        // $jobs = Job::all();
        $userConnected = auth()->user();
        $jobs = Job::where('created_by','!=', $userConnected->id)->get();


        return view('frontOffice.pages.job.jobslist', compact('jobs'));    }

    public function showFront($id)
    {
        $jobs = Job::findOrFail($id);

        return view('frontOffice.pages.job.jobDetails', compact('jobs'));
    }

    public function storeFront(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salaryRange' => 'required',
            'company' => 'required',
            'address' => 'required',
        ]);

        $job = Job::create($data);

        return redirect()->route('jobslist')->with('success', 'Job created successfully');}
    
    
    public function goToCreateJob()
    {
        return view('frontOffice.pages.job.addJob');
    }

    public function jobsByConnectedUser()
    {
        $userConnected = auth()->user();

        $jobs = Job::where('created_by', $userConnected->id)->get();

        return view('frontOffice.pages.job.myOffers', compact('jobs'));

        
    }
    public function destroyFront($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect()->route('jobs.jobsByConnectedUser')->with('error', 'Job not found');
        }

        $job->delete();

        return redirect()->route('jobs.jobsByConnectedUser')->with('success', 'Job deleted successfully');}

        public function updateFront(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salaryRange' => 'required',
            'company' => 'required',
            'address' => 'required',
        ]);

        $job = Job::findOrFail($id);
        $job->update($data);

        return redirect()->route('jobs.jobsByConnectedUser', $job->id)->with('success', 'Job updated successfully');
    }

    public function search (Request $request)
    {
        $search = $request->get('search');
        $jobs = Job::where('title', 'like', '%'.$search.'%')->get();
        return view('frontOffice.pages.job.jobslist', compact('jobs'));
    }

}
