<?php

  //include constants
  include('constants.php');

  //Get ID of admin to be deleted
  $id = $_GET['id'];
  //Create SQL Query to delete admin
  $sql = "DELETE FROM admin_table WHERE id = $id";

  //execute query
  $res = mysqli_query($conn,$sql);

  //check whether executed successfully

  if($res == true)
  {
    //query executed and admin deleted
    //Create a session variable to display message on admin page
    $_SESSION['delete'] = "Admin deleted successfully.";
    header("location:".SITE_URL."manage-admin.php");

  }
  else
  {
    //failed to delete admin
    $SESSION['delete'] = "Failed to delete Admin. Try again.";
  }

  //Redirect to Manage Admin w/ appropriate message
?>
