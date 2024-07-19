<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: rgba(222, 215, 201, 0.299);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator {
            display: grid;
            grid-template-columns: repeat(4, 2fr);
            gap: 10px;
        }
        .calculator input[type="text"] {
            grid-column: span 4;
            padding: 10px;
            font-size: 18px;
        }
        .calculator button {
            padding: 20px;
            text-align: center;
            background-color: #ddd;
            cursor: pointer;
            font-size: 18px;
            border: none;
        }
        .calculator .num_clear {
            background-color: rgb(247, 196, 101);
        }
        .calculator .equal {
            background-color: rgb(94, 229, 94);
        }
        .calculator .back:hover 
        
        {
            background-color: rgb(247, 196, 101);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculator</h1>
        <form class="calculator" method="post">
            <input type="text" class="calcu" name="inputValue" value="<?php echo isset($_POST['inputValue']) ? $_POST['inputValue'] : ''; ?>" readonly />
            <button type="submit" name="action" value="clear" class="num_clear">clear</button>
            <button type="submit" name="action" value="back" class="back">back</button>
            <button type="submit" name="action" value="/" >/</button>
            <button type="submit" name="action" value="%" >%</button>
            <button type="submit" name="action" value="7">7</button>
            <button type="submit" name="action" value="8">8</button>
            <button type="submit" name="action" value="9">9</button>
            <button type="submit" name="action" value="*">*</button>
            <button type="submit" name="action" value="4">4</button>
            <button type="submit" name="action" value="5">5</button>
            <button type="submit" name="action" value="6">6</button>
            <button type="submit" name="action" value="-">-</button>
            <button type="submit" name="action" value="1">1</button>
            <button type="submit" name="action" value="2">2</button>
            <button type="submit" name="action" value="3">3</button>
            <button type="submit" name="action" value="+">+</button>
            <button type="submit" name="action" value="0">0</button>
            <button type="submit" name="action" value="00">00</button>
            <button type="submit" name="action" value=".">.</button>
            <button type="submit" name="action" value="=" class="equal">=</button>
        </form>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $inputValue = $_POST['inputValue'];
            $action = $_POST['action'];

            if ($action == "clear") {
                $inputValue = '';
            } elseif ($action == "back") {
                $inputValue = substr($inputValue, 0, -1);
            } elseif ($action == "=") {
                try {
                    $result = eval("return $inputValue;");
                    $inputValue = $result;
                } catch (Exception $e) {
                    echo "<script>alert('Invalid Expression')</script>";
                }
            } else {
                $inputValue .= $action;
            }

            echo "<script>document.querySelector('.calcu').value = '$inputValue';</script>";
        }
    ?>
</body>
</html>
