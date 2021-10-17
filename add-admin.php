<?php include('partials/menu.php'); ?>


    <!-- Main content starts -->
    <div class="main-content">
      <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <form class="" action="" method="post">

          <table class="tbl-30">
            <tr>
              <td>Full Name</td>
              <td> <input type="text" name="full_name" placeholder="Enter name"> </td>
            </tr>
            <tr>
              <td>Username</td>
              <td> <input type="text" name="username" placeholder="Enter username"> </td>
            </tr>
            <tr>
              <td>Password</td>
              <td> <input type="password" name="password" placeholder="Enter password"> </td>
            </tr>
            <tr>
              <td>Phone</td>
              <td> <input type="text" name="phone" placeholder="Enter phone no."> </td>
            </tr>
            <tr>
              <td>Address</td>
              <td> <input type="text" name="address" placeholder="Enter address"> </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="submit" value="Add Admin">
              </td>
            </tr>
          </table>

        </form>
      </div>
    </div>

    <!-- Main content ends -->



<?php
  //Process the value from the form and save it in the database

  //Check whether the submit button is clicked or not

  if(isset($_POST['submit']))
  {
    //Button clicked

    //get data from form

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password is encrypted with md5
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    //SQL Query to save data in the databases

    $sql = "INSERT INTO admin_table SET
      full_name = '$full_name',
      username = '$username',
      password = '$password',
      phone = '$phone',
      address = '$address'
    ";

    //execute query
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //check whether the data is inserted or not and display appropriate message
    if($res == true)
    {
      //Data inserted
      // echo "Success, data inserted";
      //Session variable to display message
      $_SESSION['add'] = "Admin added successfully";
      //redirect to Manage Admin page
      header("location:".SITE_URL."manage-admin.php");

    }
    else
    {
      //data not inserted
      // echo "Failed to insert data";
      $_SESSION['add'] = "Failed to add Admin";
      //redirect to Add Admin page
      header("location:".SITE_URL."add-admin.php");
    }


  }


?>

<?php include('partials/footer.php'); ?>
