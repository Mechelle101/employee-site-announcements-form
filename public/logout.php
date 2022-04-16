<?php
require_once('../private/initialize.php');

log_out_employee();
redirect_to(url_for('/login.php'));

// maybe put this in a session message? echo "you are logged out";

?>
