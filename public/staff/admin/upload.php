<?php
require_once('../../../private/initialize.php'); 


// if(isset($_POST['submit']) && isset($_FILES['file_name'])) {
//   echo "<pre>"; 
//   print_r($_FILES['file_name']);
//   echo "</pre>";
  
//   $img_name = $_FILES['file_name']['name'];
//   $img_size = $_FILES['file_name']['size'];
//   $tmp_name = $_FILES['file_name']['tmp_name'];
//   $error = $_FILES['file_name']['error'];
    
//   if ($error === 0) {
//     if ($img_size > 2000000) {
//       $em = "Sorry, your file is too large.";
//       header("Location: index.php?error=$em");
//     } else {
//       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//       $img_ex_lc = strtolower($img_ex);
      
//       $allowed_exs = ['jpg', 'jpeg', 'png'];
      
//       if (in_array($img_ex_lc, $allowed_exs)) {
//         $new_image_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
//         $image_upload_path = 'uploads/' . $new_image_name;
//         move_uploaded_file($tmp_name, $image_upload_path);
        
//         $sql = "INSERT INTO image(file_name) VALUES('$new_image_name') ";
//         mysqli_query($db, $sql);
//         //header('Location: view-image.php');

//       } else {
//         $em = "You cannot upload $img_ex_lc files";
//         header("Location: index.php?error=$em");
//       }
      
//     }
//   } else {
//     $em = "unknown error occurred";
//     header("Location: index.php?error=$em");
//   }
  
// } else {
//   header("Location: index.php");
// }

?>