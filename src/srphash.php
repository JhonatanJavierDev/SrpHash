<?php

namespace jhoncorella\SrpHash;

/**
 * Class SrpHash
 *
 * This class handles Secure Remote Password (SRP) hashing and password validation.
 * It uses SHA-256 for hashing and provides a secure way to validate passwords.
 */
class SrpHash
{
    /**
     * @var string $salt A unique salt used for password hashing.
     */
    private $salt;

    /**
     * @var string $insertedPassword The password provided by the user during login.
     */
    private $insertedPassword;

    /**
     * @var string $storedPasswordHash The hashed password stored in the database.
     */
    private $storedPasswordHash;

    /**
     * SrpHash constructor.
     *
     * @param string $salt              A unique salt used for password hashing.
     * @param string $insertedPassword  The password provided by the user during login.
     * @param string $storedPasswordHash The hashed password stored in the database.
     */
    public function __construct(string $salt, string $insertedPassword, string $storedPasswordHash)
    {
        $this->salt = $salt;
        $this->insertedPassword = $insertedPassword;
        $this->storedPasswordHash = $storedPasswordHash;
    }

    /**
     * Generates a secure hash using SHA-256 algorithm.
     *
     * @return string The generated hash.
     */
    private function generateHash(): string
    {
        return hash('sha256', $this->insertedPassword . $this->salt);
    }

    /**
     * Validates the entered password against the stored hashed password.
     *
     * @return string JSON-encoded response indicating the validation status.
     */
    public function validatePassword(): string
    {
        $generatedHash = $this->generateHash();

        if ($generatedHash === $this->storedPasswordHash) {
            return json_encode(['status' => 'Success', 'message' => 'Correct password'], JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(['status' => 'Error', 'message' => 'Incorrect password'], JSON_UNESCAPED_UNICODE);
        }
    }
}

