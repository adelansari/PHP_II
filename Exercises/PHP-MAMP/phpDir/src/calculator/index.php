<?php
/* 
Write PHP code to make a simple calculator with user interface. The calculator should have at least the following features:
- addition
- subtraction
- multiplication
- division

Requirements/Specs:
- Feel free to use any CSS styling, HTML syntax
- Use Object oriented approach (e.g. using class, constructor)

*/

class Calculator
{
    public $num1;
    public $num2;
    public $operation;

    public function __construct($num1, $num2, $operation)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operation = $operation;
    }

    public function calculate()
    {
        return match ($this->operation) {
            'add' => $this->num1 + $this->num2,
            'subtract' => $this->num1 - $this->num2,
            'multiply' => $this->num1 * $this->num2,
            'divide' => $this->num2 == 0 ? 'Error: Division by zero' : $this->num1 / $this->num2,
            default => 'Invalid operation',
        };
    }
}

$result = '';
if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    $calculator = new Calculator($num1, $num2, $operation);
    $result = $calculator->calculate();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="post">
        <h1><i class="material-icons">calculate</i> PHP Calculator</h1>
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" id="num1" required>
        <label for="num2">Number 2:</label>
        <input type="number" name="num2" id="num2" required>
        <label for="operation">Operation:</label>
        <select name="operation" id="operation">
            <option value="add">&plus;</option>
            <option value="subtract">&minus;</option>
            <option value="multiply">&times;</option>
            <option value="divide">&divide;</option>
        </select>
        <input type="submit" value="Calculate">
        <?php if ($result) : ?>
            <h2>Result: <?php echo $result; ?></h2>
        <?php endif; ?>
    </form>
</body>

</html>