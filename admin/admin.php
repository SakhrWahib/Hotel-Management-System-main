<?php

include '../config.php';
session_start();

// إعادة توجيه الصفحة
$usermail = "";
$usermail = $_SESSION['usermail'];
if ($usermail == true) {

} else {
    header("location: http://localhost/hotelmanage_system/index.php");
}

?>

<!DOCTYPE html>
<html lang="ar">

<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <!-- شريط التحميل -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="../css/flash.css">
    <!-- أيقونات fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>BlueBird - لوحة الإدارة</title>
</head>

<body  >
    <!-- عرض الجوال -->
    <div id="mobileview" style="direction: rtl;">
        <h5>لوحة الإدارة لا تظهر في عرض الجوال</h4>
    </div>
  
    <!-- شريط التنقل -->
    <nav class="uppernav"">
        <div class="logo">
            <img class="bluebirdlogo" src="../image/bluebirdlogo.png" alt="logo">
            <p>Saudi Arabia Hotel</p>
        </div>
        <div class="logout">
            <a href="../logout.php"><button class="btn btn-primary">تسجيل الخروج</button></a>
        </div>
    </nav>
    <nav class="sidenav" >
        <ul>
            <li class="pagebtn active"><img src="../image/icon/dashboard.png">&nbsp&nbsp&nbsp لوحة التحكم</li>
            <li class="pagebtn"><img src="../image/icon/bed.png">&nbsp&nbsp&nbsp حجز الغرف</li>
            <li class="pagebtn"><img src="../image/icon/wallet.png">&nbsp&nbsp&nbsp الدفع</li>
            <li class="pagebtn"><img src="../image/icon/bedroom.png">&nbsp&nbsp&nbsp الغرف</li>
            <li class="pagebtn"><img src="../image/icon/staff.png">&nbsp&nbsp&nbsp الموظفين</li>
        </ul>
    </nav>

    <!-- القسم الرئيسي -->
    <div class="mainscreen" style="direction: rtl;">
        <iframe class="frames frame1 active" src="./dashboard.php" frameborder="0"></iframe>
        <iframe class="frames frame2" src="./roombook.php" frameborder="0"></iframe>
        <iframe class="frames frame3" src="./payment.php" frameborder="0"></iframe>
        <iframe class="frames frame4" src="./room.php" frameborder="0"></iframe>
        <iframe class="frames frame4" src="./staff.php" frameborder="0"></iframe>
    </div>
</body>

<script src="./javascript/script.js"></script>

</html>
