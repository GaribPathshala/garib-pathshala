<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherApplication;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeacherJoinMail;

class JoinController extends Controller
{
    public function Teacher(Request $req)
    {
        return view('join.teacher-apply');
    }

    public function TeacherSubmit(Request $req)
    {
        $req->validate([
            'name' => ['required', 'max:255'],
            'mobile' => ['required', 'numeric', 'digits_between:10,10'],
            'email' => ['required', 'email'],
            'application_id' => ['required', 'unique:teacher_applications,application_id'],
            'city' => ['required'],
            'district' => ['required'],
            'state' => ['required'],
            'postal' => ['required', 'numeric', 'digits_between:6,6'],
            'qualification' => ['required' ],
        ]);

        $TeacherApplication = new TeacherApplication;

        $TeacherApplication->application_id = $req->application_id;
        $TeacherApplication->name = $req->name;
        $TeacherApplication->mobile = $req->mobile;
        $TeacherApplication->email = $req->email;
        $TeacherApplication->city = $req->city;
        $TeacherApplication->district = $req->district;
        $TeacherApplication->state = $req->state;
        $TeacherApplication->postal_code = $req->postal;
        $TeacherApplication->qualification = $req->qualification;
        $TeacherApplication->experience = $req->experience;
        $TeacherApplication->status = 'Under Review';

        $TeacherApplication->save();

        $db = TeacherApplication::where('application_id', $req->application_id)->first();

        mail::to($req->email)->send(new TeacherJoinMail($db));   

        return view('join.success' , ['db' => $db]);


    }
}
