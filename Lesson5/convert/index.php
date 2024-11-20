<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi thập phân sang nhị phân</title>
    <style>
        button {
            cursor: pointer;
        }
    </style>
</head>

<?php
// Lớp Stack
class Stack
{
    protected $stack;
    protected $limit;

    public function __construct($limit = 10)
    {
        $this->stack = array();
        $this->limit = $limit;
    }

    // Thêm phần tử vào Stack
    public function push($item)
    {
        if (count($this->stack) < $this->limit) {
            array_unshift($this->stack, $item); // Thêm phần tử vào đầu Stack
        } else {
            throw new Exception("Stack is full");
        }
    }

    // Lấy phần tử khỏi Stack
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new Exception("Stack is empty");
        } else {
            return array_shift($this->stack); // Lấy phần tử đầu ra khỏi Stack
        }
    }

    // Kiểm tra Stack có rỗng không
    public function isEmpty()
    {
        return empty($this->stack);
    }

    // Lấy phần tử đầu tiên của Stack
    public function top()
    {
        return current($this->stack);
    }
}

// Hàm chuyển đổi từ hệ thập phân sang nhị phân
function decimalToBinary($decimal)
{
    $stack = new Stack();

    // Chuyển đổi thập phân sang nhị phân
    while ($decimal > 0) {
        $remainder = $decimal % 2;  // Lấy phần dư
        $stack->push($remainder);   // Đưa phần dư vào Stack
        $decimal = intdiv($decimal, 2);  // Chia lấy phần nguyên
    }

    // Đọc các phần tử trong Stack và ghép lại thành chuỗi nhị phân
    $binary = "";
    while (!$stack->isEmpty()) {
        $binary .= $stack->pop();
    }

    return $binary;
}

// Xử lý khi người dùng gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $decimalNumber = $_POST['decimal']; // Lấy giá trị số thập phân từ form
    if (is_numeric($decimalNumber) && $decimalNumber >= 0) {
        $binaryNumber = decimalToBinary($decimalNumber);
    } else {
        $errorMessage = "Vui lòng nhập một số thập phân hợp lệ.";
    }
}
?>

<body>
    <h1>Chuyển đổi số thập phân sang nhị phân</h1>

    <!-- Form nhập liệu -->
    <form method="POST">
        <label for="decimal">Nhập số thập phân:</label>
        <input type="text" id="decimal" name="decimal" required>
        <button type="submit">Chuyển đổi</button>
    </form>

    <!-- Kết quả -->
    <?php if (isset($binaryNumber)): ?>
        <p>Số <?php echo $decimalNumber; ?> trong hệ nhị phân là: <?php echo $binaryNumber; ?></p>
    <?php elseif (isset($errorMessage)): ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
</body>

</html>