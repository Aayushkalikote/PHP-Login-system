<?php include('conn.php');
$sql = "SELECT * FROM `contact_us`";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<body>
    <div class="card">
        <div class="card-header py-2">
          <h3 class="card-title">Contacts list</h3>
         
        </div>
        <div class="card-body">
          <div class="table-responsive bg-white">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date/Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($rows)) :
                    foreach ($rows as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row["id"] ?></th>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["message"] ?></td>
                            <td><?= $row["dt"] ?></td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="5">No data found</td>
                    </tr>
                <?php endif; ?>

                <?php
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
            </tbody>


        </table>
          </div>

        </div>
      </div>
    
</body>

</html>