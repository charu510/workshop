<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food Item</h1>

        <br><br>




    <form action="" method="post">
        <table width = 35%>
            <tr>
                <td>Title :</td>
                <td>
                    <input type="text" name="title" placeholder="Title of Food">
                </td>
            </tr>
            <tr>
                <td>Price :</td>
                <td>
                    <input type="number" name="price" placeholder="Price of Food">
                </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="submit" value="Add food item">
              </td>
            </tr>

        </table>
    </form>
        <!-- </form> -->

        <?php
        if(isset($_POST['submit']))
        {

            // its connection by database is already done whose code is in constants.php
            // so that we dont have to connect to database again and again

            $title = $_POST['title'];
            $price = $_POST['price'];

            //sql query
            $sql = "INSERT INTO menu SET
              title = '$title',
              price = '$price'
            ";

            //execute the query
            // $con is a connection statement which is being used to connect the databse
            // value is already in it in constants.php file

            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            if($res == true)
            {
                //data inserted successfully
                $_SESSION["add"]="Food item added Succesfully. ";
                header("Location: manage-food.php");
            }
            else{
                //failed to insert data
                $_SESSION["add"]="Failed to add food item.";

                header("Location: manage-food.php");
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>
