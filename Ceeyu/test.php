<!DOCTYPE html>
<html>
<body>

  <form method="post" action="test.php" enctype="multipart/form-data">
  <input type="file" name="imageupload">
  <input type="submit" name="submit" value="upload">
  </form>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
  // Give the Complete Path of the folder where you want to save the image	
  $folder="image/";
  move_uploaded_file($_FILES["imageupload"]["tmp_name"], "$folder".$_FILES["imageupload"]["name"]);
  $file='iamge/'.$_FILES["imageupload"]["name"];

  $uploadimage=$folder.$_FILES["imageupload"]["name"];
  $newname=$_FILES["imageupload"]["name"];

  // Set the thumbnail name
  $thumbnail = $folder.$newname."_thumbnail.jpg"; 
  $actual = $folder.$newname.".jpg";
  $imgname=$newname."_thumbnail.jpg";

  // Load the mian image
  $source = imagecreatefromjpeg($uploadimage);

  // load the image you want to you want to be watermarked
  $watermark = imagecreatefrompng('watermark.png');

  // get the width and height of the watermark image
  $water_width = imagesx($watermark);
  $water_height = imagesy($watermark);

  // get the width and height of the main image image
  $main_width = imagesx($source);
  $main_height = imagesy($source);

  // Set the dimension of the area you want to place your watermark we use 0
  // from x-axis and 0 from y-axis 
  $dime_x = 0;
  $dime_y = 0;

  // copy both the images
  imagecopy($source, $watermark, $dime_x, $dime_y, 0, 0, $water_width, $water_height);

  // Final processing Creating The Image
  imagejpeg($source, $thumbnail, 100);
}
?>
  <img src='images/<?php echo $imgname;?>'>