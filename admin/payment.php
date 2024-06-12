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
    <title>BlueBird - Admin</title>
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<!-- css for table and search bar -->
	<link rel="stylesheet" href="css/roombook.css">

</head>
<body  style="direction: rtl;">
    <div class="searchsection">
        <input type="text" name="search_bar" id="search_bar" placeholder="بحث..." onkeyup="searchFun()">
    </div>

    <div class="roombooktable" class="table-responsive-xl">
        <?php
            $paymanttablesql = "SELECT * FROM payment";
            $paymantresult = mysqli_query($conn, $paymanttablesql);

            $nums = mysqli_num_rows($paymantresult);
        ?>
        <table class="table table-bordered" id="table-data"  style="direction: rtl;">
            <thead  style="direction: rtl;">
                <tr  style="direction: rtl;">
                 
                
                    <th scope="col">المعرف</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">نوع الغرفة</th>
                    <th scope="col">نوع السرير</th>
                    <th scope="col">تاريخ الدخول</th>
                    <th scope="col">تاريخ الخروج</th>
                    <th scope="col">عدد الأيام</th>
                    <th scope="col">عدد الغرف</th>
                    <th scope="col">نوع الوجبة</th>
                    <th scope="col">إيجار الغرفة</th>
                    <th scope="col">إيجار السرير</th>
                    <th scope="col">الوجبات</th>
                    <th scope="col">إجمالي الفاتورة</th>
                    <th scope="col">الإجراء</th>
                </tr>
            </thead>

            <tbody>
            <?php
            while ($res = mysqli_fetch_array($paymantresult)) {
            ?>
                <tr>
                    <td><?php echo $res['id'] ?></td>
                    <td><?php echo $res['Name'] ?></td>
                    <td><?php echo $res['RoomType'] ?></td>
                    <td><?php echo $res['Bed'] ?></td>
                    <td><?php echo $res['cin'] ?></td>
                    <td><?php echo $res['cout'] ?></td>
                    <td><?php echo $res['noofdays'] ?></td>
                    <td><?php echo $res['NoofRoom'] ?></td>
                    <td><?php echo $res['meal'] ?></td>
                    <td><?php echo $res['roomtotal'] ?></td>
                    <td><?php echo $res['bedtotal'] ?></td>
                    <td><?php echo $res['mealtotal'] ?></td>
                    <td><?php echo $res['finaltotal'] ?></td>
                    <td class="action">
                        <a href="invoiceprint.php?id=<?php echo $res['id']?>"><button class="btn btn-primary"><i class="fa-solid fa-print"></i>طباعة</button></a>
                        <a href="paymantdelete.php?id=<?php echo $res['id']?>"><button class="btn btn-danger">حذف</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>


<script>
    //search bar logic using js
    const searchFun = () =>{
        let filter = document.getElementById('search_bar').value.toUpperCase();

        let myTable = document.getElementById("table-data");

        let tr = myTable.getElementsByTagName('tr');

        for(var i = 0; i< tr.length;i++){
            let td = tr[i].getElementsByTagName('td')[1];

            if(td){
                let textvalue = td.textContent || td.innerHTML;

                if(textvalue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }else{
                    tr[i].style.display = "none";
                }
            }
        }

    }

</script>

</html>