<?php
  session_start();
?> 

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<link rel="stylesheet" href="profile.css">
<title>My profile</title>
</head>

<body> 

<form method="POST" action="php/logout.php">
  <div class="imgcontainer">
    <?php
    echo "<img src=\"../media/profile/" . $_SESSION['avt'] . "\" alt=\"avatar\" class=\"avatar\">";
    ?>
    
  </div>

<div class="container">
    <label><b>Name</b></label>
    
    <span>
      <?php
      echo $_SESSION['user'];
      ?>
    </span>

    <label><b>E-mail</b></label>
    <span>
      <?php
      echo $_SESSION['email'];
      ?>
    </span>

    <label><b>Favourite team</b></label>
    <span>
      <?php
      echo $_SESSION['team'];
      ?>
    </span>

    <label><b>Age</b></label>
    <span>
      <?php
      echo $_SESSION['age'];
      ?>
    </span>
        
    <button type="submit">Log Out</button>
  </div>

  </form>

 </body>

</html>