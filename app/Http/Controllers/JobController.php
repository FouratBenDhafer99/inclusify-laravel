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

        return response()->json(['message' => 'Job created successfully', 'job' => $job], 201);
    }

    // Retrieve a list of job listings
    public function index()
    {
        $jobs = Job::all();

        return view('backoffice.jobs.list', compact('jobs'));    }

    // Retrieve a specific job listing by ID
    public function show($id)
    {
        $jobs = Job::findOrFail($id);

        //return the view
        return view('jobs.list', compact('jobs'));


    }

    // Update a job listing by ID
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

        return response()->json(['message' => 'Job updated successfully', 'job' => $job], 200);
    }

    // Delete a job listing by ID
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response()->json(['message' => 'Job deleted successfully'], 200);
    }
}
