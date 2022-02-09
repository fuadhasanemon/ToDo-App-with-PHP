<!DOCTYPE html>

<?php include 'db.php'; 

if(isset($_POST['search'])){

    $name = htmlspecialchars($_POST['search']);

    $sql = "select * from tasks where name like '%$name%'";

    $rows = $db->query($sql);

}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <section class="toDoApp">

        <div class="container">
            <div class="row">

                
                <h1 class="title">To do list</h1>

                <div class="col-md-12">

                <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success mb-4">Add Task</button>

                <button type="button" class="btn btn-primary pull-right mb-4" onclick="print()">Print</button>

                <hr> <br>

                <!-- The Modal -->
                    <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Task</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                           <form method="post" action="add.php">
                               <div class="form-group">
                                    <label for="">Task</label>
                                    <input type="text" required name="task" class="form-control">
                               </div>

                               <input type="submit" name="send" value="Add Task" class="btn btn-success">
                           </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                        </div>
                    </div>
                    </div>

                    <div class="col-md-12 text-center">

                    <p>Search</p>

                    <form action="search.php" method="post" class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                    </form>

                    </div>

                    <?php if(mysqli_num_rows($rows) < 1): ?>

                        <h2 class="text-dengar text-center"> Nothing is found!</h2>

                    <?php else: ?>   

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th style="border: none;" scope="col">No.</th>
                                <th style="border: none;" scope="col">Task</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php while($row = $rows->fetch_assoc()): ?>
                            
                                <th scope="row"> <?php echo $row['id']; ?></th>
                                <td class="col-md-10"><?php echo $row['name']; ?></td>
                                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>

                                <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                
                            </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>

                        <?php endif; ?>

                    <div class="text-center">
                        <a href="index.php" class="btn btn-warning m-5">Back</a>
                    </div>

                </div>
                

            </div>
        </div>

    </section>



    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>