<?php
require 'dbcon.php';

function mapPriorityToText($priorityNumber)
{
    switch ($priorityNumber) {
        case 3:
            return 'High';
        case 2:
            return 'Medium';
        case 1:
            return 'Low';
        default:
            return 'Unknown'; // Handle unexpected cases
    }
}
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

    <title>Task View</title>
</head>

<body>
<?php include 'header.php'; ?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task View Details
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

                                <div class="mb-3">
                                    <label>Task Name</label>
                                    <p class="form-control">
                                        <?= $task['name']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Task Description</label>
                                    <p class="form-control">
                                        <?= $task['description']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Task Priority</label>
                                    <p class="form-control">
                                        <?= mapPriorityToText($task['priority']); ?>
                                    </p>

                                </div>
                                <div class="mb-3">
                                    <label>Task Deadline</label>
                                    <p class="form-control">
                                        <?= $task['deadline']; ?>
                                    </p>
                                </div>

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