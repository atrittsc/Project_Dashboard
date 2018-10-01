<?php
class Work
{
  public $id;
  public $task_id;
  public $team_id;
  public $start;  //'YYYY-MM-DD'
  public $stop;   //'YYYY-MM-DD', needs to be calculated
  public $hours;
  public $completion_estimate;

  public function __construct($row) {
    $this->id = isset($row['id']) ? intval($row['id']): null;

    $this->task_id = intval($row['task_id']);
    $this->team_id = intval($row['team_id']);

    $this->start = $row['start_date'];
    $this->hours = floatval($row['hours']);


    // Calculate stop date
    $hours = floor($this->hours);
    $mins = intval(($this->hours - $hours) * 60); // Take advantage of one decimal place
    $interval = 'PT'. ($hours ? $hours.'H' : '') . ($mins ? $mins.'M' : '');

    $date = new DateTime($this->start);
    $date->add(new DateInterval($interval));
    $this->stop = $date->format('Y-m-d H:i:s');


    $this->completion_estimate = intval($row['completion_estimate']);
  }

public function create() {
  $db = new PDO(DB_SERVER, DB_USER, DB_PW);
  $sql = 'INSERT INTO Work (task_id, team_id, start_date, hours, completion_estimate)
          Values (?,?,?,?,?)';
          $statement = $db->prepare($sql);
          $success = $statement->execute([
            $this->task_id,
            $this->team_id,
            $this->start,
            $this->hours,
            $this->completion_estimate
          ]);

          if (!$success) {
            //TODO: Better erorr handling
            die ('Bad SQL on insert');
          }

          $this->id = $db->lastInsertID();
}

  public static function getWorkByTaskId(int $taskId) {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM Work WHERE task_id = ?';

    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute(
        [$taskId]
    );

    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      // 4.a. For each row, make a new work object
      $workItem =  new Work($row);

      array_push($arr, $workItem);
    }


    // 4.b. return the array of work objects
    return $arr;
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
