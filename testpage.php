<?php
// Initialisation
require_once('includes/init.php');

$query = "CALL getUser('jcurl','12345')";

$result = $db->query($query) or die ("error");

$item = $result->fetch_array(MYSQLI_ASSOC);

echo $item['userName'];

