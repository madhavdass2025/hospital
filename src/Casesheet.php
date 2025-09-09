<?php
class Casesheet {
    // database connection and table name
    private $conn;
    private $table_name = "casesheets";

    // object properties
    public $id;
    public $patient_id;
    public $doctor_id;
    public $visit_date;
    public $patient_history;
    public $symptoms;
    public $diagnosis;
    public $prescribed_medicines;
    public $lab_tests_ordered;
    public $notes;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // create casesheet
    function create() {
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET patient_id=:patient_id, doctor_id=:doctor_id, patient_history=:patient_history, symptoms=:symptoms, diagnosis=:diagnosis, prescribed_medicines=:prescribed_medicines, lab_tests_ordered=:lab_tests_ordered, notes=:notes";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->patient_id=htmlspecialchars(strip_tags($this->patient_id));
        $this->doctor_id=htmlspecialchars(strip_tags($this->doctor_id));
        $this->patient_history=htmlspecialchars(strip_tags($this->patient_history));
        $this->symptoms=htmlspecialchars(strip_tags($this->symptoms));
        $this->diagnosis=htmlspecialchars(strip_tags($this->diagnosis));
        $this->prescribed_medicines=htmlspecialchars(strip_tags($this->prescribed_medicines));
        $this->lab_tests_ordered=htmlspecialchars(strip_tags($this->lab_tests_ordered));
        $this->notes=htmlspecialchars(strip_tags($this->notes));

        // bind values
        $stmt->bindParam(":patient_id", $this->patient_id);
        $stmt->bindParam(":doctor_id", $this->doctor_id);
        $stmt->bindParam(":patient_history", $this->patient_history);
        $stmt->bindParam(":symptoms", $this->symptoms);
        $stmt->bindParam(":diagnosis", $this->diagnosis);
        $stmt->bindParam(":prescribed_medicines", $this->prescribed_medicines);
        $stmt->bindParam(":lab_tests_ordered", $this->lab_tests_ordered);
        $stmt->bindParam(":notes", $this->notes);

        // execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // read all casesheets for a patient
    function readByPatient(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE patient_id = ? ORDER BY visit_date DESC";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->patient_id);
        $stmt->execute();
        return $stmt;
    }
}
?>
