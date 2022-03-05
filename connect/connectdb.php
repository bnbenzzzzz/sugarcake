<?php
    // ดาต้าเบสทดลอง
    $server = "localhost";
    $user = "root";
    $pw = "";
    $db_name = "sugarcake";

    // ดาต้าเบสจริง
    // $server = "localhost";
    // $user = "sugarcak_project";
    // $pw = "CIgGAmmA2C";
    // $db_name = "sugarcak_project";
    $conn = new mysqli($server,$user,$pw,$db_name);

    if($conn->connect_errno){
        printf("ไม่สามารถเชื่อมต่อฐานข้อมูลได้",$conn->connect_error);
        exit();
    }

    mysqli_set_charset($conn, 'utf8');
?>