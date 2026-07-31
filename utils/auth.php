<?php

function startSecureSession() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    session_set_cookie_params(array(
        'httponly' => true,
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'samesite' => 'Lax'
    ));
    session_start();
}

function rejectRequest($status, $message) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($message);
    exit();
}

function requireAuthenticated() {
    startSecureSession();
    if (empty($_SESSION['u'])) {
        rejectRequest(401, 'Authentication required.');
    }
    return $_SESSION['u'];
}

function requireAdmin() {
    $username = requireAuthenticated();
    if ($username !== 'admin') {
        rejectRequest(403, 'Administrator access required.');
    }
    return $username;
}

function requireSameOriginPost() {
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
        rejectRequest(405, 'POST required.');
    }

    $source = $_SERVER['HTTP_ORIGIN'] ?? ($_SERVER['HTTP_REFERER'] ?? '');
    $sourceHost = parse_url($source, PHP_URL_HOST);
    $requestHost = explode(':', $_SERVER['HTTP_HOST'] ?? '')[0];
    if (!$sourceHost || !$requestHost || !hash_equals(strtolower($requestHost), strtolower($sourceHost))) {
        rejectRequest(403, 'Cross-site request rejected.');
    }
}

function requireAuthenticatedMutation() {
    requireSameOriginPost();
    return requireAuthenticated();
}

function requireAdminMutation() {
    requireSameOriginPost();
    return requireAdmin();
}
