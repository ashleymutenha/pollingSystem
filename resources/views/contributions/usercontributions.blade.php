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
        padding:10px 10px 10px 10px;
    }


    .card{
        padding:5px 5px 5px 5px;
        border-radius:12px;
        border:2px solid #e3ece5;
        width:fit-content;
        margin-top:10px;
        margin-right:10px;
    }

   

  
    
</style>

<html lang="en">
<head> 
    <meta charset="UTF-8">

    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div >
    <div class ="header" style =" ;height:10%; padding:3px 3px 3px 3px;">
     <span style ="margin-top:10px ; 
     font-size:30px; font-family:cursive; color:#ffff">Organisation Management System</span>
</div>


<div class ="container">

<div class ="card" style ="background:#9ad8a9; color:black; font-size:23px;">

  {{$username}}
</div>

@foreach($contributions as $contribution)
<div style ="display:flex; flex-wrap:wrap;">
<div class ="card">
<div style ="width:60px; height:60px; border-radius:50%; background:#89dd9e; margin-left:10px;opacity:0.8; border:2px dashed #ffff"></div>

<div style ="display:flex">
<div style ="border-right:1px solid #99b89e ;">
<div style ="font-size:40px; color:#306b3a; font-weight:bold ;font-family:cursive; border-bottom:1px solid #99b89e">
     <span style ="margin-right:10px;">Amount</span>
</div>

   <div style ="font-size:30px; color:#802d64">
     $ {{$contribution->contribution}}
</div>

</div>

<div>

<div style ="font-size:40px; color:#518359; font-weight:bold ;font-family:cursive; border-bottom:1px solid #99b89e;">
     <span style ="margin-left:10px">Time</span>
</div>

   <div style ="font-size:30px; color:navy">
   <span style ="margin-left:10px;">{{$contribution->created_at}}</span>
</div>
</div>


</div>



</div>
@endforeach
</div>
    </body>
    </html>