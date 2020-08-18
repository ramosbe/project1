<!DOCTYPE html>
<html>
    
        <head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   .header{
          text-align: center;
          font-size: 30px; 
          background: #1abc9c;
      }
      .signform{
         background-color: lightblue;
          text-align: center;
      }
        .general{
          text-align:center;
          font-size: 20px;
      }
      
              .footer{
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: lightblue;
          text-align: center;
}
  </style>
</head>
<body>
    
         <div class="header" style="margin-bottom:0">
  <h1>STUDENT ENGAGEMENT SYSTEM</h1>
  <p>Make the most out of your Student Life!</p> 
</div> 

<?php

$pass=$_GET["pass"];

function check($pass){
$result=test123;

if($pass==$result){
    echo "Welcome clubs and organizations! Start posting your positions";
    header('Location: privuser.php');
}
}


switch($_GET["pass"]){

case "test123":
check($pass);
break; 


default:
echo "Looks like you don't have access to this site. Make sure you entered the correct password" ;
}
?>



<div class="footer" style="margin-bottom:0">
  <p>Need Help? Contact us</p>
  <p>contact@myses.com</p>
</div>

</body>
</html>
