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

        return redirect()->route('jobs.index', $job->id)->with('success', 'Job updated successfully');
    }


// ...

    public function destroy($id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect()->route('jobs.index')->with('error', 'Job not found');
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }

    ///front office 

    public function indexFront()
    {
        $jobs = Job::all();

        return view('frontOffice.pages.jobslist', compact('jobs'));    }

    public function showFront($id)
    {
        $jobs = Job::findOrFail($id);

        return view('frontOffice.pages.jobDetails', compact('jobs'));
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
        return view('frontOffice.pages.addJob');
    }

}
