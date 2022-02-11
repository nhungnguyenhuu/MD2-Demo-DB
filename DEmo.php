<?php
$dsn = "mysql:host=localhost;dbname=classicmodels;charset=utf8";
$username = "root";
$password = "root";
try {
    $conn = new PDO($dsn, $username, $password);
    echo "ket noi thanh cong";
}catch (PDOException $e){
    die($e->getMessage());
}
//$sql = "select * from customers where customerName like 'a%'";
//$stmt = $conn->query($sql);
$sql = "select * from customers where customerName like :word";
$stmt = $conn->prepare($sql);
$word = "a%";

$stmt->bindParam("word", $word);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($result);

$sql = "insert into payments value(?,?,?,?)";
//$customerNumber = 103;
//$checkNumber = "TH12";
//$paymentDate = "2022-12-12";
//$amount = 12345;
$stmt = $conn->prepare($sql);
//$stmt->bindParam(1, $customerNumber);
//$stmt->bindParam(2, $checkNumber);
//$stmt->bindParam(3, $paymentDate);
//$stmt->bindParam(4, $amount);
$data = array(103, "TH13", "2002-11-12", 1234);

$stmt->execute($data);

?>
