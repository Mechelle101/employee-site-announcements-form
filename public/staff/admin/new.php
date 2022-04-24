<?php 
require_once('../../../private/initialize.php'); 
require_login();
is_admin();

if(is_post_request()) {
  $employee = [];
  $employee['first_name'] = $_POST['first_name'] ?? '';
  $employee['last_name'] = $_POST['last_name'] ?? '';
  $employee['user_level'] = $_POST['user_level'] ?? '';
  $employee['department_initial'] = $_POST['department_initial'] ?? '';
  $employee['email'] = $_POST['email'] ?? '';
  $employee['username'] = $_POST['username'] ?? '';
  $employee['password'] = $_POST['password'] ?? '';
  $employee['confirm_password'] = $_POST['confirm_password'] ?? '';

  // EDIT THE QUERY TO ADD THE USER CREDENTIALS
  $result = insert_employee($employee);
  if($result === true) {
  $new_id = mysqli_insert_id($db);
  $_SESSION['message'] = 'The employee was created successfully.';
  redirect_to(url_for('staff/admin/show.php?employee_id=' . $new_id));
  } else {
    $errors = $result;
  }

} 

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Remarkable Employees: New Employee</title>
    <link href="../../stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <!-- Header -->
  <body>
    <div id="main-content">
      <header>
        <a href="<?php echo url_for('staff/admin/index.php'); ?>"><img src="../../images/ppl-logo.png" alt="circle logo" width="100" height="100"></a>
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
              <l1><a href="<?php echo url_for( '/staff/admin/index.php'); ?>">Admin Home</a></l1>
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
            <?php echo display_session_message(); ?>
            <h1>Create A New Account</h1>
            <p>Admin page to add a new employee</p>
          </div>
          <hr>
          <div>
            <?php echo display_errors($errors); ?>
            <form action="<?php echo url_for('/staff/admin/new.php');  ?>" method="post">
              <label for="first_name">First Name</label><br>
              <input type="text" id="first_name" name="first_name" value=""><br>
              <br>
              <label for="last_name">Last Name</label><br>
              <input type="text" id="last_name" name="last_name" value="<?php //echo h($employee['last_name']); ?>"><br>
              <br>
              <label for="user_level">Account Type (admin or employee)</label><br>
              <input type="text" id="user_level" name="user_level" value="<?php //echo h($employee['user_level']); ?>"><br>
              <br>
              <label for="department_initial">Department (initial)</label><br>
              <input type="text" id="department_initial" name="department_initial" value="<?php //echo h($employee['department_initial']); ?>"><br>
              <br>
              <label for="email">Email</label><br>
              <input type="text" id="email" name="email" value="<?php //echo h($employee['email']); ?>"><br>
              <br>
              <label for="username">Username</label><br>
              <input type="text" id="username" name="username" value="<?php //echo h($employee['username']); ?>"><br>
              <p>Password should be at least 8 characters, 
              <br>include at least one uppercase, lowercase, number, and symbol.</p>
              <label for="password">Password</label><br>
              <input type="password" id="password" name="password" value=""><br>
              <br>
              <label for="password">Confirm Password</label><br>
              <input type="password" id="password" name="confirm_password" value=""><br>
              <br>
              <div id="operations">
                <input type="submit" name="submit" value="Add Employee">
              </div>
            </form>
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

