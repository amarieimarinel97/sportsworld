<?php
  session_start();
?> 

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="writearticle.css">
</head>
<body>


<form method="POST" action="php/write.php" enctype="multipart/form-data">

  <div class="container">
    <label for="title"><b>Article title</b></label>
    <input id="title-input"  type="text" placeholder="Enter title" name="title" required>

    <label for="description"><b>Short description</b></label>
    <input id="description-input" type="text" placeholder="Enter description" name="description" required>
		
	
    <label for="text"><b>Text body</b></label>
    <textarea id="text-input" placeholder="Enter text" name="text" required></textarea>

    
    <label for="category"><b>Category</b></label>
    <input type="text" placeholder="Enter category" name="category" required>

    <label for="photo"><b>Upload photo</b></label>
    <label for="file-upload" class="custom-file-upload">
    Upload
    </label>
    <input id="file-upload" type="file" accept=".jpg,.jpeg,.png,.gif" name="photo-upload"/>
     
	<button type="submit" value="submit">Submit</button>
  </div>

</form>

</body>
</html>
