<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt cấu trúc Stack</title>
</head>
<?php
class ReadingList
{
    protected $stack;
    protected $limit;
    public function __construct($limit = 10)
    {
        $this->stack = array();
        $this->limit = $limit;
    }
    public function push($item)
    {
        if (count($this->stack) < $this->limit) {
            array_unshift($this->stack, $item);
        } else {
            throw new Exception("Stack is full");
        }
    }
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new Exception("Stack is empty");
        } else {
            return array_shift($this->stack);
        }
    }
    public function isEmpty()
    {
        return empty($this->stack);
    }
    public function top()
    {
        return current($this->stack);
    }
}

?>
<?php
$book = new ReadingList();
$book->push("Book 1");
$book->push("Book 2");
$book->push("Book 3");
$book->push("Book 4");
$book->push("Book 5");



echo $book->pop() . "<br>";
echo $book->pop() . "<br>";
echo $book->pop() . "<br>" . "<br>";

$book->push("Book 6");
$book->push("Book 7");

echo $book->isEmpty() ? "Stack is empty" : "Stack is not empty";
echo "<br>";

echo $book->pop() . "<br>";
echo $book->pop() . "<br>";
echo $book->pop() . "<br>";
echo $book->pop() . "<br>" . "<br>";

echo $book->isEmpty() ? "Stack is empty" : "Stack is not empty";
echo "<br>";


?>

<body>

</body>

</html>