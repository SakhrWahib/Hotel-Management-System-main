<?php
session_start();
include '../config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./css/roombook.css">
    <title>BlueBird - Admin</title>
</head>

<body>
    <!-- guestdetailpanel -->

    <div id="guestdetailpanel">
    <form action="" method="POST" class="guestdetailpanelform">
        <div class="head">
            <h3>الحجز</h3>
            <i class="fa-solid fa-circle-xmark" onclick="adduserclose()"></i>
        </div>
        <div class="middle"  style="direction: rtl;">
            <div class="guestinfo">
                <h4>معلومات الضيف</h4>
                <input type="text" name="Name" placeholder="أدخل الاسم الكامل" required>
                <input type="email" name="Email" placeholder="أدخل البريد الإلكتروني" required>

                <?php
                $countries = array(
                    "أفغانستان", "ألبانيا", "الجزائر", "ساموا الأمريكية", "أندورا", "أنغولا", "أنغيلا", "أنتاركتيكا",
                    "أنتيغوا وباربودا", "الأرجنتين", "أرمينيا", "أروبا", "أستراليا", "النمسا", "أذربيجان", "جزر البهاما",
                    "البحرين", "بنغلاديش", "بربادوس", "بيلاروس", "بلجيكا", "بليز", "بنين", "برمودا", "بوتان",
                    "بوليفيا", "البوسنة والهرسك", "بوتسوانا", "جزيرة بوفيت", "البرازيل", "إقليم المحيط البريطاني الهندي",
                    "بروناي دار السلام", "بلغاريا", "بوركينا فاسو", "بوروندي", "كمبوديا", "الكاميرون", "كندا",
                    "الرأس الأخضر", "جزر كايمان", "جمهورية أفريقيا الوسطى", "تشاد", "تشيلي", "الصين", "جزيرة الكريسماس",
                    "جزر كوكوس (كيلينغ)", "كولومبيا", "جزر القمر", "الكونغو", "جمهورية الكونغو الديمقراطية", "جزر كوك",
                    "كوستاريكا", "ساحل العاج", "كرواتيا", "كوبا", "قبرص", "جمهورية التشيك", "الدنمارك", "جيبوتي",
                    "دومينيكا", "جمهورية الدومينيكان", "تيمور الشرقية", "الإكوادور", "مصر", "السلفادور", "غينيا الاستوائية",
                    "إريتريا", "إستونيا", "إثيوبيا", "جزر فوكلاند", "جزر فارو", "فيجي", "فنلندا", "فرنسا", "جيانا الفرنسية",
                    "بولينيزيا الفرنسية", "الأقاليم الجنوبية الفرنسية", "الغابون", "غامبيا", "جورجيا", "ألمانيا", "غانا",
                    "جبل طارق", "اليونان", "جرينلاند", "غرينادا", "جوادلوب", "غوام", "غواتيمالا", "غينيا", "غينيا بيساو",
                    "غيانا", "هايتي", "جزر هيرد وماكدونالد", "الفاتيكان", "هندوراس", "هونغ كونغ", "هنغاريا", "آيسلندا",
                    "الهند", "إندونيسيا", "إيران", "العراق", "أيرلندا", "إسرائيل", "إيطاليا", "جامايكا", "اليابان",
                    "الأردن", "كازاخستان", "كينيا", "كيريباس", "كوريا الشمالية", "كوريا الجنوبية", "الكويت", "قيرغيزستان",
                    "لاوس", "لاتفيا", "لبنان", "ليسوتو", "ليبيريا", "ليبيا", "ليختنشتاين", "ليتوانيا", "لوكسمبورغ",
                    "ماكاو", "مقدونيا", "مدغشقر", "ملاوي", "ماليزيا", "جزر المالديف", "مالي", "مالطا", "جزر مارشال",
                    "مارتينيك", "موريتانيا", "موريشيوس", "مايوت", "المكسيك", "ولايات ميكرونيسيا الموحدة", "مولدوفا",
                    "موناكو", "منغوليا", "مونتسيرات", "المغرب", "موزمبيق", "ميانمار", "ناميبيا", "ناورو", "نيبال",
                    "هولندا", "جزر الأنتيل الهولندية", "كاليدونيا الجديدة", "نيوزيلندا", "نيكاراغوا", "النيجر", "نيجيريا",
                    "نيوي", "جزيرة نورفولك", "جزر ماريانا الشمالية", "النرويج", "عمان", "باكستان", "بالاو", "بنما",
                    "بابوا غينيا الجديدة", "باراغواي", "بيرو", "الفلبين", "بيتكيرن", "بولندا", "البرتغال", "بورتو ريكو",
                    "قطر", "لا ريونيون", "رومانيا", "الاتحاد الروسي", "رواندا", "سانت كيتس ونيفيس", "سانت لوسيا",
                    "سانت فنسنت وجزر غرينادين", "ساموا", "سان مارينو", "ساو تومي وبرينسيب", "المملكة العربية السعودية",
                    "السنغال", "سيشيل", "سيراليون", "سنغافورة", "سلوفاكيا", "سلوفينيا", "جزر سليمان", "الصومال",
                    "جنوب أفريقيا", "جورجيا الجنوبية وجزر ساندويتش الجنوبية", "إسبانيا", "سريلانكا", "سانت هيلانة",
                    "سان بيير وميكلون", "السودان", "سورينام", "سفالبارد ويان ماين", "سوازيلاند", "السويد", "سويسرا",
                    "سوريا", "تايوان", "طاجيكستان", "تنزانيا", "تايلاند", "توغو", "توكيلاو", "تونغا", "ترينيداد وتوباغو",
                    "تونس", "تركيا", "تركمانستان", "جزر تركس وكايكوس", "توفالو", "أوغندا", "أوكرانيا", "الإمارات العربية المتحدة",
                    "المملكة المتحدة", "الولايات المتحدة", "جزر الولايات المتحدة البعيدة الصغرى", "أوروغواي", "أوزبكستان",
                    "فانواتو", "فنزويلا", "فيتنام", "جزر العذراء البريطانية", "جزر العذراء الأمريكية", "واليس وفوتونا",
                    "الصحراء الغربية", "اليمن", "يوغوسلافيا", "زامبيا", "زيمبابوي"
                );
                ?>

                <select name="Country" class="selectinput" required>
                    <option value selected>اختر بلدك</option>
                    <?php
                    foreach ($countries as $key => $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                    ?>
                </select>
                <input type="text" name="Phone" placeholder="أدخل رقم الهاتف" required>
            </div>

            <div class="line" style="direction: rtl;"></div>

            <div class="reservationinfo"  style="direction: rtl;">
                <h4>معلومات الحجز</h4>
                <select name="RoomType" class="selectinput">
                    <option value selected>نوع الغرفة</option>
                    <option value="Superior Room">غرفة فاخرة</option>
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
                </select>
                <select name="Meal" class="selectinput">
                    <option value selected>الوجبة</option>
                    <option value="Room only">الغرفة فقط</option>
                    <option value="Breakfast">الإفطار</option>
                    <option value="Half Board">نصف إقامة</option>
                    <option value="Full Board">إقامة كاملة</option>
                </select>
                <div class="datesection">
                    <span>
                        <label for="cin">تسجيل الوصول</label>
                        <input name="cin" type="date">
                    </span>
                    <span>
                        <
                        <label for="cout">تسجيل المغادرة</label>
                        <input name="cout" type="date">
                    </span>
                </div>
            </div>
        </div>
        <div class="footer">
            <button class="btn btn-success" name="guestdetailsubmit">إرسال</button>
        </div>
    </form>

    <?php       
    // <!-- room availablity start-->

    $rsql ="SELECT * FROM room";
    $rre= mysqli_query($conn,$rsql);
    $r = 0;
    $sc = 0;
    $gh = 0;
    $sr = 0;
    $dr = 0;

    while($rrow=mysqli_fetch_array($rre))
    {
        $r = $r + 1;
        $s = $rrow['type'];
        if($s=="غرفة فاخرة")
        {
            $sc = $sc+ 1;
        }
        if($s=="بيت ضيافة")
        {
            $gh = $gh + 1;
        }
        if($s=="غرفة فردية" )
        {
            $sr = $sr + 1;
        }
        if($s=="غرفة ديلوكس" )
        {
            $dr = $dr + 1;
        }
    }

    $csql ="SELECT * FROM payment";
    $cre= mysqli_query($conn,$csql);
    $cr =0 ;
    $csc =0;
    $cgh = 0;
    $csr = 0;
    $cdr = 0;
    while($crow=mysqli_fetch_array($cre))
    {
        $cr = $cr + 1;
        $cs = $crow['RoomType'];
                    
        if($cs=="غرفة فاخرة")
        {
            $csc = $csc + 1;
        }
                    
        if($cs=="بيت ضيافة" )
        {
            $cgh = $cgh + 1;
        }
        if($cs=="غرفة فردية")
        {
            $csr = $csr + 1;
        }
        if($cs=="غرفة ديلوكس")
        {
            $cdr = $cdr + 1;
        }
    }
    // room availablity
    // Superior Room =>
    $f1 =$sc - $csc;
    if($f1 <=0 )
    {	
        $f1 = "لا توجد";
    }
    // Guest House =>
    $f2 =  $gh -$cgh;
    if($f2 <=0 )
    {	
        $f2 = "لا توجد";
    }
    // Single Room =>
    $f3 =$sr - $csr;
    if($f3 <=0 )
    {	
        $f3 = "لا توجد";
    }
    // Deluxe Room =>
    $f4 =$dr - $cdr; 
    if($f4 <=0 )
    {	
        $f4 = "لا توجد";
    }
    //total available room =>
    $f5 =$r-$cr; 
    if($f5 <=0 )
    {
        $f5 = "لا توجد";
    }
    ?>
    <!-- room availablity end-->

    <!-- ==== room book php ====-->
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

            if($Name == "" || $Email == "" || $Country == ""){
                echo "<script>swal({
                    title: 'يرجى ملء التفاصيل الصحيحة',
                    icon: 'error',
                });
                </script>";
            }
            else{
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

    
    <!-- ================================================= -->
    <div class="searchsection">
        <input type="text" name="search_bar" id="search_bar" placeholder="search..." onkeyup="searchFun()">
        <button class="adduser" id="adduser" onclick="adduseropen()"><i class="fa-solid fa-bookmark"></i> اضافة</button>
        <form action="./exportdata.php" method="post">
            <button class="exportexcel" id="exportexcel" name="exportexcel" type="submit"><i class="fa-solid fa-file-arrow-down"></i></button>
        </form>
    </div>

    <div class="roombooktable" class="table-responsive-xl">
        <?php
            $roombooktablesql = "SELECT * FROM roombook";
            $roombookresult = mysqli_query($conn, $roombooktablesql);
            $nums = mysqli_num_rows($roombookresult);
            ?>
            <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th scope="col">معرّف</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">البريد الإلكتروني</th>
                        <th scope="col">البلد</th>
                        <th scope="col">الهاتف</th>
                        <th scope="col">نوع الغرفة</th>
                        <th scope="col">نوع السرير</th>
                        <th scope="col">عدد الغرف</th>
                        <th scope="col">الوجبة</th>
                        <th scope="col">تسجيل الدخول</th>
                        <th scope="col">تسجيل الخروج</th>
                        <th scope="col">عدد الأيام</th>
                        <th scope="col">الحالة</th>
                        <th scope="col" class="action">الإجراء</th>
                        <!-- <th>حذف</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($res = mysqli_fetch_array($roombookresult)) {
                ?>
                    <tr>
                        <td><?php echo $res['id'] ?></td>
                        <td><?php echo $res['Name'] ?></td>
                        <td><?php echo $res['Email'] ?></td>
                        <td><?php echo $res['Country'] ?></td>
                        <td><?php echo $res['Phone'] ?></td>
                        <td><?php echo $res['RoomType'] ?></td>
                        <td><?php echo $res['Bed'] ?></td>
                        <td><?php echo $res['NoofRoom'] ?></td>
                        <td><?php echo $res['Meal'] ?></td>
                        <td><?php echo $res['cin'] ?></td>
                        <td><?php echo $res['cout'] ?></td>
                        <td><?php echo $res['nodays'] ?></td>
                        <td><?php echo $res['stat'] ?></td>
                        <td class="action">
                            <?php
                                if ($res['stat'] == "Confirm") {
                                    echo " ";
                                } else {
                                    echo "<a href='roomconfirm.php?id=" . $res['id'] . "'><button class='btn btn-success'>تأكيد</button></a>";
                                }
                            ?>
                            <a href="roombookedit.php?id=<?php echo $res['id'] ?>"><button class="btn btn-primary">تحرير</button></a>
                            <a href="roombookdelete.php?id=<?php echo $res['id'] ?>"><button class='btn btn-danger'>حذف</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            
    </div>
</body>
<script src="./javascript/roombook.js"></script>



</html>
