<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
</head>
<body>
    <h2>Calculadora PHP</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="num1">Número 1:</label>
        <input type="text" id="num1" name="num1">
        <br><br>
        <label for="num2">Número 2:</label>
        <input type="text" id="num2" name="num2">
        <br><br>
        <label for="operacao">Operação:</label>
        <select id="operacao" name="operacao">
            <option value="multiplicacao">Multiplicação</option>
            <option value="subtracao">Subtração</option>
            <option value="adicao">Adição</option>
            <option value="divisao">Divisão</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operacao = $_POST["operacao"];
 
        function calcular($num1, $num2, $operacao) {
            switch ($operacao) {
                case 'multiplicacao':
                    return $num1 * $num2;
                    break;
                case 'subtracao':
                    return $num1 - $num2;
                    break;
                case 'adicao':
                    return $num1 + $num2;
                    break;
                case 'divisao':
                    if ($num2 != 0) {
                        return $num1 / $num2;
                    } else {
                        return "Não é possível dividir por zero.";
                    }
                    break;
                default:
                    return "Operação inválida.";
            }
        }
 
        $resultado = calcular($num1, $num2, $operacao);
        echo "<h3>Resultado da operação {$operacao}: {$resultado}</h3>";
    }
    ?>
</body>
</html>