<style>


    .header{
        background:rgb(18, 99, 45);
        padding:3px 3px 3px 3px;
    }

    body{
        padding:0;
        margin:0;
    }

    .container{
        display:"flex";
        
        /* padding:10px 10px 10px 10px; */
    }

    .card1{
        /* padding:5px 5px 5px 5px; */
        border-radius:12px;
        border:1px solid green;
        width:fit-content;
        margin-top:10px;
    }

    .card{
        padding:5px 5px 5px 5px;
        border-radius:12px;
        border:1px solid green;
        width:fit-content;
        margin-top:10px;
    }


    .finance-button{
        color:#ffff;
        background:#3d7a3d;
        font-size:18px;
        border-radius: 12px;
        padding:8px 8px 8px 8px;
        border:1px solid #3d7a3d;
    }

    .add-finance-button{
        color:#ffff;
        background:#292b77;
        font-size:18px;
        border-radius: 12px;
        padding:8px 8px 8px 8px;
        border:1px solid #3d7a3d;
    }

    .finance-button1{
        color:#ffff;
        background:#3d7a3d;
        font-size:15px;
        border-radius: 12px;
        padding:8px 8px 8px 8px;
        border:1px solid #3d7a3d;
    }

    .add-finance-button1{
        color:#ffff;
        background:#292b77;
        font-size:15px;
        border-radius: 12px;
        padding:8px 8px 8px 8px;
        border:1px solid #3d7a3d;
    }

    form{
        padding:0;
    }

    .signup{
        /* margin-top:2px */
        /* text-align:center; */
        padding:3px 3px 3px 3px;
    }
    .form-control{
        border-radius:10px;
        padding:6px 6px 6px 6px ;
        border:1px solid lightgrey;
        width:330px;
        font-size:19px;
    }

    .form-label{
        margin-left:2px;
        font-size: 23px;
        color:#176832;
        font-weight:bold;
        margin-top:5px;
    }

</style>

<html lang="en">
<head> 
    <meta charset="UTF-8">

    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <div class ="header" style =" ;height:10%; padding:3px 3px 3px 3px;">
     <span style ="margin-top:10px ; 
     font-size:30px; font-family:cursive; color:#ffff">Organisation Management System</span>
</div>

<div class ="container" style ="display:flex">
   <div style ="border-right:1px solid lightgrey; padding:11px 11px 11px 11px;width:fit-content">
  <div class ="card1" >
    <div style ="position:relative; background:#f2f2f3; padding:0; margin:0;
    border-top-right-radius: 12px;
    border-top-left-radius: 12px;padding:3px 3px 3px 3px;">
   <div style ="font-size:28px; top :30px; position:absolute; font-family:cursive;margin-left:20px;">Personal Details</div>
   <div style ="display:flex">
  <div style ="width:118px; height:118px; border-radius:50%; background:#c2c2c7; margin-left:10px;opacity:0.6"></div>
  <div style ="width:118px; height:118px; border-radius:50%; background:#5af1a6; margin-left:10px;opacity:0.6"></div>
</div>

</div>
    <div style ="padding:8px 8px 8px 8px">
   <div style ="font-size:32px;color:grey; margin-top:30px; margin-bottom:5px; border-bottom:1px solid green; font-family:cursive">{{$userDetails->name}}</div>
   <div style ="font-size:32px;color:green; margin-top:23px; margin-bottom:5px; border-bottom:1px solid green; font-family:cursive">{{$userDetails->email}}</div>
   <div style ="font-size:32px;color:blue; margin-top:23px; margin-bottom:5px; border-bottom:1px solid green; font-family:cursive">{{$userDetails->phone}}</div>
   <div>
   @if($addContributionStatus ==true)
   <div class ="card" style ="margin-bottom:3px">
   <form action ="{{route('remove')}}">
    @csrf 
    @Method('POST')
    <button style ="padding:4px 4px 4px 4px;color:#ffff;background:purple; font-size:18px; 
    border-radius:12px;border:1px solid purple;">Close</button>
   </form>


   <form action ="{{route('saveContrib')}}" >
        @csrf  
        @Method('POST')
   
   
    <div>
    <label class ="form-label">Amount</label>
    <div>
    <input type = "float" placeholder ="Enter Amount" class ="form-control" name = "contribution"/>
    </div>

    <div>
    <input type = "text" placeholder ="Enter Amount" class ="form-control" 
    value = "{{$userDetails->email}}" name ="email" style ="display:none"/>
    </div>
    </div>
    <button class ="add-finance-button" style ="margin-top:3px">Save</button>

   </form>
</div>
   @else
   <form action ="{{route('allowContrib')}}">
   @csrf 
    @Method('POST')
   <div style = "margin-bottom:3px"><button class ="add-finance-button">Add Contribution</button></div>
    </form>
   @endif
</div>
    <form action ="{{route('userContributions')}}" style ="padding:0; margin:0;">
    @csrf 
    @Method('POST')
   <button class ="finance-button">View Financial Contributions</button>
</form>
  </div>

 

</div>



</div>
<div class ="card" style ="margin-left:10px ;margin-right:30px;">


 <div>
    <form action ="{{route('searchResults')}}">
        @csrf 
        @Method('POST')
    <input style ="padding:12px 12px 12px 12px;" placeholder = "Search User" name ="name"/>
    <button style ="border-radius:12px; background:green; color:#ffff;
    padding:10px 10px 10px 10px;font-size:18px;border:1px solid green;">Search</button>
    </form>
 <div>

 <div style ="margin-bottom:10px; margin-top:10px;">
 <form action ="{{route('userView')}}">
    @csrf 
    @Method('POST')
 <button style ="border-radius:12px; background:green; color:#ffff;
    padding:10px 10px 10px 10px;font-size:18px;border:1px solid green;">View All Members</button>
    </form>
</div>

<div style ="display:flex; flex-wrap:wrap">
   @foreach($members as $member)
    <div class ="card" style ="margin-right:10px">
    <div style ="width:40px; height:40px; border-radius:50%; background:#e6eeea; margin-left:10px;opacity:0.6"></div>

    <span style ="font-family:cursive; font-size:20px">{{$member->name}}</span>

   
    <!-- <div style = "margin-bottom:3px"><button class ="add-finance-button1">Add Contribution</button></div> -->

   <div>
    <form action ="{{route('othersContributions')}}">
        @csrf 
        @Method('POST')
        <div style ="display:none"><input type ="text" name ="email" value ="{{$member->email}}"/></div>
    <button class ="finance-button1">View Financial Contributions</button>
</form>
</div>



    </div>
    @endforeach
</div>


</div>
</div>
</body>
</html>