</php

class Work
{
  public $id;
  public $start_date;
  public $end-date;

  public function __construct($row) {
    $this->id = $row['id'];

    $this->start_date = $row['start_date'];
    $this->end_date = $row['end_date'];

    // TODO: where should this be calculated? $this->hours = 0; 
  }

  public static function getAllWorkByTask(int $taskId) {
    // 1. connect to the database
    // 2. run a query
    // 3. read the results
    // 4. for each row, make a new work object
    // 5. Return the array of work objects
    return[];
  }
}
