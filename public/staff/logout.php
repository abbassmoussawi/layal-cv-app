<?php
session_start();
require_once('../../private/initialize.php');

unset($_SESSION['main_author']);
redirect_to(url_for('/staff/index.php'));
?>