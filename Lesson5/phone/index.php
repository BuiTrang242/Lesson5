<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân loại số điện thoại</title>
</head>

<body>
    <h1>Phân loại số điện thoại</h1>
    <form method="post">
        <label for="phoneNumbers">Nhập danh sách số điện thoại (cách nhau bởi dấu phẩy):</label><br>
        <textarea name="phoneNumbers" id="phoneNumbers" rows="5" cols="50"></textarea><br><br>
        <button type="submit">Phân loại</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $input = $_POST['phoneNumbers'];


        $phoneNumbers = explode(',', $input);


        $phoneNumbers = array_map('trim', $phoneNumbers);


        $viettel = [];
        $mobifone = [];
        $vinaphone = [];


        $viettelPrefixes = ['086', '096', '097', '098', '032', '033', '034', '035', '036', '037', '038', '039'];
        $mobifonePrefixes = ['089', '090', '093', '070', '079', '077', '076', '078'];
        $vinaphonePrefixes = ['088', '091', '094', '083', '084', '085', '081', '082'];


        foreach ($phoneNumbers as $number) {
            $prefix = substr($number, 0, 3);

            if (in_array($prefix, $viettelPrefixes)) {
                $viettel[] = $number;
            } elseif (in_array($prefix, $mobifonePrefixes)) {
                $mobifone[] = $number;
            } elseif (in_array($prefix, $vinaphonePrefixes)) {
                $vinaphone[] = $number;
            }
        }


        echo "<h2>Kết quả phân loại:</h2>";
        echo "<h3>Viettel:</h3>";
        echo !empty($viettel) ? implode(', ', $viettel) : "Không có số nào.";

        echo "<h3>Mobifone:</h3>";
        echo !empty($mobifone) ? implode(', ', $mobifone) : "Không có số nào.";

        echo "<h3>Vinaphone:</h3>";
        echo !empty($vinaphone) ? implode(', ', $vinaphone) : "Không có số nào.";
    }
    ?>
</body>

</html>