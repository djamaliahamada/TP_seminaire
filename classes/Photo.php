<?php
class Photo {

    private $id;
    private $intervenant_id;
    private $chemin;

    public function __construct(array $data = []) {
        foreach($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getIntervenantId() {
        return $this->intervenant_id;
    }

    public function getChemin() {
        return $this->chemin;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIntervenantId($intervenant_id): void {
        $this->intervenant_id = $intervenant_id;
    }

    public function setChemin($chemin): void {
        $this->chemin = $chemin;
    }
}
