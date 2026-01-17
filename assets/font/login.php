<!DOCTYPE html>
<html>
<head>
    <title>PHP File Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        form.inline {
            display: inline-block;
            margin-right: 10px;
        }

        form.inline button {
            margin-top: 5px;
        }

        form.inline input[type="submit"] {
            padding: 5px 10px;
            border: none;
            background-color: #428bca;
            color: #fff;
            cursor: pointer;
        }

        form.inline input[type="submit"]:hover {
            background-color: #3071a9;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Add your JavaScript code here
    </script>
</head>
<body>
    <h1>PHP File Manager</h1>
    <?php
    // Function to format file sizes
    function formatSizeUnits($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    // Get the current directory
    $currentDir = getcwd();

    // Check if a directory is requested
    if (isset($_GET['dir'])) {
        $requestedDir = $_GET['dir'];
        $requestedDir = urldecode($requestedDir);

        // Validate the requested directory path to prevent unauthorized access
        if (strpos($requestedDir, $currentDir) === 0) {
            $currentDir = $requestedDir;
        }
    }

    // Handle file upload
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName = $file['tmp_name'];

        if (move_uploaded_file($fileTmpName, $currentDir . '/' . $fileName)) {
            echo '<div class="success">File uploaded successfully.</div>';
        } else {
            echo '<div class="error">Failed to upload file.</div>';
        }
    }

    // Handle file deletion
    if (isset($_POST['delete'])) {
        $fileToDelete = $_POST['delete'];

        // Validate the file path to prevent unauthorized deletion
        if (strpos($fileToDelete, $currentDir) === 0) {
            if (is_file($fileToDelete)) {
                if (unlink($fileToDelete)) {
                    echo '<div class="success">File deleted successfully.</div>';
                } else {
                    echo '<div class="error">Failed to delete file.</div>';
                }
            } elseif (is_dir($fileToDelete)) {
                if (rmdir($fileToDelete)) {
                    echo '<div class="success">Directory deleted successfully.</div>';
                } else {
                    echo '<div class="error">Failed to delete directory.</div>';
                }
            }
        }
    }

    // Handle file editing
    if (isset($_POST['edit'])) {
        $fileToEdit = $_POST['edit'];

        // Validate the file path to prevent unauthorized editing
        if (strpos($fileToEdit, $currentDir) === 0) {
            $fileContent = file_get_contents($fileToEdit);

            echo '<h2>Edit File: ' . basename($fileToEdit) . '</h2>';
            echo '<form method="post">';
            echo '<textarea name="content" rows="10">' . htmlentities($fileContent) . '</textarea>';
            echo '<input type="hidden" name="save" value="' . $fileToEdit . '">';
            echo '<input type="submit" value="Save">';
            echo '</form>';
        }
    }

    // Handle file saving after editing
    if (isset($_POST['save'])) {
        $fileToSave = $_POST['save'];

        // Validate the file path to prevent unauthorized saving
        if (strpos($fileToSave, $currentDir) === 0) {
            $fileContent = $_POST['content'];

            if (file_put_contents($fileToSave, $fileContent) !== false) {
                echo '<div class="success">File saved successfully.</div>';
            } else {
                echo '<div class="error">Failed to save file.</div>';
            }
        }
    }

    // Get the parent directory
    $parentDir = dirname($currentDir);

    // Display the "Go Back" link/button if not in the root directory
    if ($currentDir != $parentDir) {
        echo '<a href="?dir=' . urlencode($parentDir) . '">Go Back</a>';
    }

    // Get the files and directories in the current directory
    $files = scandir($currentDir);

    // Display the files and directories
    echo '<ul>';
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $currentDir . '/' . $file;
            echo '<li>';

            // Check if the file is a directory
            if (is_dir($filePath)) {
                echo '[DIR] <a href="?dir=' . urlencode($filePath) . '">' . $file . '</a>';
            } else {
                echo '<a href="' . $file . '">' . $file . '</a> (' . formatSizeUnits(filesize($filePath)) . ')';
            }

            // Add delete button for files and directories
            echo '
                <form class="inline" method="post" onsubmit="return confirm(\'Are you sure you want to delete this file/directory?\')">
                    <input type="hidden" name="delete" value="' . $filePath . '">
                    <input type="submit" value="Delete">
                </form>
            ';

            // Add edit button for files
            if (is_file($filePath)) {
                echo '
                    <form class="inline" method="post">
                        <input type="hidden" name="edit" value="' . $filePath . '">
                        <input type="submit" value="Edit">
                    </form>
                ';
            }

            echo '</li>';
        }
    }
    echo '</ul>';
    ?>

    <!-- File upload form -->
    <h2>Upload File</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
