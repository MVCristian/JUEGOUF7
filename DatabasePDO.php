<?php

include_once 'DatabaseConnection.php';

class DatabasePDO extends DatabaseConnection {
    const TABLE_START = "<table style='border: solid 1px black;'><tr style='background: grey;'><th>Id</th><th>Modalitat</th><th>Nivell</th><th>Data</th><th>Intents</th></tr>";
    const TABLE_END = "</table>";
    private $database;

    public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }

    function connect(): void {
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    function insert($modalitat, $nivell, $intents): int {
        try {
            $stmt = $this->connection->prepare("INSERT INTO estadistiques (modalitat, nivell, intents) VALUES (:modalitat, :nivell, :intents)");
            $stmt->bindParam(':modalitat', $modalitat);
            $stmt->bindParam(':nivell', $nivell);
            $stmt->bindParam(':intents', $intents);
            $stmt->execute();
            return $this->connection->lastInsertId();
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    function selectAll() {
        $stmt = $this->connection->prepare("SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }
    
    function showAll($stmt){
         foreach (new EstadistiquesRow(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $row) {
                echo $row;
            }        
    }
}

    function createTable($table_sql) {
        try {
            $this->connection->exec($table_sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function insert($modalitat, $nivell, $intents) {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        try {
            $this->connection->exec($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }    