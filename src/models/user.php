<?php

class User
{
    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private ?string $photo;
    private string $createdAt;

    // Getters

    public function getId(): int
    {
        return $this->id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    // Setters

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}