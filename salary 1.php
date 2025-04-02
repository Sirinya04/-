<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าเดือนและปี พ.ศ. จากผู้ใช้
    $month = (int)$_POST['month'];       // ตัวอย่าง: เดือนกุมภาพันธ์
    $yearBuddhist = (int)$_POST['year']; // ตัวอย่าง: ปี พ.ศ. 2567

    // แปลงปี พ.ศ. เป็นปี ค.ศ.
    $yearGregorian = $yearBuddhist - 543;

    // หาจำนวนวันในเดือนที่ระบุ
    if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
        $daysInMonth = 31;
    } elseif ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
        $daysInMonth = 30;
    } elseif ($month == 2) {
        // ตรวจสอบปีอธิกสุรทินสำหรับเดือนกุมภาพันธ์
        if (($yearGregorian % 4 == 0 && $yearGregorian % 100 != 0) || ($yearGregorian % 400 == 0)) {
            $daysInMonth = 29; // ปีอธิกสุรทิน
        } else {
            $daysInMonth = 28;
        }
    }

    // คำนวณวันที่จ่ายเงินเดือน (3 วันทำการก่อนสิ้นเดือน)
    $payDate = $daysInMonth - 3;

    // แสดงผลลัพธ์
    echo "วันที่จ่ายเงินเดือน: " . $payDate . "/" . $month . "/" . $yearBuddhist;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>คำนวณวันที่จ่ายเงินเดือน</title>
</head>
<body>
    <h1>คำนวณวันที่จ่ายเงินเดือน</h1>
    <form method="POST">
        <label for="month">เดือน (1-12):</label>
        <input type="number" id="month" name="month" min="1" max="12" required><br><br>

        <label for="year">ปี พ.ศ.:</label>
        <input type="number" id="year" name="year" min="2560" required><br><br>

        <button type="submit">คำนวณ</button>
    </form>
</body>
</html>
