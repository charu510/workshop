<?php include('partials/menu.php') ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>

        <br><br>


        <?php
            if(isset($_GET["id"]))
            {
                $id=$_GET["id"];
                $sql = "SELECT * FROM menu WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                if($res == true)
                {
                  //check whether data is available or not
                  $count = mysqli_num_rows($res);

                  if($count == 1)
                  {
                    //Get the details
                    $row = mysqli_fetch_assoc($res);

                    $title = $row['title'];
                    $price = $row['price'];
                  }
                  else
                  {
                    //Redirect to Manage Admin page
                    header('location:'.SITE_URL.'manage-admin.php');
                  }
                }
            }
        ?>

        <form action="update-food.php" method="post">
            <table width = 35%>
                <tr>
                    <td>Title :</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>

                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button name="submit" class="btn">Update</button>
                    </td>
                </tr>

            </table>
        </form>

        <?php
            if(isset($_POST["submit"]))
            {
                //getting details form form
                $id = $_POST["id"];
                $title = $_POST['title'];
                $price = $_POST['price'];

                //updating food in table
                $sql2 = "UPDATE menu SET
                title='$title',
                price=$price
                WHERE id=$id
                ";

                //execute
                $res = mysqli_query($conn, $sql2);

                if($res == true)
                {
                    $_SESSION["update"]="Food details Updated Successfully";
                    header("location: manage-food.php");
                }
                else
                {
                    $_SESSION["update"]="Food details Failed to Updated" . $con->error;
                    header("location: manage-food.php");
                }

            }
        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>
