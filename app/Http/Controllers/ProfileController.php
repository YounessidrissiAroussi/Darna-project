<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Publication;
use Faker\Guesser\Name;
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

    public function Profile(Request $request)
    {
        $user = Profile::find(Auth::id());
        return view('auth.profile',['user' => $user]);
    }


    public function update(UpdateProfileRequest $request)
    {
        $user = Profile::find($request->id);
        if($user && Hash::check($request->old_password, $user->password) )
        {
            $request->validated();
         
                $user->name = $request->name;
                $user->email = $user->email;
                $user->password = Hash::make($request->password);
                $user->update();
           
            return back()->with('success','Account has updated');
        }else{
            return back()->with('danger',"password is not correct");
        }
        
    }
    public function ProfileSetting(Request $request)
    {
        $user = $request->user();
        return view('auth.profileSetting' , compact('user'));
    }

    public function profileDelete(Request $request)
    {
        $user = Profile::find($request->id);
        if($user && Hash::check($request->password, $user->password) )
        {
            $user->delete();
            Session::flush();
            Auth::logout();
            return redirect('/')->with('success','Account has delete');
        }else{
            return back()->with('danger',"password is not correct ");
        }
    }

    
}
