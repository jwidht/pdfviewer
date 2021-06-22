<?php



$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["inputGroupFile02"]["name"]);
$uploadOk = 1;
//echo $target_file;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Allow certain file formats fileToUpload
$allowed_extensions = array("pdf", "ppt" );
if ( ! in_array( $imageFileType , $allowed_extensions))  
{
  echo "Sorry, this extension is not allowed.";
  $uploadOk = 0;
}
//else echo "This extension is OK";



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["inputGroupFile02"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } 
  else
   {
    if (move_uploaded_file($_FILES["inputGroupFile02"]["tmp_name"], $target_file)) 
    {
      //echo "The file ". htmlspecialchars( basename( $_FILES["inputGroupFile02"]["name"])). " has been uploaded.";
    } 
    else 
    {
      echo "Sorry, there was an error uploading your file.";
    }
  }

//other ways of reading PDFs:
//read PDF text
// include 'alt_autoload.php-dist';
// // Parse pdf file and build necessary objects.
// $parser = new \Smalot\PdfParser\Parser();
// $pdf    = $parser->parseFile($target_file); //'document.pdf'
// $text = $pdf->getText();
// echo $text;


// $im = new imagick( $target_file.'[0]'); //'file.pdf'.'[0]'
// $im->setImageFormat('jpg');
// #header('Content-Type: image/jpeg');
// #echo $im;
// $im->writeImage('./images/test.jpg');
// $im = new imagick( $target_file);
// $num_pages = $im->getNumberImages();
// for($i = 0;$i < $num_pages; $i++) 
// { 
// }

//delete all files in folder
array_map( 'unlink', array_filter((array) glob("./images/*") ) );

$im = new imagick( $target_file);
$im->writeImages('./images/slide.jpg', false);

//keeping the PDF just for any case

header('Location: index.php');
?>