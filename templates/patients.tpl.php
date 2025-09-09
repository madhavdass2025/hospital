<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <th>Pet Name</th>
        <th>Owner Name</th>
        <th>Species</th>
        <th>Breed</th>
        <th>Actions</th>
    </tr>
    <?php
    if($stmt->rowCount() > 0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<tr>";
                echo "<td>{$pet_name}</td>";
                echo "<td>{$owner_name}</td>";
                echo "<td>{$pet_species}</td>";
                echo "<td>{$pet_breed}</td>";
                echo "<td>";
                    // view patient details button
                    echo "<a href='patient_view.php?id={$id}' class='btn btn-primary left-margin'>
                        <span class='glyphicon glyphicon-list'></span> View Details
                    </a>";
                echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5' class='text-center'>No patients found.</td></tr>";
    }
    ?>
</table>
