<?php

  // Performs all actions necessary to log in an employee
  function log_in_employee($employee) {
  // Regenerating the ID protects the employee from session fixation.
    session_regenerate_id();
    $_SESSION['logged_employee_id'] = $employee['employee_id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $employee['username'];
    $_SESSION['user_level'] = $employee['user_level'];
    return true;
  }

  function log_out_employee() {
    unset($_SESSION['logged_employee_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username']);
    unset($_SESSION['user_level']);
    // session_destroy(); //THIS DESTROYS THE WHOLE SESSION, OPTIONAL
    return true;
  }

// is_logged_in() contains all the logic for determining if a
// request should be considered a "logged in" request or not.
// It is the core of require_login() but it can also be called
// on its own in other contexts (e.g. display one link if an admin
// is logged in and display another link if they are not)
function is_logged_in() {
  // Having a admin_id in the session serves a dual-purpose:
  // - Its presence indicates the admin is logged in.
  // - Its value tells which admin for looking up their record.
  return isset($_SESSION['logged_employee_id']);
}

// Call require_login() at the top of any page which needs to
// require a valid login before granting access to the page.
function require_login() {
  if(!is_logged_in()) {

    redirect_to(url_for('../public/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

function is_admin() {
  if($_SESSION['user_level'] !== 'admin') {
    redirect_to(url_for('/login.php'));
  }
}

?>
