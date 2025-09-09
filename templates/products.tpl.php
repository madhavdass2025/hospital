<div class="right-button-margin">
    <a href="product_add.php" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-plus"></span> Add Product
    </a>
</div>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Expiration Date</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "<tr>";
            echo "<td>{$name}</td>";
            echo "<td>{$selling_price}</td>";
            echo "<td>{$expiration_date}</td>";
            echo "<td>{$stock_level}</td>";
            echo "<td>";
                // read, edit and delete buttons
                echo "<a href='product.php?id={$id}' class='btn btn-primary left-margin'>
                    <span class='glyphicon glyphicon-list'></span> Read
                </a>";

                echo "<a href='product_edit.php?id={$id}' class='btn btn-info left-margin'>
                    <span class='glyphicon glyphicon-edit'></span> Edit
                </a>";

                echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>
                    <span class='glyphicon glyphicon-remove'></span> Delete
                </a>";
            echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
