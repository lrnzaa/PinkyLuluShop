<?php

include "../database/dbpembayaran.php";

$id=$_GET["id"];
$query="DELETE FROM pembayaran WHERE id= ? ";

$statement = $con->prepare($query);
$statement->bind_param("i",$id);
$statement->execute();
$result = $statement->store_result();
$statement->close();

// $result=$con->query($query);

if($result)
{
    header("Location:../pendingpayment.php");
}

?>