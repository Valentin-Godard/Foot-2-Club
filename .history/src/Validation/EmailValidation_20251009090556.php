<?php
namespace App\Validation;

/**
 * Classe EmailValidation
 * Vérifie la validité d'une adresse email
 */
class EmailValidation {
    private ?string $errorMessage = null;

     * @param string|null $email
     * @return bool
     */
    public function isValid(?string $email): bool {
        // Vérifie si le champ est vide
        if (empty($email)) {
            $this->errorMessage = "L'adresse email ne peut pas être vide.";
            return false;
        }

        // Vérifie si le format est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = "Format d'adresse email invalide.";
            return false;
        }

        // Si tout est bon
        $this->errorMessage = null;
        return true;
    }

    /**
     * Retourne le message d'erreur (ou null s'il n'y en a pas)
     *
     * @return string|null
     */
    public function getErrorMessage(): ?string {
        return $this->errorMessage;
    }
}

