<!DOCTYPE html>
<head>
    <title>Document</title>
</head>
<body>
    <?php
    $a = 'Saya agung';
    echo $a;
    echo "<br>";
    $b = "Dari rpl a";
    echo $b;
    echo "<br>";
    ?>
    <br>
    <p></p>
    <?php
$a = 123; // decimal number
var_dump($a);
echo "<br>";
$b = -123; // a negative number
var_dump($b);
echo "<br>";
$c = 0x1A; // hexadecimal number
var_dump($c);
echo "<br>";
$d = 0123; // octal number
var_dump($d);
?>
<br>
<p></p>

<?php
$a = 1.234;
var_dump($a);
echo "<br>";
$b = 10.2e3;
var_dump($b);
echo "<br>";
$c = 4E-10;
var_dump($c);
?>
<br>
<p></p>
<?php
$colors = array("white", "Green", "Blue");
var_dump($colors);
echo "<br>";
$color_codes = array(
"Red" => "#ff0000",
"Green" => "#00ff00",
"Blue" => "#0000ff"
);
var_dump($color_codes);
?>
</body>
</html>