<?php include('partials/menu.php'); ?>


    <div class="main-content">
      <div class="wrapper">
        <h1>Change Password</h1>
        <br>

        <?php
          if(isset($_GET['id']))
          {
            $id = $_GET['id'];
          }
        ?>

        <form class="" action="" method="post">

          <table class="tbl-30">
            <tr>
              <td>Current Password: </td>
              <td>
                <input type="password" name="current_password" placeholder="Enter current password here">
              </td>
            </tr>
            <tr>
              <td>New Password: </td>
              <td>
                <input type="password" name="new_password" placeholder="Enter new passowrd here">
              </td>
            </tr>
            <tr>
              <td>Confirm Password: </td>
              <td>
                <input type="password" name="confirm_password" placeholder="Confirm new password">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password">
              </td>
            </tr>
          </table>

        </form>

      </div>

    </div>

  </body>
</html>

<?php

  //Check whether submit button is clicked
  if(isset($_POST['submit']))
  {
    //Get data from form
    $id = $_POST['id'];
    $currentPassword = md5($_POST['current_password']);
    $newPassword = md5($_POST['new_password']);
    $confirmPassword = md5($_POST['confirm_password']);

    //Check whether the user exists in the database
    $sql = "SELECT * FROM admin_table WHERE id = $id AND password = '$currentPassword'";
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
      //Check whether data is available or not
      $count = mysqli_num_rows($res);

      if($count == 1)
      {
        //user exists

        //Check whether the new and confirmed passwords match
        if($newPassword == $confirmPassword)
        {
          //update password
          //create SQL query
          $sql2 = "UPDATE admin_table SET
            password = '$newPassword'
            WHERE id = $id
          ";

          $res = mysqli_query($conn, $sql2);

          //check whether the query executed or not

          if($res==true)
          {
            //query executed, the password is changed
            $_SESSION['pwd_updated'] = "Password updated successfully";
            header("location:".SITE_URL."manage-admin.php");
          }
          else
          {
            //query failed, password not changed
            $_SESSION['pwd_updated'] = "Failed to update password";
            header("location:".SITE_URL."manage-admin.php");
          }

        }
        else
        {
          //passwords did not match
          $_SESSION['pwd_not_match'] = "New and confirmed passwords did not match";
          header("location:".SITE_URL."manage-admin.php");
        }

      }
      else
      {
        //user does not exist, redirect to Manage Admin page
        $_SESSION['user_not_found'] = "Error: User not found or password entered incorrectly";
        header("location:".SITE_URL."manage-admin.php");
      }
    }



  }

?>

<?php include('partials/footer.php'); ?>
