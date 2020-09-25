<?php

include "../database/dbpembayaran.php";
include "../database/dbProduct.php";


$id=$_GET["id"];

$query1 = "SELECT * FROM pembayaran WHERE id= ? ";
$statement4 = $con->prepare($query1);
$statement4->bind_param("i",$id);
$statement4->execute();
$res = $statement4->get_result();
$statement4->close();

// $res=$con->query($query1);
$row=$res->fetch_assoc();


$namaP = $row["nama_produk"];

$queryS = "SELECT * FROM product WHERE nama= ? ";

$statement3 = $connection->prepare($queryS);
$statement3->bind_param("s",$namaP);
$statement3->execute();
$ress = $statement3->get_result();
$statement3->close();

// $ress=$connection->query($queryS);
$row1=$ress->fetch_assoc();

$jml = $row1["stock"] - $row["jumlah"];

$queryU = "UPDATE product SET stock = '$jml' WHERE nama= ? ";

$statement2 = $connection->prepare($queryU);
$statement2->bind_param("s",$namaP);
$statement2->execute();
$hasil = $statement2->get_result();
$statement2->close();

// $hasil = $connection->query($queryU);

$query="DELETE FROM pembayaran WHERE id= ?  ";

$statement1 = $con->prepare($query);
$statement1->bind_param("i",$id);
$statement1->execute();
$result = $statement1->store_result();
$statement1->close();

// $result=$con->query($query);

if($result)
{
    header("Location:../confirmation.php");
}

?>