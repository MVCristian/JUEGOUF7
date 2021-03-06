<?php
include_once 'DatabaseConnection.php';
class DatabaseOOP extends DatabaseConnection {
    const TABLE_START = "<table style='border: solid 1px black;'><tr style='background: grey;'><th>Id</th><th>Modalitat</th><th>Nivell</th><th>Data</th><th>Intents</th></tr>";
    const TABLE_END = "</table>";
    
     public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }

    public function connect(): void {
        try {
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
       $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('".$modalitat . "','". $nivell ."','". $intents . "')";

       if ($this->connection->query($sql) === TRUE) {
            $sql = "SELECT max(id) FROM estadistiques";
            return mysqli_fetch_all($this->connection->query($sql))[0][0];
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        $result = $this->connection->query($sql);
        
        if ($result == TRUE) {
            return $result -> fetch_all();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    function showAll($stmt){
        for($i = 0; $i<count($stmt); $i++){
            echo "<tr>";
            for($j = 0; $j <count($stmt[$i]); $j++){
                echo "<td style='width:150px;border:1px solid blue;background:silver;'>" . $stmt[$i][$j] . "</td>";
            }
            echo "</tr>";
            
        }        
    }
}