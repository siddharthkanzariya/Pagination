<?php
    require("connection.php");

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else {
        $page = 1;
    }

    $num_per_page = 04;
    $start_from = ($page-1)*04;

    $query = mysqli_query($connection, "SELECT * FROM persons LIMIT $start_from,$num_per_page");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pagination</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <table class="table table-striped">
        <tr>
            <td>User ID</td>
            <td>LastName</td>
            <td>FirstName</td>
            <td>Age</td>
        </tr>
        <tr>
            <?php
                while ($row = mysqli_fetch_assoc($query)) {  
            ?>
            <td><?php echo $row['Person_ID'] ?></td>
            <td><?php echo $row['LastName'] ?></td>
            <td><?php echo $row['FirstName']  ?></td>
            <td><?php echo $row['Age']  ?></td>
        </tr>
            <?php
            }
            ?>
    </table>

            <?php
                    echo "<div class='a'>";

                    $pr_query = mysqli_query($connection,"SELECT * FROM persons");
                    $total_records = mysqli_num_rows($pr_query);
                    
                    $total_page = ceil($total_records/$num_per_page);
                    
                    if($page > 1)
                    {
                        echo "<a href='demo.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                    }

                    for ($i=1; $i<$total_page ; $i++) { 
                        
                        echo "<a href='demo.php?page=".$i."' class='btn btn-primary'>$i</a>";
                    }

                    if($i > $page)
                    {
                        echo "<a href='demo.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                    }

                    echo "</div>";
            ?>
</body>

</html>