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
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/room.css">
</head>
<body>
    <div class="addroomsection">
        <form action="" method="POST">
            <label for="troom">نوع الغرفة :</label>
            <select name="troom" class="form-control">
                <option value selected></option>
                <option value="Superior Room">غرفة فاخرة</option>
                <option value="Deluxe Room">غرفة ديلوكس</option>
                <option value="Guest House">بيت ضيافة</option>
                <option value="Single Room">غرفة فردية</option>
            </select>

            <label for="bed">نوع السرير :</label>
            <select name="bed" class="form-control">
                <option value selected></option>
                <option value="Single">فردي</option>
                <option value="Double">مزدوج</option>
                <option value="Triple">ثلاثي</option>
                <option value="Quad">رباعي</option>
                <option value="None">بدون</option>
            </select>

            <button type="submit" class="btn btn-success" name="addroom">إضافة غرفة</button>
        </form>

        <?php
        if (isset($_POST['addroom'])) {
            $typeofroom = $_POST['troom'];
            $typeofbed = $_POST['bed'];

            $sql = "INSERT INTO room(type, bedding) VALUES ('$typeofroom', '$typeofbed')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: room.php");
            }
        }
        ?>
    </div>

    <div class="room">
        <?php
        $sql = "SELECT * FROM room";
        $re = mysqli_query($conn, $sql);
        ?>
        <?php
        while ($row = mysqli_fetch_array($re)) {
            $id = $row['type'];
            if ($id == "Superior Room") {
                echo "<div class='roombox roomboxsuperior'>
                        <div class='text-center no-border'>
                            <i class='fa-solid fa-bed fa-4x mb-2'></i>
                            <h3>" . $row['type'] . "</h3>
                            <div class='mb-1'>" . $row['bedding'] . "</div>
                            <a href='roomdelete.php?id=" . $row['id'] . "'><button class='btn btn-danger'>حذف</button></a>
                        </div>
                    </div>";
            } else if ($id == "Deluxe Room") {
                echo "<div class='roombox roomboxdelux'>
                        <div class='text-center no-border'>
                            <i class='fa-solid fa-bed fa-4x mb-2'></i>
                            <h3>" . $row['type'] . "</h3>
                            <div class='mb-1'>" . $row['bedding'] . "</div>
                            <a href='roomdelete.php?id=" . $row['id'] . "'><button class='btn btn-danger'>حذف</button></a>
                        </div>
                    </div>";
            } else if ($id == "Guest House") {
                echo "<div class='roombox roomboxguest'>
                        <div class='text-center no-border'>
                            <i class='fa-solid fa-bed fa-4x mb-2'></i>
                            <h3>" . $row['type'] . "</h3>
                            <div class='mb-1'>" . $row['bedding'] . "</div>
                            <a href='roomdelete.php?id=" . $row['id'] . "'><button class='btn btn-danger'>حذف</button></a>
                        </div>
                    </div>";
            } else if ($id == "Single Room") {
                echo "<div class='roombox roomboxsingle'>
                        <div class='text-center no-border'>
                            <i class='fa-solid fa-bed fa-4x mb-2'></i>
                            <h3>" . $row['type'] . "</h3>
                            <div class='mb-1'>" . $row['bedding'] . "</div>
                            <a href='roomdelete.php?id=" . $row['id'] . "'><button class='btn btn-danger'>حذف</button></a>
                        </div>
                    </div>";
            }
        }
        ?>
    </div>
</body>


</html>