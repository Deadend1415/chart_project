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
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function set_User($Price,$Item,$Category,$Time_Stamp)
    {
        try {
            $sql = "INSERT INTO reciept (Price,Item,Category,Time_Stamp)
                VALUES (?,?,?,?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$Price,$Item,$Category,$Time_Stamp]);
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}

?>