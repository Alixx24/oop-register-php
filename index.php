<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file manager</title>
</head>

<body>
    <?php
    require_once 'services/bootstrap.php';
    if (isset($_REQUEST['address'])) {
        $current_dir = $_REQUEST['address'];
    } else {
        $current_dir = __DIR__ . '/files';
    }
    

    if (isset($_GET['delete'])) {
        $file = $_GET['delete'];
        if (file_exists($file)) {
            unlink($file);
        } else {
            echo "file Not exists";
        }
    }
    ?>
    <table>
        <tr>
            <td>Name</td>
            <td>Type</td>
            <td>Size</td>
            <td>Size</td>

        </tr>

        <?php

        $dir = opendir($current_dir);
        while (false !== ($file = readdir($dir))) {


            $fileSize = filesize($current_dir . '/' . $file);
        ?>
            <tr>
                <?php if (is_dir($current_dir . '/' . $file)) { ?>
                    <td><a href="index.php?address=<?php echo $current_dir . '/' . $file; ?>"><?php echo $file; ?></a></td>
                <?php } else { ?>
                    <td><a href="view.php?name=<?php echo $current_dir . '/' . $file; ?>"><?php echo $file; ?></a></td>
                <?php } ?>

                <td><?php echo is_file($current_dir . '/' . $file) ? 'file' : 'Dir'; ?></td>
                <td><?php echo size_convertor($fileSize); ?></td>
                <td><a href="index.php?delete=<?php echo $current_dir . '/' . $file; ?>&address=<?php echo $current_dir; ?>">Delete</a></td>

            </tr>
        <?php    }

        ?>
    </table>
    <form action="services/MakeFolder.php" method="POST">
        <input type="text" name="folder" placeholder="Directory Name" />
        <input type="hidden" name="address" value="<?php echo $current_dir; ?>" placeholder="File Name" />
        <input type="submit" value="Create">
    </form>

    <form action="services/MakeFile.php" method="POST">
        <input type="text" name="file" placeholder="File Name" />
        <input type="hidden" name="address" value="<?php echo $current_dir; ?>" placeholder="File Name" />

        <input type="submit" value="Create">
    </form>
</body>

</html>
<?php
function size_convertor($size)
{
    if ($size > 1024 * 1024) {
        return round($size / (1024 * 1024)) . ' M';
    } elseif ($size > 1024) {
        return round($size / 1024) . ' K';
    } else {
        return $size;
    }
}


?>