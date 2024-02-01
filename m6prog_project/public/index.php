<?php

require_once '../source/config.php';
require_once SOURCE_ROOT . 'database.php';
$connection = database_connect();
$plaats = 'amsterdam';
$sql = 'SELECT * FROM WeersomstandighedenPerDag WHERE plaats=? ORDER BY datum'; 
$stmt = $connection->prepare($sql);
$stmt->bind_param('s', $Plaats);
$stmt->execute();
$result = $stmt->get_result();
$weersomstandigheden = mysqli_fetch_assoc($result);