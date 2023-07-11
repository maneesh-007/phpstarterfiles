<?php 
include("class.DataBase.php");
$name = $_POST['name'];

$db = new DataBase;
$data = [["field"=>'%'.$name.'%',"type"=>PDO::PARAM_STR]];
$students = $db->get("SELECT * FROM student WHERE name LIKE ? ",$data);
$resultHtml = '';
foreach ($students as $row) {
    $resultHtml .= '<tr>';
    $resultHtml .= '<td>' . $row['id'] . '</td>';
    $resultHtml .= '<td>' . $row['name'] . '</td>';
    $resultHtml .= '<td>' . $row['age'] . '</td>';
    $resultHtml .= '<td>' . $row['grade'] . '</td>';
    $resultHtml .= '</tr>';
}

// Return the search results HTML
echo $resultHtml;
?>
?>