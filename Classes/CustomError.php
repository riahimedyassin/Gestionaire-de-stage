<?php

require_once __DIR__ . "/../enums/ErrorType.php";

class CustomError
{
    public static function displayError(string $type)
    {
        switch ($type) {
            case ErrorType::FIELDS: {
                    echo '<div class="alert alert-danger mt-4">Tous les champs sont obligatoire</div>';
                    break;
                }
            case ErrorType::DELETE: {
                    echo '<div class="alert alert-danger mt-4">Suppression Echoué</div>';
                    break;
                }
            case ErrorType::UPDATE: {
                    echo '<div class="alert alert-danger mt-4">Modification Echoué</div>';
                    break;
                }
            case ErrorType::ADD: {
                    echo '<div class="alert alert-danger mt-4">Ajout Echoué</div>';
                    break;
                }
            default: {
                    echo '<div class="alert alert-danger mt-4">Erreur Produit lors de l execution</div>';
                }
        }
    }
}

?>