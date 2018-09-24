2
<?php

require '../../app/common.php';

$taskId = intval()$_GET['taskId'] ?? 0);

if ($taskId < 1) {
  throw new Exception('Invalid Task ID');
}


// 1. go to the databse and get all word associated with the $taskId
$workArr = Work::getAllWorkByTask($taskId);

// 2. convert to Json
$json = json_encode($workArr);

// 3. print
echo $json