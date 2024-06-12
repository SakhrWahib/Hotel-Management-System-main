<?php

include 'config.php';
session_start();

// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if($usermail == true){

}else{
  header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <title>Hotel blue bird</title>
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./admin/css/roombook.css">
    <style>
      #guestdetailpanel{
        display: none;
      }
      #guestdetailpanel .middle{
        height: 450px;
      }
    </style>
</head>

<body  >
<nav style="direction: rtl;" >
    
    <ul>
    <a href="./logout.php"><button class="btn btn-danger">تسجيل الخروج</button></a>

        <li style="direction: rtl;"><a href="#firstsection">الرئيسية</a></li>
        <li><a href="#secondsection">الغرف</a></li>
        <li><a href="#thirdsection">المرافق</a></li>
        <li><a href="#contactus">اتصل بنا</a></li>
    </ul>
    <div class="logo">
    <p>Saudi Arabia Hotel</p>
        <img class="bluebirdlogo" src="./image/bluebirdlogo.png" alt="الشعار">
       
    </div>
</nav>


  <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="carousel-image" src="./image/hotel1.jpg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/hotel2.jpg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/hotel3.jpg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/hotel4.jpg">
        </div>

        <div class="welcomeline">
          <h1 class="welcometag">Welcome to heaven on earth</h1>
        </div>

      <!-- bookbox -->
      <div id="guestdetailpanel"  style="direction: rtl;">
    <form action="" method="POST" class="guestdetailpanelform"  style="direction: rtl;">
        <div class="head">
            <h3>الحجز</h3>
            <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
        </div>
        <div class="middle">
            <div class="guestinfo">
                <h4>معلومات الضيف</h4>
                <input type="text" name="Name" placeholder="أدخل الاسم الكامل">
                <input type="email" name="Email" placeholder="أدخل البريد الإلكتروني">

                <?php
                $countries = array("أفغانستان", "ألبانيا", "الجزائر", "ساموا الأمريكية", "أندورا", "أنغولا", "أنغيلا", "أنتاركتيكا", "أنتيغوا وبربودا", "الأرجنتين", "أرمينيا", "أروبا", "أستراليا", "النمسا", "أذربيجان", "جزر البهاما", "البحرين", "بنغلاديش", "بربادوس", "روسيا البيضاء", "بلجيكا", "بليز", "بنين", "برمودا", "بوتان", "بوليفيا", "البوسنة والهرسك", "بوتسوانا", "جزيرة بوفيت", "البرازيل", "إقليم المحيط البريطاني الهندي", "بروناي دار السلام", "بلغاريا", "بوركينا فاسو", "بوروندي", "كمبوديا", "الكاميرون", "كندا", "الرأس الأخضر", "جزر كايمان", "جمهورية أفريقيا الوسطى", "تشاد", "تشيلي", "الصين", "جزيرة الكريسماس", "جزر كوكوس (كيلينغ)", "كولومبيا", "جزر القمر", "الكونغو", "جمهورية الكونغو الديمقراطية", "جزر كوك", "كوستاريكا", "كوت ديفوار", "كرواتيا", "كوبا", "قبرص", "جمهورية التشيك", "الدنمارك", "جيبوتي", "دومينيكا", "جمهورية الدومينيكان", "تيمور الشرقية", "الإكوادور", "مصر", "السلفادور", "غينيا الاستوائية", "إريتريا", "إستونيا", "إثيوبيا", "جزر فوكلاند (مالفيناس)", "جزر فارو", "فيجي", "فنلندا", "فرنسا", "فرنسا المتروبولية", "غيانا الفرنسية", "بولينيزيا الفرنسية", "الأقاليم الجنوبية الفرنسية", "الغابون", "غامبيا", "جورجيا", "ألمانيا", "غانا", "جبل طارق", "اليونان", "غرينلاند", "غرينادا", "غوادلوب", "غوام", "غواتيمالا", "غينيا", "غينيا-بيساو", "غيانا", "هايتي", "جزيرة هيرد وجزر ماكدونالد", "الكرسي الرسولي (دولة الفاتيكان)", "هندوراس", "هونغ كونغ", "هنغاريا", "أيسلندا", "الهند", "إندونيسيا", "إيران (الجمهورية الإسلامية)", "العراق", "أيرلندا", "إسرائيل", "إيطاليا", "جامايكا", "اليابان", "الأردن", "كازاخستان", "كينيا", "كيريباس", "كوريا الشمالية", "كوريا الجنوبية", "الكويت", "قيرغيزستان", "لاوس", "لاتفيا", "لبنان", "ليسوتو", "ليبيريا", "ليبيا", "ليختنشتاين", "ليتوانيا", "لوكسمبورغ", "ماكاو", "مقدونيا", "مدغشقر", "ملاوي", "ماليزيا", "جزر المالديف", "مالي", "مالطا", "جزر مارشال", "مارتينيك", "موريتانيا", "موريشيوس", "مايوت", "المكسيك", "ميكرونيزيا", "مولدوفا", "موناكو", "منغوليا", "مونتسيرات", "المغرب", "موزمبيق", "ميانمار", "ناميبيا", "ناورو", "نيبال", "هولندا", "جزر الأنتيل الهولندية", "كاليدونيا الجديدة", "نيوزيلندا", "نيكاراغوا", "النيجر", "نيجيريا", "نيوي", "جزيرة نورفولك", "جزر ماريانا الشمالية", "النرويج", "عمان", "باكستان", "بالاو", "بنما", "بابوا غينيا الجديدة", "باراغواي", "بيرو", "الفلبين", "بيتكيرن", "بولندا", "البرتغال", "بورتوريكو", "قطر", "ريونيون", "رومانيا", "روسيا", "رواندا", "سانت كيتس ونيفيس", "سانت لوسيا", "سانت فنسنت وجزر غرينادين", "ساموا", "سان مارينو", "ساو تومي وبرينسيب", "السعودية", "السنغال", "سيشل", "سيراليون", "سنغافورة", "سلوفاكيا", "سلوفينيا", "جزر سليمان", "الصومال", "جنوب أفريقيا", "جورجيا الجنوبية وجزر ساندويتش الجنوبية", "إسبانيا", "سريلانكا", "سانت هيلينا", "سانت بيير وميكلون", "السودان", "سورينام", "سفالبارد وجان ماين", "سوازيلاند", "السويد", "سويسرا", "سوريا", "تايوان", "طاجيكستان", "تنزانيا", "تايلاند", "توغو", "توكيلاو", "تونغا", "ترينيداد وتوباغو", "تونس", "تركيا", "تركمانستان", "جزر تركس وكايكوس", "توفالو", "أوغندا", "أوكرانيا", "الإمارات العربية المتحدة", "المملكة المتحدة", "الولايات المتحدة", "جزر الولايات المتحدة البعيدة الصغرى", "أوروغواي", "أوزبكستان", "فانواتو", "فنزويلا", "فيتنام", "جزر فيرجن البريطانية", "جزر فيرجن الأمريكية", "واليس وفوتونا", "الصحراء الغربية", "اليمن", "يوغوسلافيا", "زامبيا", "زيمبابوي");
                ?>

                <select name="Country" class="selectinput">
                    <option value selected>اختر بلدك</option>
                    <?php
                        foreach($countries as $key => $value):
                        echo '<option value="'.$value.'">'.$value.'</option>';
                        endforeach;
                    ?>
                </select>
                <input type="text" name="Phone" placeholder="أدخل رقم الهاتف">
            </div>

            <div class="line"></div>

            <div class="reservationinfo">
                <h4>معلومات الحجز</h4>
                <select name="RoomType" class="selectinput">
                    <option value selected>نوع الغرفة</option>
                    <option value="Superior Room">غرفة سوبيريور</option>
                    <option value="Deluxe Room">غرفة ديلوكس</option>
                    <option value="Guest House">بيت ضيافة</option>
                    <option value="Single Room">غرفة فردية</option>
                </select>
                <select name="Bed" class="selectinput">
                    <option value selected>نوع السرير</option>
                    <option value="Single">فردي</option>
                    <option value="Double">مزدوج</option>
                    <option value="Triple">ثلاثي</option>
                    <option value="Quad">رباعي</option>
                    <option value="None">بدون</option>
                </select>
                <select name="NoofRoom" class="selectinput">
                    <option value selected>عدد الغرف</option>
                    <option value="1">1</option>
                    <!-- <option value="1">2</option>
                    <option value="1">3</option> -->
                </select>
                <select name="Meal" class="selectinput">
                    <option value selected>الوجبة</option>
                    <option value="Room only">غرفة فقط</option>
                    <option value="Breakfast">إفطار</option>
                    <option value="Half Board">نصف إقامة</option>
                    <option value="Full Board">إقامة كاملة</option>
                </select>
                <div class="datesection">
                    <span>
                        <label for="cin">تسجيل الدخول</label>
                        <
                        <input name="cin" type="date">
                    </span>
                    <span>
                        <label for="cout">تسجيل الخروج</label>
                        <input name="cout" type="date">
                    </span>
                </div>
            </div>
        </div>
        <div class="footer">
            <button class="btn btn-success" name="guestdetailsubmit">إرسال</button>
        </div>
    </form>

    <!-- ==== حجز الغرفة PHP ====-->
    <?php       
        if (isset($_POST['guestdetailsubmit'])) {
            $Name = $_POST['Name'];
            $Email = $_POST['Email'];
            $Country = $_POST['Country'];
            $Phone = $_POST['Phone'];
            $RoomType = $_POST['RoomType'];
            $Bed = $_POST['Bed'];
            $NoofRoom = $_POST['NoofRoom'];
            $Meal = $_POST['Meal'];
            $cin = $_POST['cin'];
            $cout = $_POST['cout'];

            if ($Name == "" || $Email == "" || $Country == "") {
                echo "<script>swal({
                    title: 'يرجى ملء التفاصيل بشكل صحيح',
                    icon: 'error',
                });
                </script>";
            } else {
                $sta = "غير مؤكد";
                $sql = "INSERT INTO roombook(Name,Email,Country,Phone,RoomType,Bed,NoofRoom,Meal,cin,cout,stat,nodays) VALUES ('$Name','$Email','$Country','$Phone','$RoomType','$Bed','$NoofRoom','$Meal','$cin','$cout','$sta',datediff('$cout','$cin'))";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<script>swal({
                        title: 'تم الحجز بنجاح',
                        icon: 'success',
                    });
                    </script>";
                } else {
                    echo "<script>swal({
                        title: 'حدث خطأ ما',
                        icon: 'error',
                    });
                    </script>";
                }
            }
        }
    ?>
</div>
</div>
</section>

    
<section id="secondsection">
    <img src="./image/homeanimatebg.svg">
    <div class="ourroom">
        <h1 class="head">≼ احجز الغرفة الخاصة بك ≽</h1>
        <div class="roomselect">
            <div class="roombox">
                <div class="hotelphoto h1"></div>
                <div class="roomdata">
                    <h2>غرفة سوبريور</h2>
                    <div class="services">
                        <i class="fa-solid fa-wifi"></i>
                        <i class="fa-solid fa-burger"></i>
                        <i class="fa-solid fa-spa"></i>
                        <i class="fa-solid fa-dumbbell"></i>
                        <i class="fa-solid fa-person-swimming"></i>
                    </div>
                    <button class="btn btn-primary bookbtn" onclick="openbookbox()">احجز</button>
                </div>
            </div>
            <div class="roombox">
                <div class="hotelphoto h2"></div>
                <div class="roomdata">
                    <h2>غرفة ديلوكس</h2>
                    <div class="services">
                        <i class="fa-solid fa-wifi"></i>
                        <i class="fa-solid fa-burger"></i>
                        <i class="fa-solid fa-spa"></i>
                        <i class="fa-solid fa-dumbbell"></i>
                    </div>
                    <button class="btn btn-primary bookbtn" onclick="openbookbox()">احجز</button>
                </div>
            </div>
            <div class="roombox">
                <div class="hotelphoto h3"></div>
                <div class="roomdata">
                    <h2>غرفة الضيوف</h2>
                    <div class="services">
                        <i class="fa-solid fa-wifi"></i>
                        <i class="fa-solid fa-burger"></i>
                        <i class="fa-solid fa-spa"></i>
                    </div>
                    <button class="btn btn-primary bookbtn" onclick="openbookbox()">احجز</button>
                </div>
            </div>
            <div class="roombox">
                <div class="hotelphoto h4"></div>
                <div class="roomdata">
                    <h2>غرفة مفردة</h2>
                    <div class="services">
                        <i class="fa-solid fa-wifi"></i>
                        <i class="fa-solid fa-burger"></i>
                    </div>
                    <button class="btn btn-primary bookbtn" onclick="openbookbox()">احجز</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="thirdsection">
    <h1 class="head">≼ المرافق ≽</h1>
    <div class="facility">
        <div class="box">
            <h2>حمام سباحة</h2>
        </div>
        <div class="box">
            <h2>سبا</h2>
        </div>
        <div class="box">
            <h2>مطاعم 24*7</h2>
        </div>
        <div class="box">
            <h2>صالة رياضية 24*7</h2>
        </div>
        <div class="box">
            <h2>خدمة الهليكوبتر</h2>
        </div>
    </div>
</section>


  <section id="contactus">
    <div class="social">
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-solid fa-envelope"></i>
    </div>
    <div class="createdby">
      <h5>Saudi Arabia Hotel</h5>
    </div>
  </section>
</body>

<script>

    var bookbox = document.getElementById("guestdetailpanel");

    openbookbox = () =>{
      bookbox.style.display = "flex";
    }
    closebox = () =>{
      bookbox.style.display = "none";
    }
</script>
</html>