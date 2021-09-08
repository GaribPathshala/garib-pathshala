<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TeacherApplication;
use App\Models\Donation;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\RecentDonationsController as RecentDonations;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // // Role::create(['name' => 'Admin']);
        // Permission::create(['name' => 'Admin']);
        // Permission::create(['name' => 'Manage Donations']);
        // Permission::create(['name' => 'Manage Users']);
        // Permission::create(['name' => 'Manage Tickets']);

        // $role = Role::findById(1);
        // $permission = Permission::findByName('Manage Donations');
        // $role->givePermissionTo($permission);
        // auth()->user()->removeRole('Admin');
        // auth()->user()->givePermissionTo('Admin');

        $userCount = count(User::get());

        $applicationCount = count(TeacherApplication::where('status','Under Review')->get());

        $donations = Donation::orderBy('id')->get();

        $recentDonation = new RecentDonations;

        $total = $recentDonation->Total($donations);

        return view('admin.dashboard', ['userCount' => $userCount , 'TotalDonation' => $total , 'TeacherApplication' => $applicationCount]);
    }

    public function profile()
    {
        $permissions = Auth()->User()->getAllPermissions();

        return view('admin.profile', ['permissions' => $permissions]);
    }
}
