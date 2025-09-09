<form action='product_add.php' method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' required></td>
        </tr>

        <tr>
            <td>SKU</td>
            <td><input type='text' name='sku' class='form-control'></td>
        </tr>

        <tr>
            <td>Manufacturer</td>
            <td><input type='text' name='manufacturer' class='form-control'></td>
        </tr>

        <tr>
            <td>Supplier</td>
            <td><input type='text' name='supplier' class='form-control'></td>
        </tr>

        <tr>
            <td>Cost Price</td>
            <td><input type='number' step='0.01' name='cost_price' class='form-control' required></td>
        </tr>

        <tr>
            <td>Selling Price</td>
            <td><input type='number' step='0.01' name='selling_price' class='form-control' required></td>
        </tr>

        <tr>
            <td>Expiration Date</td>
            <td><input type='date' name='expiration_date' class='form-control'></td>
        </tr>

        <tr>
            <td>HSN Code</td>
            <td><input type='text' name='hsn_code' class='form-control'></td>
        </tr>

        <tr>
            <td>Taxable</td>
            <td><input type='checkbox' name='is_taxable' value='1' checked></td>
        </tr>

        <tr>
            <td>Reorder Level</td>
            <td><input type='number' name='reorder_level' class='form-control' value='0' required></td>
        </tr>

        <tr>
            <td>Stock Level</td>
            <td><input type='number' name='stock_level' class='form-control' value='0' required></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>

    </table>
</form>

<div class="right-button-margin">
    <a href="products.php" class="btn btn-default pull-right">View Products</a>
</div>
