<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;

class ContributionsController extends Controller
{
    

    public function userContributions(Request $request){
        $currentUser  =$request->session()->get('username');
        $contributions =Contribution::where('email', $currentUser)->get();
        return view("contributions.usercontributions")->with('contributions', $contributions)
        ->with('username',$currentUser);
    }


    public function otherUsersContributions(Request $request){
        $username = $request->input('email');
        $contributions =Contribution::where('email', $username)->get();
        return view("contributions.usercontributions")->with('contributions', $contributions)
        ->with('username',$username);
    }


    public function getUserContributions(String $username){
        $contributions =Contribution::where('email', $username)->get();

        return response($contributions);
    }
}
