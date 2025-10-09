<?php
namespace App\Database;

use App\Mode\MatchFoot;
use DateTime;
use PDO;

class MatchDatabase {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert(MatchFoot $match): void {
        $stmt = $this->pdo->prepare("
            INSERT INTO matchs (date_match, ville, score_equipe, score_adverse, equipe_id, club_adverse_id)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $match->getDate()->format("Y-m-d"),
            $match->getVille(),
            $match->getScoreEquipe(),
            $match->getScoreAdverse(),
            $match->getEquipeId(),
            $match->getAdversaireId()
        ]);
    }

    public function findAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM matchs");
        $matchs = [];

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $matchs[] = new MatchFoot(
                $data['id'],
                new DateTime($data['date_match']),
                $data['ville'],
                $data['score_equipe'],
                $data['score_adverse'],
                $data['equipe_id'],
                $data['club_adverse_id']
            );
        }

        return $matchs;
    }
}
