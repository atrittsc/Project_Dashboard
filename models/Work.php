<?php

class Work
{
  public $work_id;
  public $team_id;
  public $task_id;
  public $start_date;
  public $stop_date;
  public $hours;
  public function __construct($data) {
    // TODO:!
  }
  public static function findByTaskId($taksId) {
    // 1. Get Db Connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    var_dump($db);
    die;

    // 2. Prepare SQL statement
    // 3. Execute statement
    // 4. Handle results
  }
}

// class Work
// {
//   public $id;
//   public $start_date;
//   public $stop_date;
//   public $task_id;
//   public $hours;
//   public $team_id;
//   public $work_id;
//
//   public function __construct($row) {
//     $this->id = $row['id'];
//
//     $this->start_date = $row['start_date'];
//     $this->end_date = $row['stop_date'];
//
//     // TODO: where should this be calculated? $this->hours = 0;
//   }
// 
//   public static function getAllWorkByTask(int $taskId) {
//     // 1. connect to the database (Get DB connection)
//     $db = new PDO(DB_SERVER, DB_USER, DB_PW);
//     var_dump($db)
//
//     die;
//     // 2. run a query (prepare sql statement)
//     // 3. read the results
//     // 4. for each row, make a new work object
//     // 5. Return the array of work objects
//     return[];
//   }
// }
