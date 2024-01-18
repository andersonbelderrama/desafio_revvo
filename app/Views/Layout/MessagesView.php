<?php

    if (isset($_SESSION['error'])) {
        echo '<div id="errorMessage" class="error-message">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo '<div id="successMessage" class="success-message">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
    }

?>