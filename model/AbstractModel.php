<?php

abstract class AbstractModel {

    protected $pdo;

    /**
     * Constructeur de la classe AbstractModel.
     * Initialise la connexion à la base de données.
     */
    function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=mvc_seminaire", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    /**
     * Exécute une requête SQL avec des paramètres.
     *
     * @param string $query La requête SQL à exécuter.
     * @param array $params Les paramètres à associer à la requête.
     * @return PDOStatement Le résultat de la requête exécutée.
     */
    public function executerReq($query, array $params = []){
        $stmt = $this->pdo->prepare($query);

        // Échappe les valeurs des paramètres pour éviter les injections SQL.
        foreach($params as $cle => $valeur){
            $params[$cle] = htmlentities($valeur);
        }

        // Exécute la requête avec les paramètres fournis.
        $stmt->execute($params);

        return $stmt;
    }

}
