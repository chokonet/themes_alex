<html>
    <header><title>ad</title></header>
    <body>
       <form action="index.php" method="post"
            enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="text" name="nombre">
            <input type="file" name="file" id="file"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
   echo "namer: " . $_FILES["nombre"];
        ?>

    </body>
</html>