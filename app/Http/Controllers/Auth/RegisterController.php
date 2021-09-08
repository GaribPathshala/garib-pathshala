<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeAdminMail;

class RegisterController extends Controller
{

        /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        // $this->guard()->login($user);
        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
        
        return redirect()->back()->with('success', $request->email);
    }


    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserManagement(Request $req)
    {
            $userList = User::orderBy('id', 'DESC')->get();
            return view('admin.user-management', ['userList' => $userList]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:10'],
            'designation' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'digits_between:10,10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['gender'] == 'M') {
            $dp = 'default-male.png';
            $gender = 'male';
        } 
        elseif ($data['gender'] == 'F') {
            $dp = 'default-female.png';
            $gender = 'female';
        }
        else {
            $dp = 'default.png';
            $gender = 'other';
        }

        $user = User::create([
            'name' => $data['name'],
            'gender' => $gender,
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'status' => 'active',
            'designation' => $data['designation'],
            'dp' => $dp,
            'password' => Hash::make(bin2hex(random_bytes(32))),
        ]);

        // Send mail to the user :P
        Mail::to($data['email'])->send(new WelcomeAdminMail($user));

        // Save to database after sending the mail :)
        return $user;
    }
}
