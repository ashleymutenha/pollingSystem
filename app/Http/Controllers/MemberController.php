<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Contribution;
class MemberController extends Controller
{
    public function loginView(){
        return view("members.login")->with("errorMessage",'');
    }

    public function registerView(){
        return view("members.register")->with("errorMessage",'');
    }



    public function register(Request $request){

        $data = $request->validate(['name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'password'=>'required']);

        $allRegisteredData = Member::all();
        $errorMessage ='';


        // Validation
        if($request->password=='' || 
        $request->password2==''|| $request->email ==''||
        $request->name==''|| $request->phone ==''){
            $errorMessage = 'Enter All Details!';

        }
        else{
        foreach($allRegisteredData as $user){
            if($user->email == $request->email){
              $errorMessage = 'Username already Choosen!';
            }
        }

        if($errorMessage==''){
            if($request->password != $request->password2){
                $errorMessage = 'Password Mismatch!';

            }
        }
    }
    // exit POST Method
    if ($errorMessage ==''){
        Member::create($data);

        return redirect(route('loginView'));
    }

    else{
        return view("members.register")->with('errorMessage',$errorMessage);
    }
        
    }


    public function mobileAppRegister(Request $request){

        $data = $request->validate(['name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'password'=>'required']);

        $allRegisteredData = Member::all();
        $errorMessage ='';


        // Validation
        if($request->password=='' || 
        $request->password2==''|| $request->email ==''||
        $request->name==''|| $request->phone ==''){
            $errorMessage = 'Enter All Details!';

        }
        else{
        foreach($allRegisteredData as $user){
            if($user->email == $request->email){
              $errorMessage = 'Username already Choosen!';
            }
        }

        if($errorMessage==''){
            if($request->password != $request->password2){
                $errorMessage = 'Password Mismatch!';

            }
        }
    }
    // exit POST Method
    if ($errorMessage ==''){
        Member::create($data);

        return response('success',200);
    }

    else{
        return response($errorMessage,400);
    }
        
    }

    public function login(Request $request){
       $username =$request->input('email');
       $password = $request->input('password');
       $userObject = Member::where('email',$username)->get()->first();
       $errorMessage ='';
    //    if($password==$userObject[0]->password){
    //     $request->session()->put('username',$username);
    //     return redirect(route('userView'));
    //    }
    if($userObject==null){
     $errorMessage ="Member Not Found!";
     return view("members.login")->with('errorMessage',$errorMessage);

    }


    if($errorMessage !="Member Not Found!"){
           if($password==$userObject->password){
        $request->session()->put('username',$username);
        return redirect(route('userView'));
       }

       else{
        $errorMessage ="Password Wrong!";
        return view("members.login")->with('errorMessage',$errorMessage);
       }
    }

    else{
        return response("No data");
    }

    
    }


    

    


    public function userView(Request $request){
        $currentUser  = $request->session()->get('username');
        $allUsers =Member::all();


        $currentUserDetails = Member::where('email',$currentUser)->get()[0];
        $addContribution = $request->session()->get('contributionStatus');

        $allowAddContribution =false;
        $members =[];
        foreach($allUsers as $user){
            if($user->email!=$currentUser){
                $members[] =$user;
            }
        }

        if($addContribution==true){
            $allowAddContribution =true;
        }
        
        return view("members.memberpage")->with('members',$members)
        ->with('userDetails', $currentUserDetails)
        ->with('addContributionStatus',$allowAddContribution);
    
}

public function allowAddContribution(Request $request){
  $request->session()->put('contributionStatus',true);
  return redirect(route('userView'));
}

public function removeAddContribution(Request $request){
    $request->session()->put('contributionStatus',false);
    return redirect(route('userView'));
  }

  public function saveContribution(Request $request){

    $data = $request->validate(['email'=>'required',
    'contribution'=>'required']    
  );
  Contribution::create($data);
  $request->session()->put('contributionStatus',false);

  return redirect(route('userView'));

  


  }


  public function searchMembers(Request $request){

    $currentUser  = $request->session()->get('username');
    $allUsers =Member::all();
    $searchName = $request->input('name');

    $currentUserDetails = Member::where('email',$currentUser)->get()[0];
    $addContribution = $request->session()->get('contributionStatus');

    $allowAddContribution =false;
    $members =[];
    foreach($allUsers as $user){
        if($user->email!=$currentUser){
            if(str_contains(strtolower($user->name),strtolower($searchName))!==false){

            $members[] =$user;

            }
      
        }
    }

    if($addContribution==true){
        $allowAddContribution =true;
    }
    
    return view("members.memberpage")->with('members',$members)
    ->with('userDetails', $currentUserDetails)
    ->with('addContributionStatus',$allowAddContribution);

  }


  public function getAllMembers(){
    $allMembers = Member::all();

    return response($allMembers);

  }

  public function getUserInfo(String $username){
    $userInfo = Member::where('email',$username)->get()->first();

    return response($userInfo);
}


public function updateUser(Request $request){
    
    $data = $request->validate(['name'=>'required',
    'email'=>'required',
    'phone'=>'required',
    'password'=>'required']);

    $member = Member::where('email', $request->email)->get()->first();
    $member->update($data);
    return response("Update Success");
}


  
}
