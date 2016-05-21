<!DOCTYPE html>
<html >
   <head>
      <meta charset="UTF-8">
      <title>Sign-Up/Login Form</title>
      <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="/css/login.css">
      <link rel="stylesheet" href="/css/reset.css">

   </head>
   <body>      
     <br>
     <br>
     <br>
     <span style="margin-left: 615px;">Smart <strong>Employees</strong></span>
     <br><br>
<div class="rerun"><a href="/">Home</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Sign - In</h1>

 
@if (count($errors) > 0)
            <strong>WHOOPS!</strong>FUCK YOU!!!.<br><br>
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error->first('email') }}</li>
               @endforeach
            </ul>
            @endif

    <form action="login" method="POST"> 
    {!! csrf_field() !!}
      <div class="input-container">
        <input type="email" name="email" id="Username" required="required"/>
        <label for="Email">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="password" id="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Go</span></button>
      </div>
    </form>
  </div>
</div>
      <!-- /form -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="js/index.js"></script>

   </body>
</html>