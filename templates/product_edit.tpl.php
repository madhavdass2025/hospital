<form action='product_edit.php?id=<?php echo $id; ?>' method='post'>
    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $product->name; ?>' class='form-control' required></td>
        </tr>

        <tr>
            <td>SKU</td>
            <td><input type='text' name='sku' value='<?php echo $product->sku; ?>' class='form-control'></td>
        </tr>

        <tr>
            <td>Manufacturer</td>
            <td><input type='text' name='manufacturer' value='<?php echo $product->manufacturer; ?>' class='form-control'></td>
        </tr>

        <tr>
            <td>Supplier</td>
            <td><input type='text' name='supplier' value='<?php echo $product->supplier; ?>' class='form-control'></td>
        </tr>

        <tr>
            <td>Cost Price</td>
            <td><input type='number' step='0.01' name='cost_price' value='<?php echo $product->cost_price; ?>' class='form-control' required></td>
        </tr>

        <tr>
            <td>Selling Price</td>
            <td><input type='number' step='0.01' name='selling_price' value='<?php echo $product->selling_price; ?>' class='form-control' required></td>
        </tr>

        <tr>
            <td>Expiration Date</td>
            <td><input type='date' name='expiration_date' value='<?php echo $product->expiration_date; ?>' class='form-control'></td>
        </tr>

        <tr>
            <td>HSN Code</td>
            <td><input type='text' name='hsn_code' value='<?php echo $product->hsn_code; ?>' class='form-control'></td>
        </tr>

        <tr>
            <td>Taxable</td>
            <td><input type='checkbox' name='is_taxable' value='1' <?php echo $product->is_taxable ? 'checked' : ''; ?>></td>
        </tr>

        <tr>
            <td>Reorder Level</td>
            <td><input type='number' name='reorder_level' value='<?php echo $product->reorder_level; ?>' class='form-control' required></td>
        </tr>

        <tr>
            <td>Stock Level</td>
            <td><input type='number' name='stock_level' value='<?php echo $product->stock_level; ?>' class='form-control' required></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>

    </table>
</form>

<div class="right-button-margin">
    <a href="products.php" class="btn btn-default pull-right">View Products</a>
</div>
