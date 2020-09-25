<?php

include "../database/dbProduct.php";
$id=$_GET["id"];
$query="DELETE FROM product WHERE id= ?";

$statement = $con->prepare($query);
$statement->bind_param("i",$id);
$statement->execute();
$result = $statement->store_result();
$statement->close();

$result=$connection->query($query);

if($result)
{
    header("Location:../home.php");
}


?>