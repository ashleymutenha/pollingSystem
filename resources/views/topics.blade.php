<style>
 .header{
    border-bottom:1px solid lightgrey;
    height:50px;
    display:flex;
    flex-direction:column;
 }


 .btn{
    background:darkgreen;
    color:#ffff;
    padding:8px 8px 8px 8px;
    margin-bottom:2px;
    border-radius:12px;
    font-size:19px;
    border:1px solid darkgreen;
 }


 .save-button{
    background:beige;
    color:black;
    padding:8px 8px 8px 8px;
    margin-bottom:2px;
    border-radius:12px;
    font-size:19px;
    margin-top:12px;
    border:1px solid beige;
 }


 .new-button{
    background:purple;
    color:#ffff;
    padding:8px 8px 8px 8px;
    margin-bottom:2px;
    border-radius:12px;
    font-size:14px;
    margin-top:12px;
    border:1px solid purple;
 }

 .content{
    padding:12px 12px 12px 12px;
 }

 .add-new-box{
    border:1px solid lightgrey;
    border-radius:12px;
    padding:9px 9px 9px 9px;
    width:fit-content;
    height:fit-content;
 }


.form-controller{

    padding:9px 9px 9px 9px;
    border-radius:12px;
    font-size:15px;
 }

 .add-option-button{
    display:flex;
 }


 /* Javascript -blade foreach statement */

</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class ="header">

    <div style ="flex:6"></div>

    <div  style ="flex:6" >
     <button class ="btn">Add New Topic</button>
</div>

</div>

<div class ="content">
   
   <div class  ="add-new-box">
   <form action ="/api/saveTopic">
   @csrf 
    @Method('POST')
    <textarea type ="text" placeholder ="Enter Topic" class ="form-controller" name ="topic">
</textarea>
    <div>
    <input type ="text" placeholder ="Enter Topic" class ="form-controller" name ="topicid" value ="{{$newID}}" style ="visibility:hidden"/>
</div>


<div class ="add-option-button">
  <div style ="flex:6"></div>
  <div style = "flex:6">
  <!-- <button class ="new-button">New Option</button> -->

</div>
</div>
    <div >
    <button class ="save-button">Save</button>

    </div>
</form>
   </div>
</div>
</body>
</html>