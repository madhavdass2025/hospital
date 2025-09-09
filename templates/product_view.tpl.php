<table class='table table-hover table-responsive table-bordered'>

    <tr>
        <td>Name</td>
        <td><?php echo $product->name; ?></td>
    </tr>

    <tr>
        <td>SKU</td>
        <td><?php echo $product->sku; ?></td>
    </tr>

    <tr>
        <td>Manufacturer</td>
        <td><?php echo $product->manufacturer; ?></td>
    </tr>

    <tr>
        <td>Supplier</td>
        <td><?php echo $product->supplier; ?></td>
    </tr>

    <tr>
        <td>Cost Price</td>
        <td><?php echo $product->cost_price; ?></td>
    </tr>

    <tr>
        <td>Selling Price</td>
        <td><?php echo $product->selling_price; ?></td>
    </tr>

    <tr>
        <td>Expiration Date</td>
        <td><?php echo $product->expiration_date; ?></td>
    </tr>

    <tr>
        <td>HSN Code</td>
        <td><?php echo $product->hsn_code; ?></td>
    </tr>

    <tr>
        <td>Taxable</td>
        <td><?php echo $product->is_taxable ? "Yes" : "No"; ?></td>
    </tr>

    <tr>
        <td>Reorder Level</td>
        <td><?php echo $product->reorder_level; ?></td>
    </tr>

    <tr>
        <td>Stock Level</td>
        <td><?php echo $product->stock_level; ?></td>
    </tr>

</table>
