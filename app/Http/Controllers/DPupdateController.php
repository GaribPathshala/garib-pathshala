<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Storage;
use Auth;

class DPupdateController extends Controller
{
    public function DPupdate(Request $req)
    {

        $req->validate([
            'dp' => 'mimes:jpeg,jpg,png|required|max:2000' // max 2 mb
        ]);

            if (auth()->user()->gender == "male" && auth()->user()->dp !== "default-male.png") {

                Storage::delete('/public/images/dp/'.auth()->user()->dp);

            } elseif (auth()->user()->gender == "female" && auth()->user()->dp !== "default-female.png") {

                Storage::delete('/public/images/dp/'.auth()->user()->dp);

            } elseif (auth()->user()->gender == "other" && auth()->user()->dp !== "default.png") {

                Storage::delete('/public/images/dp/'.auth()->user()->dp);
            }

                    
        $req->dp->store('images/dp' , 'public');
        
        
        auth()->user()->update(['dp' => $req->dp->hashName()]);

        return redirect()->back();

    }
}
