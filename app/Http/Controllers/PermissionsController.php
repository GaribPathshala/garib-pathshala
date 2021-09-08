<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsController extends Controller
{
    public function Index(Type $var = null)
    {
        $permissions = Permission::all();

        return view('admin.permissions', ['permissions' => $permissions]);
    }
}
