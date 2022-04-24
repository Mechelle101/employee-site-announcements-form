<?php 
require_once('../../../private/initialize.php'); 
require_login();
is_admin();

if(isset($_POST['submit']) && isset($_FILES['file_name'])) {
  $image = [];
  $image['caption'] = $_POST['caption'] ?? '';
  $image['employee_id'] = $_SESSION['logged_employee_id'] ?? '';

  $img_file_name = $_FILES['file_name']['name'];
  $img_size = $_FILES['file_name']['size'];
  $tmp_name = $_FILES['file_name']['tmp_name'];
  $error = $_FILES['file_name']['error'];
    
  if ($error === 0) {
    if ($img_size > 2000000) {
      $error_msg = "Sorry, your file is too large.";
      header("Location: images.php?error=$error_msg");
    } else {
      $img_ex = pathinfo($img_file_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);
      
      $allowed_exs = ['jpg', 'jpeg', 'png', 'tiff', 'jpg'];
      
      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_image_file_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $image_upload_path = '../../upload-images/' . $new_image_file_name;
        move_uploaded_file($tmp_name, $image_upload_path);
        
        // THIS IS NOT SHOWING MY CONFIRMATION MESSAGE
        $result = insert_image($new_image_file_name, $image);
        if($result === true) {
          $_SESSION['message'] = 'The image was uploaded successfully.';
          header('Location: images.php');
        }
        
      } else {
        $error_msg = "You cannot upload $img_ex_lc files";
        header("Location: images.php?error=$error_msg");
      }
      
    }
  } else {
    $error_msg= "unknown error occurred";
    header("Location: images.php?error=$error_msg");
  }
  
} else {
  //header("Location: images.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Remarkable Employee Images</title>
    <link href="../../stylesheets/public-styles.css" rel="stylesheet">
    <script src="../../js/public.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="../../images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <!-- Header -->
  <body>
    <div id="main-content">
      <header>
        <a href="<?php echo url_for( 'staff/admin/index.php'); ?>"><img src="../../images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
        <div id="header-content">
          <h1>Remarkable Employees</h1>
          <h4>Where We Come Together As A Team</h4>
        </div>
        <div id="user-info">
          <p>Welcome <?php echo $_SESSION['username']; ?></p>
          <p>You are logged in as - <?php echo $_SESSION['user_level']; ?></p>
        </div>
      </header>
      <!-- Navigation -->
      <main id="page-content">
        <aside id="navigation">
          <nav id="main-nav">
            <ul>
              <l1><a href="index.php">Admin Home</a></l1>
              <l1><a href="announcements.php">Announcements</a></l1>
              <l1><a href="images.php">Images</a></l1>
              <l1><a href="employee_list.php">Employees</a></l1>
              <l1><a href="<?php echo url_for('../public/logout.php'); ?>">Logout <?php echo $_SESSION['username']; ?></a></l1>
            </ul>
          </nav>
        </aside>
       <!-- Main body -->
        <article id="description">
          <div>
            <h1>Add Your Image</h1>
            <?php 
            // This is not displaying my confirmation message
            echo display_session_message(); 
            if (isset($_GET['error'])): ?>
              <p><?= $_GET['error']; ?></p>
            <?php endif ?>

            <fieldset id="image-form">
              <form action="images.php" method="post" enctype="multipart/form-data">
                <label for="caption">Image Caption</label>
                <input type="text" name="caption"><br>
                <br>
                <label for="file_name">Image Upload</label>
                <input type="file" name="file_name" required><br>
                <br>
                <input type="submit" name="submit" value="upload">
              </form>
            </fieldset>

          </div>
          <hr>
          <h2>Employee Image Display</h2>
          <div id="images">
            <?php
              $image_set = find_all_images_and_employee_names();
             
              if(mysqli_num_rows($image_set) > 0) {
                while($images = mysqli_fetch_assoc($image_set)) { ?>
                <!-- PUT THIS ON A GRID TO EVEN THE BUTTONS OUT -->
                <fieldset>
                  <img id="image1" src="../../upload-images/<?= $images['file_name'] ?>">
                  <div  id="add-employee">
                    <a class="action" href="<?php echo url_for('/staff/admin/show-image-info.php?image_id=' . h(u($images['image_id']))); ?>">View Image Information</a>
                  </div>
                </fieldset>
              <?php }
                  } 
            ?>
          </div>

        </article> 
      </main>

      <!-- PAGE FOOTER -->
      <footer id="footer">
        <div id="my-info">
          <h4>Created By</h4>
          &copy; <?php echo date('Y'); ?> Mechelle &#9774; Presnell &hearts;
        </div>
        <div id="chamber">
          <h4>Chamber of Commerce Links</h4>
          <p><a href="https://www.ashevillechamber.org/news-events/events/wnc-career-expo/?gclid=EAIaIQobChMI--vY9Jfk9gIVBLLICh1_2gFFEAAYASAAEgJtifD_BwE" target="_blank">Asheville Chamber of Commerce</a></p>
          <p><a href="https://www.uschamber.com/" target="_blank">US Chamber of Commerce</a></p>
        </div>
      </footer>
    </div>
  </body>
</html>
