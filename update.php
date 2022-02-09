<!DOCTYPE html>

<?php include 'db.php'; 

$id = (int)$_GET['id'];

$sql = "select * from tasks where id='$id'";

$rows = $db-> query($sql);

$row = $rows->fetch_assoc();

if(isset($_POST['send'])) {

    $task = htmlspecialchars($_POST['task']);

    $sql = "update tasks set name='$task' where id='$id'";

    $db->query($sql);

    header('location: index.php');
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
                
                <h1 class="title">Update Todo list</h1>

                <div class="col-md-12">

                <hr> <br>
       
                <form method="post">
                    <div class="form-group">
                        <label for="">Task</label>
                        <input type="text" value="<?php echo $row['name']; ?>" required name="task" class="form-control">
                    </div>

                    <input type="submit" name="send" value="Add Task" class="btn btn-success">
                    <a href="index.php" class="btn btn-warning ml-2">Back</a>
                </form>

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