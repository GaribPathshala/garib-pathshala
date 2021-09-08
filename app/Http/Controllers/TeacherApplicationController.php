<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherApplication;

class TeacherApplicationController extends Controller
{
    public function index(Request $req)
    {
        $applications = TeacherApplication::get();

        return view('admin.teacher-applications', ['applications' => $applications]);

    }

    public function manage($application_id)
    {
        $application = TeacherApplication::where('application_id', $application_id)->first();

        return view('admin.teacher-application-manage', ['application' => $application]);
    }

    public function reject($application_id)
    {
        
        
        $application = TeacherApplication::where('application_id', $application_id)->first();
        $application->status = 'Rejected';
        $application->save();

        return back();

    }

    public function approve($application_id)
    {
        $application = TeacherApplication::where('application_id', $application_id)->first();
        $application->status = 'Approved';
        $application->save();

        return back();
    }
}
