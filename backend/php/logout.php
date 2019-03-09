<?php
require "database/Database.php";
session_destroy();
header('Location: home.php');