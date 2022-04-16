<?php 
require_once('../../private/initialize.php'); 
require_login();

//I DO NOT KNOW WHY THIS IS NOT WORKING!
if(!isset($_GET['employee_id'])) {
  redirect_to(url_for('/staff/employee_list.php'));
}
  
// Get the value and assign it to a local variable
$id = $_GET['employee_id'];

if(is_post_request()) {
  // Handle form values sent by new.php
  $subject = [];
  $subject['employee_id'] = $id;
  $subject['first_name'] = $_POST['first_name'] ?? '';
  $subject['last_name'] = $_POST['last_name'] ?? '';
  $subject['birthday'] = $_POST['birthday'] ?? '';
  $subject['email'] = $_POST['email'] ?? '';
  $subject['start_date'] = $_POST['start_date'] ?? '';
  $subject['user_level'] = $_POST['user_level'] ?? '';

  $result = update_employee($subject, $id);
  redirect_to(url_for('staff/show.php?employee_id=' . $subject['employee_id']));

} else {
  $subject = find_employee_by_id($id);
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Remarkable Employees: Edit</title>
    <link href="../stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div id="main-content">
      <header>
        <a href="<?php echo url_for('staff/index.php'); ?>"><img src="../images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
        <div id="header-content">
          <h1>Remarkable Employees</h1>
          <h4>Where We Come Together As A Team</h4>
        </div>
      </header>
      <!-- Putt the above in the staff_header page later and style it with staff_header.css -->

      <main id="page-content">
        <aside id="navigation">
          <nav id="main-nav">
            <ul>
              <l1><a href="<?php echo url_for('/staff/index.php'); ?>">Home</a></l1>
              <l1><a href="announcements.php">Announcements</a></l1>
              <l1><a href="images.php">Images</a></l1>
              <l1><a href="employee_list.php">Employees</a></l1>
              <l1><a href="<?php echo url_for('../public/logout.php'); ?>">Logout <?php echo $_SESSION['username']; ?></a></l1>
            </ul>
          </nav>
        </aside>

        <article id="description">
          <div>
            <?php echo display_session_message(); ?>
            <h2>Employee <?php echo h($subject['first_name']) . " " . h($subject['last_name']); ?></h2>
          </div>
          <hr>
          <div>
            <form action="<?php echo url_for('/staff/edit.php?employee_id=' . h(u($id))); ?>" method="post">
              <label for="first_name">First Name</label><br>
              <input type="text" id="first_name" name="first_name" value="<?php echo h($subject['first_name']); ?>"><br>
              <br>
              <label for="last_name">Last Name</label><br>
              <input type="text" id="last_name" name="last_name" value="<?php echo h($subject['last_name']); ?>"><br>
              <br>
              <label for="birthday">Birthday</label><br>
              <input type="text" id="birthday" name="birthday" value="<?php echo h($subject['birthday']); ?>"><br>
              <br>
              <label for="start_date">Start Date</label><br>
              <input type="text" id="start_date" name="start_date" value="<?php echo h($subject['start_date']); ?>"><br>
              <br>
              <label for="user_level">User Level</label><br>
              <input type="text" id="user_level" name="user_level" value="<?php echo h($subject['user_level']); ?>"><br>
              <br>
              <label for="email">Email</label><br>
              <input type="text" id="email" name="email" value="<?php echo h($subject['email']); ?>"><br>
              <br>
              <div id="operations">
                <input type="submit" name="submit" value="Edit Employee">
              </div>
            </form>
          </div>
        </article> 
      </main>
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
<?php //db_disconnect($db); ?>
