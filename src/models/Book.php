<?php

class Book
{
    private int $id;
    private int $userId;
    private string $title;
    private string $author;
    private ?string $description;
    private ?string $photo;
    private bool $available;
    private string $createdAt;

    // Getters

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function getAvailable(): bool
    {
        return $this->available;
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

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}