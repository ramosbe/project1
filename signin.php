<?php 
  require_once "login.php";
  
 
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) {
  die($conn->connect_error);
}



  if (isset($_POST['delete']) && isset($_POST['email']))
  {
    $email   = get_post($conn, 'email');
    $query  = "DELETE FROM students WHERE email='$email'";
    $result = $conn->query($query);
  	if (!$result) 
  	echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  

  if (isset($_POST['fname'])   &&
      isset($_POST['lname'])    &&
      isset($_POST['email'])    &&
      isset($_POST['password']))
  {
    $fname   = get_post($conn, 'fname');
    $lname    = get_post($conn, 'lname');
    $email    = get_post($conn, 'email');
    $password = get_post($conn, 'password');
    $query    = "INSERT INTO students (fname, lname, email, password) VALUES".
    "('$fname', '$lname', '$email','$password')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  


  $query  = "SELECT * FROM students";
  
 
 
   $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);
  

  $rows = $result->num_rows;
  

  
  echo <<<_END
      <head>
      <link rel="stylesheet" type="text/css" href="../css/table.css">
      </head>
      <style>
     .header{
          text-align: center;
          background: #1abc9c;
      }
      
            .footer{
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: lightblue;
          text-align: center;
}
      </style>
    <body>  
    
    <div class="header" style="margin-bottom:0">
  <h1>STUDENT ENGAGEMENT SYSTEM</h1>
  <p> Make the most out of your Student Life!</p>
</div>

  <form action="signin.php" method="post"><pre>
    First Name <input type="text" name="fname" required>
    Last Name <input type="text" name="lname" requried>
    Email <input type="email" name="email" required>
    Password <input type="password" name="password" required>
           <input type="submit" value="ADD RECORD">
  </pre></form>
  </thead>
  <button class="button"><a href="../html/sign.html">Continue to myS.E.S Profile</a>
  
<p> By clicking Submit you agree that mySES has access to your records. This information
will only be used for mySES purposes. If you do not agree with these terms you may NOT submit the form</p>
  



    </body>
_END;
  
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>

  </pre>
  
_END;
  }

  
   echo <<<_END

  <div class="footer" style="margin-bottom:0">
  <p>Need Help? Contact us</p>
  <p>contact@myses.com</p>
</div>
_END;

  
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>