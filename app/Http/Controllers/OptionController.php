<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\options;
use App\Models\topics;

class OptionController extends Controller
{





    public function getOptions(Request $request){

      $allOptions = options::all();


      return response(json_encode($allOptions));


    }

    
    public function saveOption(Request $request){
        try{ 
           



           
        $data = $request->validate([ "option"=>"required","votes"=>"required","topicid"=>"required"]);
         
        $checkIfOptioninDB = options::where('topicid',$request->topicid)->get();


        $_opt =[];
        foreach($checkIfOptioninDB as $option){
        if($option->option ===$request->option){
            $_opt[] =$option;
        }
        }

        if(sizeof($_opt)==0){
            options::create($data);
            return response(json_encode("success"));

        }


        if(sizeof($_opt)!=0){

           $_opt[0]->update($data);
            return response(json_encode("success"));

        }

        
    }

    catch(error $e){
        return response(json_encode($e));
    }

}



function getCurrentOptionVotes(Request $request){

            $checkIfOptioninDB = options::where('topicid',$request->topicid)->get();


            $_opt =[];
            foreach($checkIfOptioninDB as $option){
            if($option->option ===$request->option){
                $_opt[] =$option;
            }
            }
        if(sizeof($_opt)>0){
        return(json_encode($_opt[0]->votes));
        }

        else{
            return(json_encode(0));
  
        }

        }


public function deleteOption(Request $request){
    $option = options::where(["topicid"=>$request->topicid,"option"=>$request->option])->first();
    $topic = topics::where('topicid', $request->topicid)->get()[0];

    $topic->update($request->updated_topic);
    if($option!=null){
    $option->delete();
    }

    return response(json_encode("success"));
}
     


        // options::create($data);


        

      

    }



