<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Food Items</h1>

        <br>

        <br>

        <?php
            if(isset($_SESSION["add"]))
            {
                echo $_SESSION["add"];
                unset($_SESSION["add"]);
            }
            if(isset($_SESSION["delete"]))
            {
                echo $_SESSION["delete"];
                unset($_SESSION["delete"]);
            }
            if(isset($_SESSION["update"]))
            {
                echo $_SESSION["update"];
                unset($_SESSION["update"]);
            }
        ?>

        <br>
        <!-- Button To add Food items -->

        <a href="add-food-item.php" class="btn">Add Food Item</a>

        <table width=70%>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>

            <?php
                //creating sql query to get all food items from menu table database hotel
                $sql = "SELECT * FROM menu";

                $res = mysqli_query($conn, $sql);

                if($res == true)
                {
                  $count = mysqli_num_rows($res);

                  $sno=1;

                  if($count>0)
                  {
                      //getting values from menu table
                      while($row= mysqli_fetch_assoc($res))
                      {
                          $id = $row["id"];
                          $title = $row["title"];
                          $price = $row["price"];

                          ?>

                          <tr>
                              <td><?php echo $sno++; ?></td>
                              <td><?php echo $title; ?></td>
                              <td><?php echo $price; ?></td>
                              <td>
                                  <a href="update-food.php?id=<?php echo $id; ?>" class=btn>Update</a>
                                  <a href="delete-food.php?id=<?php echo $id; ?>" class=btn>Delete</a>
                              </td>
                          </tr>

                          <?php
                      }
                  }
                  else
                  {
                      echo "<tr> <td colspan='5'> Food Items Not Added yet. </td></tr>";
                  }
              $con->close();


            }
            ?>



        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>
