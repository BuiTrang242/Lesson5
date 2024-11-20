<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra dấu ngoặc trong biểu thức</title>
</head>

<?php
// Hàm kiểm tra dấu ngoặc
function checkBrackets($expression)
{
    // Tạo Stack để lưu trữ dấu ngoặc
    $stack = new SplStack();

    // Duyệt qua từng ký tự trong biểu thức
    for ($i = 0; $i < strlen($expression); $i++) {
        $sym = $expression[$i]; // Ký tự hiện tại

        // Nếu là dấu ngoặc trái, đưa vào Stack
        if ($sym == '(') {
            $stack->push($sym);
        }

        // Nếu là dấu ngoặc phải, kiểm tra
        if ($sym == ')') {
            // Nếu Stack rỗng, không có dấu ngoặc trái tương ứng
            if ($stack->isEmpty()) {
                return false;
            }
            // Lấy dấu ngoặc trái ra khỏi Stack
            $left = $stack->pop();
            // Nếu dấu ngoặc không khớp, trả về false
            if ($left != '(') {
                return false;
            }
        }
    }

    // Kiểm tra nếu Stack còn dấu ngoặc trái chưa được đóng
    return $stack->isEmpty();
}

// Xử lý form nhập liệu và hiển thị kết quả
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $expression = $_POST['expression']; // Lấy biểu thức từ form
    $result = checkBrackets($expression) ? "Biểu thức hợp lệ" : "Biểu thức không hợp lệ";
}
?>

<body>
    <h1>Kiểm tra dấu ngoặc trong biểu thức</h1>

    <!-- Form nhập liệu -->
    <form method="POST">
        <label for="expression">Nhập biểu thức:</label>
        <input type="text" id="expression" name="expression" required>
        <button type="submit">Kiểm tra</button>
    </form>

    <!-- Hiển thị kết quả -->
    <?php if (isset($result)): ?>
        <p><?php echo $result; ?></p>
    <?php endif; ?>
</body>

</html>