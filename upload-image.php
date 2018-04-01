 <?php
  include 'config.php';
  ?>
  <?php
if(isset($_POST["insert"]))
 {
	  $checkUser= $mysqli->query("SELECT count(*) as id FROM `images` WHERE tsa_num=".$user);
      $user = $_SESSION["username"];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      //$query= $mysqli->query("INSERT INTO images (name,tsa_num) VALUES ('$file','$user')");
     $check =mysqli_fetch_object($checkUser);

	if($check->id>0){
  	    $updateuser= $mysqli->query('UPDATE images SET name ="'.$file.'" where tsa_num='.$user);
           echo '<script>alert("Image updated")</script>';


	}
	else{
 $query= $mysqli->query("INSERT INTO images (name,tsa_num) VALUES ('$file','$user')");
			echo '<script>alert("Image inserted")</script>';
	}
}
 ?>

 <!DOCTYPE html>
 <html>
      <head>

      </head>
      <body>
           <div class="container" style="width:250px;">

                <table class="table table-bordered">

                <?php

				$user = $_SESSION["username"];
                $query = "SELECT * FROM images WHERE tsa_num='".$user."'";
                $result = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_array($result))
                {
                     echo '
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />
                               </td>
                          </tr>
                     ';
                }
                ?>
				<form method="post" enctype="multipart/form-data">
                     <input type="file" name="image" id="image" />
                     <br />
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                </form>
                </table>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#insert').click(function(){
           var image_name = $('#image').val();
           if(image_name == '')
           {
                alert("Please Select Image");
                return false;
           }
           else
           {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                     alert('Invalid Image File');
                     $('#image').val('');
                     return false;
                }
           }
      });
 });
 </script>
