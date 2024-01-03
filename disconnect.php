<?php
    // Destroy the session and redirect to the Index page.
    session_start();
    session_destroy();
    header('Location: index.html');
?>
