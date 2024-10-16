<?php
class DataBase
{
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $DBname = "chart_project";
    private $db;

    function __construct()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->DBname;
            $this->db = new PDO($dsn, $this->user, $this->password);
            $this->db->setAttribute(/*PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,*/PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function set_User()
    {
        try {
            $sql = "INSERT INTO reciept (Price,Item,Category,Time_Stamp)
                VALUES (1, 'Doe', 'Jphn','2024-10-01')";
            // use exec() because no results are returned
            $this->db->exec($sql);
            echo "New record created successfully";
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function test()
    {
        echo '
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
';
    }
}
$Test = new DataBase();
//$Test->set_User();
$Test->test();
?>