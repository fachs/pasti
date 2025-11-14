<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        if (\Auth::attempt(array('email' => $validated['email'], 'password' => $validated['password']))) {
            return redirect()->route('index');
        } else {
            $validator->errors()->add(
                'password', 'The password does not match with username'
            );
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    
    public function registerView(){

        $bidangs = DB::table('bidangs')->select('id','nama')->get();
        
        return view('register')->with('bidangs', $bidangs);
    }

    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'bidang' => ['required', 'string'],
            'role' => ['required', 'string'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required',"confirmed", Password::min(7)],
        ]);

        $validated = $validator->validated();

        $user = User::create([
            'name' => $validated["name"],
            'bidang' => $validated['bidang'],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
            'role' => $validated["role"],
        ]);

        auth()->login($user);

        return redirect()->route('index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
