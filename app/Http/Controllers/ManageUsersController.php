<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class ManageUsersController extends Controller
{
    public function RemoveUser($email)
    {
            if (auth()->user()->email == $email) {
                return redirect('/admin/user-management')->with('self_remove', $email);
            } elseif (User::where('email', $email)->first()->hasPermissionTo('Admin')) {
                return redirect('/admin/user-management')->with('admin_remove', $email);
            }
            else 
            {
                return redirect('/admin/user-management')->with('remove_email', $email);
            }   
    }

    public function RemoveUserConfirmed(Request $req)
    {
            User::where('email' , $req->remove_email)->delete();

            return redirect()->back()->with('user_removed', $req->remove_email);
    }

    public function Edit($email)
    {
        if (auth()->user()->email == $email) {
            return redirect('/admin/user-management')->with('OwnEditFail', $email);
        } elseif (User::where('email', $email)->first()->hasPermissionTo('Admin')) {
            return redirect('/admin/user-management')->with('AdminEditFail', $email);
        }
         else {
            $user = User::where('email' , $email)->first();
            $permissions = Permission::all();
            $userPermission = $user->getAllPermissions();
            return view('admin.edit-user',['permissions' => $permissions , 'userPermissions' =>  $userPermission, 'user' => $user]);
        }

    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id == auth()->user()->id) {
            return redirect('/admin/user-management')->with('OwnEditFail', auth()->user()->email);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'gender' => ['required'],
                'designation' => ['required', 'string', 'max:255'],
                'mobile' => ['required', 'numeric', 'digits_between:10,10'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);
    
            $user = User::where('id' , $request->id)->first();
    
            $permissions = $request->NewPermissions;
    
            $user->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'designation' => $request->designation,
                'mobile' => $request->mobile,
                'email' => $request->email,
                ]);
    
            $user->syncPermissions($permissions);
        
            return redirect('/admin/user-management')->with('EditSuccess', $request->email);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
