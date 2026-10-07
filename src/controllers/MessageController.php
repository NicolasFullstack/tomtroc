<?php

require_once __DIR__ . '/../models/MessageManager.php';
require_once __DIR__ . '/../models/UserManager.php';

class MessageController
{
    private MessageManager $messageManager;
    private UserManager $userManager;

    public function __construct(PDO $pdo)
    {
        $this->messageManager = new MessageManager($pdo);
        $this->userManager = new UserManager($pdo);
    }

    public function conversation(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $userId = (int) $_SESSION['user_id'];
        $otherUserId = (int) ($_GET['user'] ?? 0);

        if ($otherUserId === 0 || $otherUserId === $userId) {
            header('Location: index.php');
            exit;
        }

        $otherUser = $this->userManager->getUserById($otherUserId);

        if ($otherUser === null) {
            header('Location: index.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $content = trim($_POST['content'] ?? '');

            if ($content !== '') {
                $this->messageManager->sendMessage(
                    $userId,
                    $otherUserId,
                    $content
                );

                header(
                    'Location: index.php?page=messages&user=' . $otherUserId
                );
                exit;
            }
        }

        $messages = $this->messageManager->getConversation(
            $userId,
            $otherUserId
        );

        require __DIR__ . '/../views/messages.php';
    }

public function inbox(): void
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?page=login');
        exit;
    }

    $users = $this->messageManager->getConversationUsers(
        (int) $_SESSION['user_id']
    );

    require __DIR__ . '/../views/inbox.php';
}

}