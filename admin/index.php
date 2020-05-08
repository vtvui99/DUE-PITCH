<?php
    include "../session.php";
    //Ket noi csdl
    $conn = mysqli_connect('localhost', 'root', '', 'datapitch');

    // Kiem tra va Xoa
    if (isset($_GET['id_delete'])){
        $sql = "DELETE FROM " . $_GET['tab'] . " WHERE  id = " . $_GET['id_delete'];
        mysqli_query($conn, $sql);
    }

    // Show ban ghi
    function show($tab){
        $conn = mysqli_connect('localhost', 'root', '', 'datapitch');
        if (isset($_GET['find'])){
            $id = addslashes($_GET['Sid']);
            $dat = addslashes($_GET['date']);
            if ($id != '' && $dat == '') {
                $sql = "SELECT `id`, `name`, `student_id`, `phone1`, `phone2`, `date`, `timeslot`, `registdate`, `purpose`
                    FROM `$tab` WHERE `student_id` = '$id'";
            }
            elseif ($id == '' && $dat != '') {
                $date1 = date_create($_GET['date']);
                $date = date_format($date1, "Y-m-d");
                $sql = "SELECT `id`, `name`, `student_id`, `phone1`, `phone2`, `date`, `timeslot`, `purpose`, `registdate`
                    FROM `$tab` WHERE date = '$date'";
            }
            elseif ($id != '' && $dat != '') {
                $date1 = date_create($_GET['date']);
                $date = date_format($date1, "Y-m-d");
                $sql = "SELECT `id`, `name`, `student_id`, `phone1`, `phone2`, `date`, `timeslot`, `purpose`, `registdate`
                    FROM `$tab` WHERE (`student_id` = '$id') and (`date` = '$date')";
            }
            else{
                $sql = "SELECT `id`, `name`, `student_id`, `phone1`, `phone2`, `date`, `timeslot`, `purpose`, `registdate`
                        FROM `$tab`";
//                echo '<script type="text/javascript">';
//                echo 'alert("Điền thông tin tìm kiếm!")';
//                echo '</script>';
            }
        }
        else{
            $sql = "SELECT `id`, `name`, `student_id`, `phone1`, `phone2`, `date`, `timeslot`, `purpose`, `registdate`
                    FROM `$tab`";
        }

        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0){
            $stt = 1;
            echo "<table>";
            echo "<caption><h3>DANH SÁCH LỊCH ĐÃ ĐĂNG KÝ</h3></caption>";
            echo"<tr>";
            echo "<th class='tbID'>STT</th>";
            echo "<th class='tbID'>ID</th>";
            echo "<th class='tbName'>Họ và tên</th>";
            echo "<th class='tbSid'>Mã sinh viên</th>";
            echo "<th class='tbPhone'>Số điện thoại</th>";
            echo "<th class='tbPhone'>Số điện thoại 2</th>";
            echo "<th class='tbDate'>Ngày</th>";
            echo "<th class='tbTime'>Giờ</th>";
            echo "<th class='tbPurpose'>Mục đích</th>";
            echo "<th class='tbRegist'>Thời gian đăng kí</th>";
            echo "<th class='tbRepair'>Điều chỉnh</th>";
            echo "</tr>";

            //in du lieu
            while ($row = mysqli_fetch_assoc($query)){
                echo "<tr>";
                echo "<td class='tbID'>" . $stt . "</td>";
                echo "<td class='tbID'>" . $row['id'] . "</td>";
                echo "<td class='tbName'>" . $row['name'] . "</td>";
                echo "<td class='tbSid'>" . $row['student_id'] . "</td>";
                echo "<td class='tbPhone'>" . $row['phone1'] . "</td>";
                echo "<td class='tbPhone'>" . $row['phone2'] . "</td>";
                $d = date_create($row['date']);
                echo "<td class='tbDate'>" . date_format($d, "d-m-Y") . "</td>";
                echo "<td class='tbTime'>" . $row['timeslot'] . "</td>";
                $purpose = $row['purpose'];
                if ($purpose == 0){
                    echo "<td class='tbPurpose'> Tổ chức giải </td>";
                }
                else{
                    echo "<td class='tbPurpose'> Đá giao hữu</td>";
                }
                $d2 = date_create($row['registdate']);
                echo "<td class='tbRegist'>" . date_format($d2, "d-m-Y") . "</td>";
                echo "<td class='tbRepair'><a href='index.php?id_delete=" . $row['id'] . "&tab= " . $tab ."'>Xóa</a></td>";
                echo "</tr>";
                $stt++;
            }
            echo "</table>";
        }
    }
    function check()
    {
        if (isset($_GET['find']) && $_GET['Sid'] == '' && $_GET['date'] == '') {
//            header("refresh:0;url=index.php");
//            echo '<script type="text/javascript">';
//            echo 'alert("Điền thông tin tìm kiếm!")';
//            echo '</script>';
            echo "Điền thông tin tìm kiếm.";
        }
        else{
            echo "";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lịch đặt sân</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center; font-size: 25px;">QUẢN LÝ LỊCH ĐẶT SÂN BÓNG</h1>
        <div class="form-find">
            <form method="get" name="form-find">
                <table>
                    <caption>Thông tin tìm kiếm</caption>
                    <tr>
                        <th><label for="Sid">Mã sinh viên: </label></th>
                        <td><input type="text" name="Sid" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <th><label for="date">Ngày: </label></th>
                        <td><input type="text" name="date" autocomplete="off"></td>
                    </tr>
                    <tr><td colspan="2" style="text-align: center; color: red"><?php check() ?></td></tr>
                    <tr><th colspan="2" style="text-align: center"><button type="submit" name="find">Tìm kiếm</button></th></tr>
                </table>
            </form>
        </div>
        <div class="tab2">
            <button id="tab1" class="tablinks pitches active" onclick="openTab(event, 'tab-1')">Sân 1</button>
            <button id="tab2" class="tablinks pitches" onclick="openTab(event, 'tab-2')">Sân 2</button>
        </div>
    </div>
    <div class="container" style="width: 90%; margin: 0 auto;">
        <div id="tab-1" class="tabcontent">
            <?php
                show('book1');
            ?>
        </div>
        <div id="tab-2" class="tabcontent">
            <?php
                show('book2');
            ?>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="../js/scripts.js"></script>
</body>
</html>
