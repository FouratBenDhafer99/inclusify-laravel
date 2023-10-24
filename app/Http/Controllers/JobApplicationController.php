<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ApplyNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


use App\Models\JobApplication;
class JobApplicationController extends Controller
{
    //
    public function store(Request $request)
{
    $data = $request->validate([
        'job_id' => 'required|exists:jobs,id',
        'resume' => 'required|file|mimes:pdf,doc,docx', 
        'motivation' => 'required',
    ]);

    $resumePath = $request->file('resume')->store('resumes');

    $jobApplication = JobApplication::create([
        'job_id' => $data['job_id'],
        'resume_path' => $resumePath,
        'motivation' => $data['motivation'],
        'user_id' => 1,
        'status' => 'pending',
    ]);

    return redirect()->route('jobslist')
        ->with('success', 'Job application submitted successfully.');
}

public function index()
{
    $jobApplications = JobApplication::all();

    return view('backoffice.jobs.jobAppList', compact('jobApplications'));

}

public function show($id)
{
    $jobApplication = JobApplication::findOrFail($id);

    return view('job-applications.show', compact('jobApplication'));
}

public function update(Request $request, $id)
{
    $data = $request->validate([
        'status' => 'required|in:pending,accepted,rejected',
    ]);

    $jobApplication = JobApplication::findOrFail($id);
    $jobApplication->update($data);

    return redirect()->route('job-applications.index')
        ->with('success', 'Job application updated successfully.');
}

public function destroy($id)
{
    $jobApplication = JobApplication::findOrFail($id);
    $jobApplication->delete();

    return redirect()->route('job-applications.index')
        ->with('success', 'Job application deleted successfully.');
}


//front office
public function create(Request $request)
{
    $data = $request->validate([
        'job_id' => 'required|exists:jobs,id',
        'resume_path' => 'required|file|mimes:pdf,doc,docx', 
        'motivation' => 'required',
    ]);

    $resumePath = $request->file('resume')->store('resumes');

    $jobApplication = JobApplication::create([
        'job_id' => $data['job_id'],
        'resume_path' => $resumePath,
        'motivation' => $data['motivation'],
       
    ]);

    auth()->user()->notify(new ApplyNotification($jobApplication));

    
    

}

public function getApplicationsByJobId($jobId)
{
    $jobApplications = JobApplication::where('job_id', $jobId)->get();

    return view('frontoffice.pages.job.jobApplications', compact('jobApplications'));

}

public function goToApplications(){
    $jobApplications = JobApplication::all();

    return view('frontoffice.job.jobApplications', compact('jobApplications'));
}

public function updateStatus(Request $request, $id)
{
    $data = $request->validate([
        'status' => 'required|in:pending,accepted,rejected',
    ]);

    $jobApplication = JobApplication::findOrFail($id);
    $jobApplication->update($data);

    return redirect()->route('jobApplicationslist', $jobApplication->job_id)
        ->with('success', 'Job application updated successfully.');}


    public function jobApplicationsByConnectedUser()
    {
        $jobApplications = JobApplication::where('created_by', auth()->user()->id)->get();

        return view('frontoffice.pages.job.myApplications', compact('jobApplications'));
    }
    public function destroyFront($id)
    {
        $jobApplication = JobApplication::find($id);

        if (!$jobApplication) {
            return redirect()->route('jobs.ApplicationByConnectedUser')->with('error', 'Job not found');
        }

        $jobApplication->delete();

        return redirect()->route('jobs.ApplicationByConnectedUser')->with('success', 'Job deleted successfully');
    }
    
    public function downloadResume($filename) {
        $filePath = storage_path('app/resumes/' . $filename);
    
        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => mime_content_type($filePath),
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            return response()->file($filePath, $headers);
        } else {
            abort(404, 'File not found');
        }
    }
}
