<?php
namespace App\Contract;

use PDO;

interface Savable {
    public function save(PDO $pdo): void;
}