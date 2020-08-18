<?php 
  require_once "login.php";
  
 
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) {
  die($conn->connect_error);
}


  if (isset($_POST['delete']) && isset($_POST['title']))
  {
    $title   = get_post($conn, 'title');
    $query  = "DELETE FROM jobs WHERE title='$title'";
    $result = $conn->query($query);
  	if (!$result) 
  	echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  

  if (isset($_POST['fname'])   &&
      isset($_POST['lname'])    &&
      isset($_POST['title'])    &&
      isset($_POST['category']) &&
      isset($_POST['description']))
  {
    $fname   = get_post($conn, 'fname');
    $lname    = get_post($conn, 'lname');
    $title    = get_post($conn, 'title');
    $category = get_post($conn, 'category');
    $description     = get_post($conn, 'description');
    $query    = "INSERT INTO jobs (fname, lname, title, category, description) VALUES".
    "('$fname', '$lname', '$title','$category','$description')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
    echo <<<_END
          <head>
          
      <link rel="stylesheet" type="text/css" href="../css/table.css">
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      </head>
      <style>
     .header{
          text-align: center;
          font-size: 30px; 
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
    
    
_END;

  $query  = "SELECT * FROM jobs";
  
 
 
   $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);
  

  $rows = $result->num_rows;
  

  
  echo <<<_END

    <body>  
    
    <div class="header" style="margin-bottom:0">
  <h1>STUDENT ENGAGEMENT SYSTEM</h1>
  <p> SCROLL DOWN!</p>
</div>

  <table>  
    <thead/>
    <th> First Name </th>
    <th> Last Name </th>
    <th> Title </th>
    <th> Category </th>
    <th> Description </th>
    <th>Apply</th>
    </thead>
    </body>
_END;
  
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
    <tr>
    <td>$row[0]</td>
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row[3]</td>
    <td>$row[4]</td>
    <td><button class="button"><a href="../html/apply.html">APPLY NOW</a></button></td>
  </tr>
  
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