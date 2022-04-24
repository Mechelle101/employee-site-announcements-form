<?php
require_once('../../../private/initialize.php');
require_login();
is_admin();

// Get the value and assign it to a local variable
$id = $_GET['employee_id'] ?? '1';

$employee = find_employee_by_id($id);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Remarkable Employee Info</title>
    <link href="../../stylesheets/public-styles.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

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
              <l1><a href="<?php echo url_for( '/staff/admin/index.php'); ?>">Admin Home</a></l1>
              <l1><a href="announcements.php">Announcements</a></l1>
              <l1><a href="images.php">Images</a></l1>
              <l1><a href="employee_list.php">Employees</a></l1>
              <l1><a href="<?php echo url_for('../public/logout.php'); ?>">Logout <?php echo $_SESSION['username']; ?></a></l1>
            </ul>
          </nav>
        </aside>
        <!-- Main Body -->
        <article id="description">
          <div>
            <?php echo display_session_message(); ?>
            <h1>Employee Information</h1>
            <div id="add-employee" id="action">
              <a class="action" href="<?php echo url_for('staff/admin/employee_list.php'); ?>">Back to List</a>
              <a class="action" href="<?php echo url_for('/staff/admin/edit.php?employee_id='. h(u($employee['employee_id']))); ?>">Edit</a>
              <a class="action" href="<?php echo url_for('/staff/admin/delete.php?employee_id='. h(u($employee['employee_id']))); ?>">Delete</a>
            </div>
          </div>
            <div>
              <div class="attributes">
                <p>ID: <?php echo h($employee['employee_id']) . " " .  h($employee['last_name']); ?></p>
                <p>NAME: <?php echo h($employee['first_name']) . " " .  h($employee['last_name']); ?></p>
                <p>ACCOUNT TYPE: <?php echo h($employee['user_level']); ?></p>
                <p>DEPARTMENT: <?php echo h($employee['department_initial']); ?></p>
                <p>EMAIL: <?php echo h($employee['email']); ?></p>
              </div>
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

