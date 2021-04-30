<?php
?>
<html>
<head>
  <title>PARTIDAS ANTERIORES</title>
  <meta charset=utf-8" />
</head>
<body>
        <?php
        include_once 'DatabasePDO.php';
        include_once 'EstadistiquesRow.php';
        $db = null;
        try {
            echo "<h1>PARTIDAS ANTERIORES</h1>";
            $db = new DatabasePDO("localhost:3306", "cmv", "cmv", "m07uf3");
            $db->connect();
            echo DatabasePDO::TABLE_START;
            $stmt = $db->selectAll();
            foreach (new EstadistiquesRow(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $row) {
                echo $row;
            }
        } catch (Exception $error) {
            echo "connection failed: " . $error->getMessage();
        }
        DatabasePDO::TABLE_END
        ?>
    </body>
</html>