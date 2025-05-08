<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hotel Management System">
    <title><?php echo html_escape($title); ?></title>
</head>

<body>
    <div class="container">
        <?php if (isset($content)) {
            echo $content;
        } ?>
    </div>
</body>

</html>