<!DOCTYPE html>
<head>
    <title>Document</title>
</head>
<body>
<?php
$x = 5;
$y = 10;
echo"aritmatika","<br>";
echo ($x + $y),"<br>"; 
echo ($x - $y),"<br>"; 
echo ($x * $y),"<br>"; 
echo ($x / $y),"<br>"; 
echo ($x % $y),"<br>"; 
echo ($x ** $y),"<br>"; 
echo ($x -= $y),"<br>"; 
?>

<p></p>

<?php
$x = 5;
$y = 10;
echo "operator penugasan","<br>";
echo ($x += $y), "<br>";  // $x = $x + $y
echo ($x -= $y), "<br>";  // $x = $x - $y
echo ($x *= $y), "<br>";  // $x = $x * $y
echo ($x /= $y), "<br>";  // $x = $x / $y
echo ($x %= $y), "<br>";  // $x = $x % $y
echo ($x **= $y), "<br>"; // $x = $x ** $y
?>

<p></p>


<?php
$a = 90;
$b = 80;

echo "Operator Perbandingan", "<br>";
echo ($a > $b), " = bool(true)", "<br>";
echo ($a >= $a), " = bool(true)", "<br>";
echo (3 < 6), " = bool(true)", "<br>";
echo (5 <= 3), " = bool(true)", "<br>";
echo ('a' < 'b'), " = bool(true)", "<br>";
echo ('abc' < 'b'), " = bool(true)", "<br>";
?>


</body>
</html>
