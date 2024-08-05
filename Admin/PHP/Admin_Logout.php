<?php
session_start();

session_destroy();

header("Location: ../HTML/Admin_Login.html");
?>