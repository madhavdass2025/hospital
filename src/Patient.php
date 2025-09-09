<?php
class Patient {
    // database connection and table name
    private $conn;
    private $table_name = "patients";

    // object properties
    public $id;
    public $owner_name;
    public $owner_contact;
    public $pet_name;
    public $pet_species;
    public $pet_breed;
    public $pet_sex;
    public $pet_dob;
    public $created_at;
    public $updated_at;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // create patient
    function create() {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET owner_name=:owner_name, owner_contact=:owner_contact, pet_name=:pet_name, pet_species=:pet_species, pet_breed=:pet_breed, pet_sex=:pet_sex, pet_dob=:pet_dob";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->owner_name=htmlspecialchars(strip_tags($this->owner_name));
        $this->owner_contact=htmlspecialchars(strip_tags($this->owner_contact));
        $this->pet_name=htmlspecialchars(strip_tags($this->pet_name));
        $this->pet_species=htmlspecialchars(strip_tags($this->pet_species));
        $this->pet_breed=htmlspecialchars(strip_tags($this->pet_breed));
        $this->pet_sex=htmlspecialchars(strip_tags($this->pet_sex));
        $this->pet_dob=htmlspecialchars(strip_tags($this->pet_dob));

        // bind values
        $stmt->bindParam(":owner_name", $this->owner_name);
        $stmt->bindParam(":owner_contact", $this->owner_contact);
        $stmt->bindParam(":pet_name", $this->pet_name);
        $stmt->bindParam(":pet_species", $this->pet_species);
        $stmt->bindParam(":pet_breed", $this->pet_breed);
        $stmt->bindParam(":pet_sex", $this->pet_sex);
        $stmt->bindParam(":pet_dob", $this->pet_dob);

        // execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // read all patients
    function read(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // read one patient
    function readOne(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->owner_name = $row['owner_name'];
        $this->owner_contact = $row['owner_contact'];
        $this->pet_name = $row['pet_name'];
        $this->pet_species = $row['pet_species'];
        $this->pet_breed = $row['pet_breed'];
        $this->pet_sex = $row['pet_sex'];
        $this->pet_dob = $row['pet_dob'];
    }
}
?>
