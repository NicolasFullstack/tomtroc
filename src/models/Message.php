<?php

class Message
{
    private int $id;
    private int $senderId;
    private int $receiverId;
    private string $content;
    private string $createdAt;
    private ?string $readAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getReadAt(): ?string
    {
        return $this->readAt;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    public function setReceiverId(int $receiverId): void
    {
        $this->receiverId = $receiverId;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setReadAt(?string $readAt): void
    {
        $this->readAt = $readAt;
    }
}