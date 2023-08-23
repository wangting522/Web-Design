<?php
session_start();
require 'dbcon.php';

// Function to get priority string representation
function getPriorityString($priority)
{
    switch ($priority) {
        case 3:
            return 'High';
        case 2:
            return 'Medium';
        case 1:
            return 'Low';
        default:
            return 'Unknown';
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Task Management</title>
</head>

<body>

    <div class="container mt-4">
    <?php include 'header.php'; ?>
        <!-- Search Bar -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Task look-up </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                            echo $_GET['search'];
                                        } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Task Details -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Task Details</h4>
                            <form action="" method="GET">
                                <select id="sorting" name="sort_order" onchange="this.form.submit()"
                                    class="form-select">
                                    <option value="">Sort By Priority</option>
                                    <option value="priorityDesc">High to Low</option>
                                    <option value="priorityAsc">Low to High</option>
                                </select>
                            </form>
                            <a href="task-create.php" class="btn btn-primary">Add Tasks</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="task-table">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Priority</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tasks";

                            // If search query exists, modify the query
                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                $query = "SELECT * FROM tasks WHERE CONCAT(name, description, priority, deadline) LIKE '%$filtervalues%'";
                            }

                            // Retrieve data from the database
                            $query_run = mysqli_query($con, $query);
                            $rows = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

                            // Handle sorting option
                            if (isset($_GET['sort_order'])) {
                                $sortOrder = $_GET['sort_order'];
                                if ($sortOrder === 'priorityDesc') {
                                    usort($rows, function ($a, $b) {
                                        return $b['priority'] - $a['priority'];
                                    });
                                } elseif ($sortOrder === 'priorityAsc') {
                                    usort($rows, function ($a, $b) {
                                        return $a['priority'] - $b['priority'];
                                    });
                                }
                            }

                            if (count($rows) > 0) {
                                foreach ($rows as $task) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $task['name']; ?>
                                        </td>
                                        <td>
                                            <?= $task['description']; ?>
                                        </td>
                                        <td>
                                            <?= getPriorityString($task['priority']); ?>
                                        </td>
                                        <td>
                                            <?= $task['deadline']; ?>
                                        </td>
                                        <td>
                                            <a href="task-view.php?id=<?= $task['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="task-edit.php?id=<?= $task['id']; ?>"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_task" value="<?= $task['id']; ?>"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<h5> No Record Found </h5>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>