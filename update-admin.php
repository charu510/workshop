<?php include('partials/menu.php'); ?>



    <div class="main-content">
      <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>


        <?php
        //Getting details of current admin
        //Get the id of the selected admin
        $id = $_GET['id'];

        //Create SQL query to get the details of the current admin
        $sql = "SELECT * FROM admin_table WHERE id = $id";

        //Execute query
        $res = mysqli_query($conn, $sql);

        //Check whether query is executed
        if($res == true)
        {
          //check whether data is available or not
          $count = mysqli_num_rows($res);

          if($count == 1)
          {
            //Get the details
            $row = mysqli_fetch_assoc($res);

            $full_name = $row['full_name'];
            $username = $row['username'];
            $phone = $row['phone'];
            $address = $row['address'];
          }
          else
          {
            //Redirect to Manage Admin page
            header('location:'.SITE_URL.'manage-admin.php');
          }
        }

        ?>


        <form class="" action="" method="post">

          <table class="tbl-30">
            <tr>
              <td>Full Name: </td>
              <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
            </tr>

            <tr>
              <td>Username: </td>
              <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
            </tr>

            <tr>
              <td>Phone: </td>
              <td><input type="text" name="phone" value="<?php echo $phone; ?>"></td>
            </tr>

            <tr>
              <td>Address: </td>
              <td><input type="text" name="address" value="<?php echo $address; ?>"></td>
            </tr>

            <tr>
              <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Admin">
              </td>
            </tr>
          </table>

        </form>
      </div>
    </div>



  </body>
</html>

<?php
  //check whether submit button is clicked
  if(isset($_POST['submit']))
  {

    //Button clicked

    //Get data from form
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    //create SQL query
    $sql = "UPDATE admin_table SET
     full_name = '$full_name',
     username = '$username',
     phone = '$phone',
     address = '$address'
     WHERE id = $id;
    ";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //check whether query executed successfully
    if($res==true)
    {
      //query executed
      $_SESSION['update'] = "Admin updated successfully";
      header("location:".SITE_URL."manage-admin.php");
    }
    else
    {
      //failed to update admin
      $_SESSION['update'] = "Failed to update Admin";
      header("location:".SITE_URL."manage-admin.php");
    }

  }

?>

<?php include('partials/footer.php'); ?>
