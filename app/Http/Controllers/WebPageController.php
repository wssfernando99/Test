<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebPageController extends Controller
{
    public function Dashboard (){

        try{


            return view('users.dashboard');

        }catch(Exception $e){

            return redirect()->back();
        }

        
    }
}
