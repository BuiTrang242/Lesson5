<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm số lần xuất hiện các phần tử</title>
</head>

<body>

    <form method="post">
        <label for="numbers">Nhập các số (cách nhau bởi dấu phẩy):</label><br>
        <textarea name="numbers" id="numbers" rows="5" cols="50"></textarea><br><br>
        <label for="value">Nhập số cần đếm</label><br>
        <input type="number" name="value" id="value" rows="5" cols="50"></input><br><br>
        <button type="submit">Đếm số lần xuat hien</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputNumbers = $_POST['numbers'];
        $value = $_POST['value'];
        $number = array_map('trim', explode(',', $inputNumbers));
        function countNumber($number, $value)
        {
            $count = 0;
            foreach ($number as $item) {
                if ($item == $value) {
                    $count++;
                }
            }
            return $count;
        }
        $count = countNumber($number, $value);
        echo "Dãy số vừa nhập là: <br>";
        foreach ($number as $item) {
            echo $item . " ";
        }
        echo "<br>";
        echo "Kết quả: <br>";

        echo "So lan xuat hien cua $value la: $count";

    }



    ?>
</body>

</html>