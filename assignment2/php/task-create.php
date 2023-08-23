<?php
session_start();
$priorityMap = array(
    'high' => 3,
    'medium' => 2,
    'low' => 1
);
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

    <title>Task Create</title>
</head>

<body>
<?php include 'header.php'; ?>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task Add
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Task Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Task Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Task Priority</label>
                                <select name="priority" id="priority" class="form-control">
                                    <option value="<?= $priorityMap['high']; ?>">high</option>
                                    <option value="<?= $priorityMap['medium']; ?>">medium</option>
                                    <option value="<?= $priorityMap['low']; ?>">low</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Task Deadline</label>
                                <input type="date" name="deadline" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_task" class="btn btn-primary">Save Task</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php'; ?>   
</body>

</html>