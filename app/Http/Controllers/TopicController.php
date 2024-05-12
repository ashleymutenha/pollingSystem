<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topics;
use App\Models\options;

class TopicController extends Controller
{


   
    public function getTopics(Request $request){


        // $allTopics = topics::all();
        // $data =[];

        // foreach($allTopics as $topic){
        //   $topic->optionVotes =options::where('topicid',$topic->topicid)->get();
          
        //   $data[] =$topic;
          
        // }
       
        // return response($data);

        return response(json_encode("hello"))
        

    }


    public function saveTopic(Request $request){
       $request = $request;
        $data = $request->validate(['topic'=>'required', 'topicid'=>'required', "options"=>'required']);
        try{
        topics::create($data);


      return response(json_encode("success",1));
    }

    catch(exeception){
        return response(json_encode("failure",0));
    }

}
    public function generateTopicID(){

        $allTopics = topics::all();

        $newID =join(["TPC",str(sizeof($allTopics)+1)]);

        return $newID;

    }

    public function updateTopic(Request $request){
        try {
          $topic = topics::where('topicid', $request->topicid)->get()[0];
          $topic->update($request->updatedData);
  
          $option = options::where(['topicid'=>$request->topicid, 'option'=>$request->oldOption])->get();
          if(sizeof($option)!=0){
          $updatedOption =$option[0];
  
          $updatedOption->option = $request->newOption;
  
          $option->update($updatedOption);
          }
  
          return response(json_encode("success"));
        } catch (\Throwable $th) {
          return response(json_encode("failure"));

        }
        

    }

    public function deleteTopic( Request $request){

      try {
        $topic = topics::where('topicid', $request->topicid)->get()[0];
        $topic->delete();

        $options=options::where('topicid', $request->topicid)->get();

        foreach($options as $option){
         $option->delete();
        }
 
        return response(["status"=>"success", "code"=>200]);
      } 
      
      catch (\Throwable $th) {
        return response(["status"=>"failure", "code"=>400]);
      }
      
}
}
