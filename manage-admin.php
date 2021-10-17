<?php include('constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resturant Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu">
        <div class="wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="bill-generation.php">Generate Bill</a></li>
            <li><a href="manage-food.php">Menu Items</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
        </div>
    </div>

    <!-- Main Content starts -->
    <div class="main-content">
      <div class="wrapper">
        <h1>Manage Admin</h1>



        <?php
          if(isset($_SESSION['add']))
          {
            echo $_SESSION['add']; //displaying addition message
            unset($_SESSION['add']); //removing addition message
          }
          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete']; //displaying deletion message
            unset($_SESSION['delete']); //removing deletion message
          }
          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update']; //displaying updation message
            unset($_SESSION['update']); //removing updation message
          }
          if(isset($_SESSION['user_not_found']))
          {
            echo $_SESSION['user_not_found']; //displaying user not found message from password updation
            unset($_SESSION['user_not_found']); //removing user not found message from password updation
          }
          if(isset($_SESSION['pwd_not_match']))
          {
            echo $_SESSION['pwd_not_match']; //displaying password match error message from password updation
            unset($_SESSION['pwd_not_match']); //removing password match error message from password updation
          }
          if(isset($_SESSION['pwd_updated']))
          {
            echo $_SESSION['pwd_updated']; //displaying password updation message
            unset($_SESSION['pwd_updated']); //removing password updation message
          }
        ?>

        <br> <br>

        <!-- Button to add Admins -->
          <a href="add-admin.php" class="">Add Admin</a>
          <br><br>

          <table class="tbl-full">
            <tr>
              <th>S. No.</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Actions</th>
            </tr>


            <?php
            //Query to get all Admins
            $sql = "SELECT * FROM admin_table";
            //Execute query
            $res = mysqli_query($conn, $sql);

            //check whether the query is executed

            if($res == true)
            {
              //Count rows to check whether we have data in database
              $count = mysqli_num_rows($res); //gets num of rows

              //Create a variable and assign value so that there is no break in id
              $sno = 1;

              //check num of $rows

              if($count > 0) {
                //data exists
                while($rows = mysqli_fetch_assoc($res)) {
                  //while loop gets all data from database
                  //will run as long as we have data

                  //get individual data
                  $id = $rows['id'];
                  $full_name = $rows['full_name'];
                  $username = $rows['username'];
                  $phone = $rows['phone'];
                  $address = $rows['address'];

                  //display values in table
                  ?>

                  <tr>
                    <td> <?php echo $sno++; ?> </td>
                    <td> <?php echo $full_name; ?> </td>
                    <td> <?php echo $username; ?> </td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $address; ?></td>
                    <td>
                      <a href="<?php echo SITE_URL; ?>update-password.php?id=<?php echo $id; ?>">Change Password</a>
                      <a href="<?php echo SITE_URL; ?>update-admin.php?id=<?php echo $id; ?>" class="">Update Admin</a>
                      <a href="<?php echo SITE_URL; ?>delete-admin.php?id=<?php echo $id; ?>" class="">Delete Admin</a>
                    </td>
                  </tr>

                  <?php
                }
              }
              else
              {
                //no data
                echo "No admins in database. Add admins to display them here.";
              }
            }

            ?>




          </table>

      </div>

    </div>
    <!-- Main Content ends -->

    <?php include('partials/footer.php'); ?>



</html>
