<?php
//constant types, by convention they are written in uppercase.

// Switch helps to avoid repetition and writing so many codes.
// That is why it is preferred over if-else statement when you have multiple parameters to check.

$day = "Thursday";
switch($day){
    case "Monday":
        echo"Today is Monday";
    case "Wednesday":
    case "Thursday":
                echo"Still in the week";
    default:
                echo "Unknown";
}
define("COLLEGE","RP Kigali");
//echo COLLEGE;
//multi dimensional array.
$students = [
    ["name"=>"Peter","age"=>32],
    ["name"=>"Sage","age"=>43]
];
print_r($students);

echo "<table border='1'>";
echo "<tr><th>Name</th><th>Age</th></tr>";
foreach ($students as $student) {
    echo "<tr><td>{$student['name']}</td><td>{$student['age']}</td></tr>";
}
echo "</table>";



?>
