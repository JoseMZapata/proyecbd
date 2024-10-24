<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP CRUD</title>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM users ORDER BY id DESC';
                    foreach ($pdo->query($sql) as $row) {
                      echo '<tr>';
                      echo '<td>'. $row['first_name'] .'</td>';
                      echo '<td>'. $row['last_name'] .'</td>';
                      echo '<td>'. $row['email'] .'</td>';
                      echo '<td width=250>';
                      // Acceso a la pantalla para ver un usuario
                      echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';

                            echo ' ';
                            // Acceso a la pantalla para actualizar un usuario
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';

                            echo ' ';
                            // Acceso a la pantalla para eliminar un usuario
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';

                            echo '</td>';
                      echo '</tr>';
                          }
                    Database::disconnect();
                  ?>
			<!-- Incluir aquí el código sugerido -->
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
