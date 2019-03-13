<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<title>SportsWorld</title>
  <link rel="stylesheet" href="main.css">
  <script src="script.js"></script>
</head>
<?php 
//  echo phpinfo();
 if(isset($_SESSION['readAllArticles'])){
  echo '<script type="text/javascript">',
   'loadContent(\'main.html\');',
   '</script>';
   unset($_SESSION['readAllArticles']);
}
?>

<body onload="loadContent('main.html');"> 
  <div id="navbar">
    <ul>
      <li><a href="#" class="active" id="logo" onclick="loadContent('main.html');">SportsWorld</a></li>
      <?php
      // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
					if(isset($_SESSION['user'])){
          echo "<li><a href=\"#\" onclick=\"loadContent('php/profile.php')\" id=\"login\">" . $_SESSION['user'] . "</a></li>";
?>	


<?php
}
else{
   
?>
      <li><a href="#" onclick="loadContent('login.html')" id="login">Log In</a></li>
<?php } 
      if(isset($_SESSION['user']) &&   $_SESSION['user']=="moderator"){
        echo "<li><a href=\"#\" onclick=\"loadContent('php/writearticle.php')\" id=\"moderate\"> Write article </a></li>";
      }?>

      <li><a href="#" onclick="loadContent('contact.html');" >Contact</a></li>
      <li style="float:right"><a href="#" onclick="loadContent('about.html');">About</a></li>
    </ul>
  </div>
  


  <div id="content">
  </div>


  <div class="myModal" onclick="hideModal()">
    <div class="modalTable">
      <table>
        <tr class="col">
          <th>Team</th>
          <th>Coach</th>
          <th>Best Player</th>
          <th>Current pos</th>
        </tr>
        <tr class="wpos">
          <td id="teamName"></td>
          <td id="teamCoach"></td>
          <td id="teamPlayer"></td>
          <td id="teamPos"></td>
        </tr>
        </table>
  </div>
</div> 
</body>

</html>