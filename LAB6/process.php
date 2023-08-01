<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Chapter 12 - Form Data</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <?php include 'headerM.php'; ?>

    <main>
    <div class="results">
        <div class="results__caption">Movie Information Saved</div>
        <table>
            <tr>
                <td class="results__label">Title:</td>
                <td><?php echo $_POST["title"]; ?></td>
            </tr>
            <tr>
                <td class="results__label">Description:</td>
                <td><?php echo $_POST["description"]; ?></td>
            </tr>
            <tr>
                <td class="results__label">Genre:</td>
                <td><?php echo $_POST["genre"]; ?></td>
            </tr>
            <tr>
                <td class="results__label">Subject:</td>
                <td><?php echo $_POST["subject"]; ?></td>
            </tr>
            <tr>
                <td class="results__label">Star:</td>
                <td><?php echo $_POST["Star"]; ?></td>
            </tr>
            <tr>
                <td class="results__label">Year:</td>
                <td><?php echo $_POST["year"]; ?></td>
            </tr>
            <tr>
                <td class="results__label">Production:</td>
                <td><?php echo $_POST["Production"]; ?></td>
            </tr>
        </table>
    </div>
</main>


    <?php include 'footerM.php'; ?>
</body>
</html>
