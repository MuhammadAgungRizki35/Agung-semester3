<?php
session_start();
session_destroy();
header("Location: hm.html");
exit();
?>
