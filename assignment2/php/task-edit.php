<?php
session_start();
require 'dbcon.php';
?>
    <style>
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: blue;
        }
        .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
        .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        color: black;
        text-align: center;
        padding: 10px;
        }
    </style>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Task Edit</title>
</head>

<body>
<?php include 'header.php'; ?>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task Edit
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $task_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM tasks WHERE id='$task_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $task = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="task_id" value="<?= $task['id']; ?>">

                                    <div class="mb-3">
                                        <label>Task Name</label>
                                        <input type="text" name="name" value="<?= $task['name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Description</label>
                                        <input type="text" name="description" value="<?= $task['description']; ?>"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Priority</label>
                                        <select name="priority" id="priority" class="form-control">
                                            <option value="3" <?php if ($task['priority'] === 'high')
                                                echo 'selected'; ?>>High
                                            </option>
                                            <option value="2" <?php if ($task['priority'] === 'medium')
                                                echo 'selected'; ?>>
                                                Medium</option>
                                            <option value="1" <?php if ($task['priority'] === 'low')
                                                echo 'selected'; ?>>Low
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Deadline</label>
                                        <input type="text" name="deadline" value="<?= $task['deadline']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_task" class="btn btn-primary">
                                            Update Task
                                        </button>
                                    </div>

                                </form>
                                <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php'; ?>
</body>

</html>