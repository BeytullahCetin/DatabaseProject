<?php 
try {
    $conn2=new PDO("mysql:host=localhost;dbname=apartmentmanagerdbdemo1;charset=utf8",'root','');
	//echo "Veritabanı bağlantısı başarılı";
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>