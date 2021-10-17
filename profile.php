<?php include('partials/menu.php'); ?>



    <!-- Main Content starts -->
    <div class="main-content">
      <div class="wrapper">
        <h1>Your Profile</h1>



        <?php
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


          <table class="tbl-30">


            <?php
            //Query to get all Admins
            $userId = (int) $_SESSION['userId'];
            $sql = "SELECT * FROM admin_table WHERE id = $userId";
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
                    <th class="text-center">Full Name</th>
                    <td> <?php echo $full_name; ?> </td>
                  </tr>

                  <tr>
                    <th class="text-center">Username</th>
                    <td> <?php echo $username; ?> </td>
                  </tr>

                  <tr>
                    <th class="text-center">Phone</th>
                    <td> <?php echo $phone; ?> </td>
                  </tr>

                  <tr>
                    <th class="text-center">Phone</th>
                    <td> <?php echo $address; ?> </td>
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

          <br><br>

              <a href="<?php echo SITE_URL; ?>update-password.php?id=<?php echo $id; ?>">Change Password</a>


      </div>

    </div>
    <!-- Main Content ends -->

    <?php include('partials/footer.php'); ?>



</html>
