<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Element
    {
        public $value;
        public $next = null;
    }

    class Queue
    {
        private $font = null;
        private $back = null;

        /**
         * Kiểm tra xem hàng đợi có rỗng không
         * @return boolean
         */
        public function isEmpty()
        {
            return $this->font == null;
        }

        /**
         * Thêm phần tử vào cuối hàng đợi
         * @param $value
         */
        public function enqueue($value)
        {
            $oldBack = $this->back;
            $this->back = new Element();
            $this->back->value = $value;
            if ($this->isEmpty()) {
                $this->font = $this->back;
            } else {
                $oldBack->next = $this->back;
            }
        }

        /**
         * Loại bỏ phần tử ở đầu hàng đợi
         * @return mixed
         */
        public function dequeue()
        {
            if ($this->isEmpty()) {
                return null;
            }
            $removedValue = $this->font->value;
            $this->font = $this->font->next;
            if ($this->font == null) {
                $this->back = null; // Đặt lại $back nếu hàng đợi trống
            }
            return $removedValue;
        }
    }

    //thêm
    $queue = new Queue();
    $queue->enqueue("book 1");
    $queue->enqueue("book 2");
    $queue->enqueue("book 3");

    echo "Dequeued: " . $queue->dequeue() . "<br>";
    echo "Dequeued: " . $queue->dequeue() . "<br>" . "<br>"; // In ra phần tử tiếp theo
    // In ra phần tử cuối cùng
    echo "Is queue empty? " . ($queue->isEmpty() ? "Yes" : "No") . "<br>";

    $queue->enqueue("book 4");
    $queue->enqueue("book 5");

    echo "Dequeued: " . $queue->dequeue() . "<br>";
    echo "Dequeued: " . $queue->dequeue() . "<br>";
    echo "Dequeued: " . $queue->dequeue() . "<br>" . "<br>"; // In ra phần tử tiếp theo
    
    echo "Is queue empty? " . ($queue->isEmpty() ? "Yes" : "No") . "<br>";

    // while (!$queue->isEmpty()) {
    //     echo $queue->dequeue() . "\n";
    // }
    ?>
</body>

</html>