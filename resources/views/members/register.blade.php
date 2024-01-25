<style>


    .header{
        background:rgb(18, 99, 45);
        padding:3px 3px 3px 3px;
    }

    body{
        padding:0;
        margin:0;
    }

    .auth-form{
        width:20%;
        margin:0 auto;
        margin-top:6%

    }

    .inner-form{
        border-radius:12px;
        border:1px solid lightgrey;
        width:340px;
        

    }

    .input-section{
        margin-top: 3px;
        padding:2px 2px 2px 2px ; 

        border-bottom: 1px solid lightgrey;

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
        font-size: 18px;
        color:#176832;
        font-weight:bold
    }

    .form-header{
      background:#6b9e74;
      color:black;
      text-align:center;
      font-size:23;
      font-family:cursive;
      font-weight:bold;
      border-radius:12px
    }

      .input-group{
        margin-bottom:3px
      }


      .submit-button{
        background:#05491c;
        color:#ffff;
        padding:5px 5px 5px 5px;
        font-size:16px;
        border-radius:10px;

      }


      .submit-button-signup{
        background:#aeddbe;
        color:black;
        padding:5px 5px 5px 5px;
        font-size:16px;
        border-radius:10px;
        border:1px solid #aeddbe

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


<div class ="auth-form">
    <div class ="inner-form">
        <div class ="form-header">
            Authentication
        </div>

    <div class ="input-section">

    <div style ="font-size:26px;margin-top:6px ; margin-bottom:6px; text-align:center; 
    font-family:cursive; color:#afdbb6">
        SIGN UP
    </div>

    <h2 style ="margin-left:5px;color:green">{{$errorMessage}}</h2>
        <form action = "{{route('savemember')}}">
            @csrf
            @Method('POST')
    <div class ="input-group">
        <label class ="form-label">FullName:</label>
    <input class ="form-control" type ="text" placeholder ="Denis Joe" name ="name"/>
    </div>

    <div class ="input-group">
        <label class ="form-label">Email:</label>
    <input class ="form-control" type ="email" placeholder ="tanaka@gmail.com" name ="email"/>
    </div>

    <div class ="input-group">
        <label class ="form-label">Phone:</label>
    <input class ="form-control" type ="phone" placeholder ="0789678456" name ="phone"/>
    </div>



    <div class ="input-group">
        <label class ="form-label">Password:</label>
    <input class ="form-control" type ="password" placeholder ="*********" name ="password"/>
    </div>

    <div class ="input-group">
        <label class ="form-label">Password Again:</label>
    <input class ="form-control" type ="password" placeholder ="*********" name ="password2"/>
    </div>

    <button class ="submit-button">REGISTER</button>
    </form>
    </div>


    <div class ="signup">
     <form style ="padding:0;margin:0" action ="{{route('loginView')}}">
    <span style ="color:green ; font-size:17px">Already Registered?     <button class ="submit-button-signup">SIGN IN</button>
</span></form>
    </div>


</div>
    
<div>


</div>
    
</body>
</html>