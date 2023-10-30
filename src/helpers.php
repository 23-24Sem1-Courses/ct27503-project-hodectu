<?php

function redirect(string $location): void
{
    header("Location: $location", true, 302);
    exit;
}

function JsonResponse($error, $message)
{
    echo json_encode([
        "error" => $error,
        "message" => $message
    ]);
    exit;
}

function isAdmin()
{
    return (int)$_SESSION['is_admin'] === 1;
}
