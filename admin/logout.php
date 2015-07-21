<?php
session_start();
unset($_SESSION['user']);
session_destroy();
echo '<meta http-equiv=REFRESH CONTENT=1;url=../>';

