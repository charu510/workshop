<?php include('constants.php'); ?>
<?php
    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];

        $sql = "DELETE FROM menu WHERE id=$id";

        $result =mysqli_query($conn, $sql);

        if($result==true)
        {
            $_SESSION["delete"]="Food item deleted Succesfully. ";
            header("location: manage-food.php");
        }
        else
        {
            $_SESSION["delete"]="Food item not deleted. ";
            header("location: manage-food.php");
        }

        
    }
?>
