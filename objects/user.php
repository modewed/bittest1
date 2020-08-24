<?php
class User
{


    private $conn;
    private $table_name = "users";


    public $email;
    public $tel;
    public $message;


    public function __construct($db)
    {
        $this->conn = $db;
    }




    public function create()
    {

        $query = "INSERT INTO $this->table_name SET email=:email, tel=:tel, message=:message";
        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->tel = htmlspecialchars(strip_tags($this->tel));
        $this->message = htmlspecialchars(strip_tags($this->message));

        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":message", $this->message);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>