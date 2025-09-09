<?php
class User {
    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public $status;
    public $created_at;
    public $updated_at;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // create user
    function create() {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, email=:email, password=:password, role=:role";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->role=htmlspecialchars(strip_tags($this->role));

        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $password_hash);
        $stmt->bindParam(":role", $this->role);

        // execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // check if given email exist in the database
    function emailExists(){
        // query to check if email exists
        $query = "SELECT id, username, password, role, status FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";

        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));

        // bind given email value
        $stmt->bindParam(1, $this->email);

        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if($num>0){
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->role = $row['role'];
            $this->status = $row['status'];

            // return true because email exists in the database
            return true;
        }

        // return false if email does not exist in the database
        return false;
    }

    // read one user
    function readOne(){
        $query = "SELECT username, role, status FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->username = $row['username'];
        $this->role = $row['role'];
        $this->status = $row['status'];
    }
}
?>
