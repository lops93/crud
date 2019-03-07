<?php
include 'db.php';

if (isset($_POST['send'])) {
	//$name = $_POST['task'];
	//echo $name;  //teste feito com sucesso

	$name = $_POST['task'];

	$sql = "insert into task (name) values ('$name')";

    $val = $db->query($sql);

    if ($val) {  // = val == true
    	//echo "<h1>Inserido com sucesso</h1>";
    	header('location: index.php');
    }
}

?>