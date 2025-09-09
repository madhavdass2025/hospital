<?php
class Product {
    // database connection and table name
    private $conn;
    private $table_name = "products";

    // object properties
    public $id;
    public $name;
    public $sku;
    public $manufacturer;
    public $supplier;
    public $cost_price;
    public $selling_price;
    public $expiration_date;
    public $hsn_code;
    public $is_taxable;
    public $reorder_level;
    public $stock_level;
    public $created_at;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // create product
    function create() {
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, sku=:sku, manufacturer=:manufacturer, supplier=:supplier, cost_price=:cost_price, selling_price=:selling_price, expiration_date=:expiration_date, hsn_code=:hsn_code, is_taxable=:is_taxable, reorder_level=:reorder_level, stock_level=:stock_level";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->sku=htmlspecialchars(strip_tags($this->sku));
        $this->manufacturer=htmlspecialchars(strip_tags($this->manufacturer));
        $this->supplier=htmlspecialchars(strip_tags($this->supplier));
        $this->cost_price=htmlspecialchars(strip_tags($this->cost_price));
        $this->selling_price=htmlspecialchars(strip_tags($this->selling_price));
        $this->expiration_date=htmlspecialchars(strip_tags($this->expiration_date));
        $this->hsn_code=htmlspecialchars(strip_tags($this->hsn_code));
        $this->is_taxable=htmlspecialchars(strip_tags($this->is_taxable));
        $this->reorder_level=htmlspecialchars(strip_tags($this->reorder_level));
        $this->stock_level=htmlspecialchars(strip_tags($this->stock_level));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":sku", $this->sku);
        $stmt->bindParam(":manufacturer", $this->manufacturer);
        $stmt->bindParam(":supplier", $this->supplier);
        $stmt->bindParam(":cost_price", $this->cost_price);
        $stmt->bindParam(":selling_price", $this->selling_price);
        $stmt->bindParam(":expiration_date", $this->expiration_date);
        $stmt->bindParam(":hsn_code", $this->hsn_code);
        $stmt->bindParam(":is_taxable", $this->is_taxable);
        $stmt->bindParam(":reorder_level", $this->reorder_level);
        $stmt->bindParam(":stock_level", $this->stock_level);

        // execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // read products
    function read(){
        // select all query
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // used when filling up the update product form
    function readOne(){
        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->sku = $row['sku'];
        $this->manufacturer = $row['manufacturer'];
        $this->supplier = $row['supplier'];
        $this->cost_price = $row['cost_price'];
        $this->selling_price = $row['selling_price'];
        $this->expiration_date = $row['expiration_date'];
        $this->hsn_code = $row['hsn_code'];
        $this->is_taxable = $row['is_taxable'];
        $this->reorder_level = $row['reorder_level'];
        $this->stock_level = $row['stock_level'];
    }

    // update the product
    function update(){
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    sku = :sku,
                    manufacturer = :manufacturer,
                    supplier = :supplier,
                    cost_price = :cost_price,
                    selling_price = :selling_price,
                    expiration_date = :expiration_date,
                    hsn_code = :hsn_code,
                    is_taxable = :is_taxable,
                    reorder_level = :reorder_level,
                    stock_level = :stock_level
                WHERE
                    id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->sku=htmlspecialchars(strip_tags($this->sku));
        $this->manufacturer=htmlspecialchars(strip_tags($this->manufacturer));
        $this->supplier=htmlspecialchars(strip_tags($this->supplier));
        $this->cost_price=htmlspecialchars(strip_tags($this->cost_price));
        $this->selling_price=htmlspecialchars(strip_tags($this->selling_price));
        $this->expiration_date=htmlspecialchars(strip_tags($this->expiration_date));
        $this->hsn_code=htmlspecialchars(strip_tags($this->hsn_code));
        $this->is_taxable=htmlspecialchars(strip_tags($this->is_taxable));
        $this->reorder_level=htmlspecialchars(strip_tags($this->reorder_level));
        $this->stock_level=htmlspecialchars(strip_tags($this->stock_level));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':sku', $this->sku);
        $stmt->bindParam(':manufacturer', $this->manufacturer);
        $stmt->bindParam(':supplier', $this->supplier);
        $stmt->bindParam(':cost_price', $this->cost_price);
        $stmt->bindParam(':selling_price', $this->selling_price);
        $stmt->bindParam(':expiration_date', $this->expiration_date);
        $stmt->bindParam(':hsn_code', $this->hsn_code);
        $stmt->bindParam(':is_taxable', $this->is_taxable);
        $stmt->bindParam(':reorder_level', $this->reorder_level);
        $stmt->bindParam(':stock_level', $this->stock_level);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    // delete the product
    function delete(){
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
?>
