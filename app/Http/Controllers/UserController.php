<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Register(Request $request){

        try{

            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'contact' => 'required',
                'password' => 'required|min:6',
            ],[
                'name.required' => 'Please enter your name',
                'email.required' => 'Please enter your email',
                'email.email' => 'Please enter valid email address',
                'password.required' => 'Please enter password',
                'password.min' => 'The new password field must be at least 6 characters.',
            ]);


            if(
                User::where('email',$request->email)->where('contact',$request->contact)
                    ->exists()
            ){
                return redirect()->back()->with('error','Email or contact number you entered already Used.');

            }elseif($request->password !== $request->confirmpassword){

                return redirect()->back()->with('error','password does not match');
            }else{

                $userId = uniqid();

                $user = new User();

                $user->userId = $userId;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->contact  = $request->contact;
                $user->password = Hash::make($request->password);
                $user->role = "user";
                $user->isActive = 1;

                $user->save();

                return redirect('/login')->with('message','You Registered successfully.you can sign in here.');

            }

            

        }catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }

        
        
    }

    public function Login (Request $request){
        try {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isActive' => 1])) {

                $id = Auth::user()->id;
                $userId = Auth::user()->userId;
                $role = Auth::user()->role;
                $name = Auth::user()->name;
                session()->put('id', $id);
                session()->put('userId', $userId);
                session()->put('role', $role);
                session()->put('name', $name);

                    return redirect('/dashboard');
                
            }else{

                return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid login credentials');
            }

            
        } catch (Exception $e) {

            return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid login credentials');
        }
    }

    public function Logout()
    {

        try {
            session()->forget('role');
            session()->forget('id');
            session()->forget('userId');
            session()->forget('name');
            session()->flush();

            return redirect('/');

        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Something went wrong. Please try again');
        }
    }
}
