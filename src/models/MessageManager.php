<?php

require_once __DIR__ . '/Message.php';

class MessageManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function sendMessage(
        int $senderId,
        int $receiverId,
        string $content
    ): bool
    {
        $query = $this->pdo->prepare(
            'INSERT INTO messages (sender_id, receiver_id, content)
             VALUES (:sender_id, :receiver_id, :content)'
        );

        return $query->execute([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'content' => $content
        ]);
    }

    public function getConversation(
        int $userId,
        int $otherUserId
    ): array
    {
        $query = $this->pdo->prepare(
            'SELECT * FROM messages
             WHERE
                (sender_id = :user_id
                 AND receiver_id = :other_user_id)
             OR
                (sender_id = :other_user_id
                 AND receiver_id = :user_id)
             ORDER BY created_at ASC'
        );

        $query->execute([
            'user_id' => $userId,
            'other_user_id' => $otherUserId
        ]);

        $messages = [];

        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $data) {
            $messages[] = $this->createMessage($data);
        }

        return $messages;
    }

public function getConversationUsers(int $userId): array
{
    $query = $this->pdo->prepare(
        'SELECT DISTINCT users.id, users.pseudo
         FROM users
         INNER JOIN messages
         ON users.id =
            CASE
                WHEN messages.sender_id = :user_id
                THEN messages.receiver_id
                ELSE messages.sender_id
            END
         WHERE messages.sender_id = :user_id
            OR messages.receiver_id = :user_id
         ORDER BY users.pseudo ASC'
    );

    $query->execute([
        'user_id' => $userId
    ]);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

    private function createMessage(array $data): Message
    {
        $message = new Message();

        $message->setId((int) $data['id']);
        $message->setSenderId((int) $data['sender_id']);
        $message->setReceiverId((int) $data['receiver_id']);
        $message->setContent($data['content']);
        $message->setCreatedAt($data['created_at']);
        $message->setReadAt($data['read_at']);

        return $message;
    }
}