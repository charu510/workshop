<?php

$_SESSION['login'] = false;


if(($_SESSION['login']))
{

}
else {
  echo "Logged out!";
  header("Location: login.php");
}
?>
