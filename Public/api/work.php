<?php
require '../../app/common.php';

$taskId = intval($_GET['taskId'] ?? 0);

if ($taskId < 1) {
  throw new Exception('Invalid Task ID');
}

// 1. Go to the database and get all work associated with the $taskId
$workArr = Work::getWorkByTaskId($taskId);

// 2. Convert to JSON
$json = json_encode($workArr, JSON_PRETTY_PRINT);

// 3. Print
header('Content-Type: application/json');
echo $json;




// require '../../app/common.php';
//
// $taskId = intval()$_GET['taskId'] ?? 0);
//
// if ($taskId < 1) {
//   throw new Exception('Invalid Task ID');
// }
//
//
// // 1. go to the databse and get all work associated with the $taskId
// $workArr = Work::getAllWorkByTask($taskId);
//
// // 2. convert to Json
// $json = json_encode($workArr);
//
// // 3. print
// echo $json
