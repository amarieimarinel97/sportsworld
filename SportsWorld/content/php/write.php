<?php	
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['text']) && isset($_POST['category']))
	{        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $text = $_POST['text'];
        $category = $_POST['category'];
	
		$handle = file_get_contents("../components/articles.json", "r") or die('Artcles not found!');
		$json_content = json_decode($handle, true);


		$uploaddir = "F:/apachetest/Apache24/htdocs/media/articles/";
		$uploadfile = $uploaddir . basename($_FILES['photo-upload']['name']);
	
		if (!move_uploaded_file($_FILES['photo-upload']['tmp_name'], $uploadfile)){
		   echo "Upload failed";
		}
	
		$newfile = "F:/apachetest/Apache24/htdocs/media/home/" . basename($_FILES['photo-upload']['name']);

		if (!copy($uploadfile, $newfile)) {
			echo "failed to copy $file...\n";
		}

		$newArticle = new stdClass();
		$newArticle->title = $title;
		$newArticle->description = $description;
		$newArticle->text = $text;
		$newArticle->category = $category . " | " . date('j F Y, H:i');
		$newArticle->photo = $_FILES['photo-upload']['name'];

		array_unshift($json_content["myarticles"], $newArticle);

		$newListOfArticles = json_encode($json_content);
		file_put_contents("../components/articles.json",$newListOfArticles) or die('Article writing failed!');

		$_SESSION['readAllArticles']=true;
		header("Location: ../index.php");
		exit();
	}
	

?>