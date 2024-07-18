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
            background-color:  rgba(222, 215, 201, 0.299);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .calculator input[type="text"] {
            grid-column: span 4;
            padding: 10px;
            font-size: 18px;
        }
        .calculator span, .calculator .equal {
            padding: 20px;
            text-align: center;
            background-color: #ddd;
            cursor: pointer;
            font-size: 18px;
        }
        .calculator .num_clear {
            background-color: rgb(247, 196, 101);
        }
        .calculator .equal {
            background-color: rgb(94, 229, 94);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculator</h1>
        <form class="calculator" method = "post">
            <input type="text" class="calcu" name="inputValue" <?php echo isset($_POST['inputValue'])? $_POST['inputValue'] : ''; ?> readonly/>
            <span class="num_clear" onclick="clearInput()">clear</span><br/>
            <span onclick="getValue('/')">/</span>
            <span onclick="getValue('%')">%</span>
            <span onclick="getValue('7')">7</span>
            <span onclick="getValue('8')">8</span>
            <span onclick="getValue('9')">9</span>
            <span onclick="getValue('*')">*</span>
            <span onclick="getValue('4')">4</span>
            <span onclick="getValue('5')">5</span>
            <span onclick="getValue('6')">6</span>
            <span onclick="getValue('-')">-</span>
            <span onclick="getValue('1')">1</span>
            <span onclick="getValue('2')">2</span>
            <span onclick="getValue('3')">3</span>
            <span onclick="getValue('+')">+</span>
            <span onclick="getValue('0')">0</span>
            <span onclick="getValue('00')">00</span>
            <span onclick="getValue('.')">.</span>
            <span class="equal" onclick="calculateValue()">=</span>
        </form>
    </div>

    <script>
        function getValue(Value){
            let inputField = document.querySelector('.calcu');
            inputField.value += Value;
        }

        function clearInput(){
            let inputField = document.querySelector('.calcu');
            inputField.value = '';
        }

        function calculateValue(){
            document.querySelector('.calculator').submit();
        }
    </script>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $inputValue = $_POST['inputValue'];

            try{

                $result = eval("return $inputValue;");
                echo "<script>document.querySelector('.calcu').value = '$result';</script>";

            } catch(Exception $e){
                echo "<script>alert('Invalid Exception')</script>";
            }
        }
    ?>
</body>
</html>
