<?php
require '../../app/common.php';
// Get the taskId from URL params
$taskId = intval($_GET['taskId'] ?? 0);
// Fetch the work from the db
$work = Work::findByTaskId($taskId);
// convert to json and print
echo json_encode($work);







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
