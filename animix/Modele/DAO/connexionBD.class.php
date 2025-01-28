<?php
    include_once('config/configBD.interface.php');

    class ConnexionBD {
        private static $instance = null;

        private function __construct() {}

        public static function getInstance() {
            if (self::$instance == null) {
                $configuration = "mysql:host=" . ConfigBD::BD_HOTE . ";dbname=" . ConfigBD::BD_NOM;

                try {
                    self::$instance = new PDO($configuration, ConfigBD::BD_UTILISATEUR, ConfigBD::BD_MOT_PASSE);
                    self::$instance->exec("SET character_set_results = 'utf8'");
                } catch (PDOException $e) {
                    echo "Erreur de connexion à la base de données: " . $e->getMessage();
                }
            }
            return self::$instance;
        }

        public static function close() {
            self::$instance = null;
        }
    }
    // Supprimez l'accolade fermante supplémentaire ici
?>
