<?php

include "../database/dbpembayaran.php";
$id=$_GET["id"];

$msg="DECLINED";

$query = "UPDATE pembayaran SET stat = '$msg' WHERE id = ? ";

$statement = $con->prepare($query);
$statement->bind_param("i",$id);
$statement->execute();
$res = $statement->store_result();
$statement->close();

// $res = $con->query($query);

if($res)
{
    header("Location:../confirmation.php");
}

?>