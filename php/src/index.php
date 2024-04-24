<?php
        function createIndexPHP($directory)
        {
            $pathToIndex = $_SERVER['DOCUMENT_ROOT'];
            $indexContent = '<?php include("' . $pathToIndex . '/index.php"); ?>';
            if(!in_array("index.php",scandir($directory))){
                file_put_contents($directory . '/index.php', $indexContent);
            }
        }

        $directory = './';

        $items = scandir($directory);
        foreach ($items as $item) {
            // Exclude current and parent directories
            if (in_array($item, array('.', '..'))) {
                continue;
            }

            $path = $directory . '/' . $item;
            if (is_dir($path)) {
                createIndexPHP($path);
                echo '<li><a href="' . $item . '/index.php">' . $item . '/</a></li>';
            } else {
                $fileUrl = urlencode($item);
                if($fileUrl != "index.php" && str_starts_with($fileUrl,".") == false){
                    echo '<li><a href="' . $fileUrl . '">' . $item . '</a></li>';
                }
            }
        }
        echo '<li><a href="../index.php"> return </a></li>';
?>

