<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    public function storeRegister(StoreProfileRequest $request)
        {
            $request->validated();
            Profile::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            return redirect('/login');
        }

    public function login()
    {
        return view('auth.login');
    }

    public function checkLogin(Request $request){
        $values = [
            "email" =>$request->email,
            "password" => $request->password
        ];
        if(Auth::attempt($values)){
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return back()->withErrors([
                "email" => 'email ou mot de passe incorrect',
            ]);
        }
    }
    function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }

    public function editProfile(Request $request)
    {
        $user = $request->user();
        return view('auth.profile',compact('user'));
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
