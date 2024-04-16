<?php
class Photo {
    
    private $id;
    private $intervenant_id; // Identifiant de l'intervenant auquel la photo est associée
    private $chemin; // Chemin vers le fichier de la photo

    public function __construct(int $id, int $intervenant_id, string $chemin) {
        $this->id = $id;
        $this->intervenant_id = $intervenant_id;
        $this->chemin = $chemin;
    }

    // Getters et setters
    public function getId(): int {
        return $this->id;
    }

    public function getIntervenantId(): int {
        return $this->intervenant_id;
    }

    public function getChemin(): string {
        return $this->chemin;
    }

    public function setChemin(string $chemin): void {
        $this->chemin = $chemin;
    }
}
