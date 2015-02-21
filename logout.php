<?php
   // Check active session
  if(!isset($_SESSION)){ session_start(); }
  //Check for user details/authenticate that the page is being visited by an authenticated user
  if(empty($_SESSION['user']))
  {
    // if not redirect to login page
    header("Location: login.php");
    exit;
  }
  else
  {
    //Destroy the session, to flush all the session variables and kill the current session
    session_destroy();
  }

?>
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Logout</title>
</head>
<body>

<h2>You have logged out</h2>
<p>
<a href='login.php'>Login Again</a>
</p>

</body>
</html>