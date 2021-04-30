<?php
include_once 'ModalitatEnum.php';
interface DB {
    public function connect(): void;
    
    public function insert($modalitat, $nivell, $intents): int;
    
    public function selectAll();
}


