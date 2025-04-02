<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monthNumber = (int)$_POST["month"];

    $months = [
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December"
    ];

    if ($monthNumber >= 1 && $monthNumber <= 12) {
        echo "<p>Month: " . $months[$monthNumber] . "</p>";
    } else {
        echo "<p>Invalid number! Please enter a number between 1 and 12.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Month Converter</title>
</head>
<body>
    <form method="post">
        <label for="month">Enter a number (1-12):</label>
        <button type="submit">Submit</button>
        <input type="number" id="month" name="month" min="1" max="12" required>
    </form>
</body>
</html>