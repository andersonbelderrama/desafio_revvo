<?php

namespace App\Traits;

trait SessionTrait
{
    public function getSessionError()
    {
        session_start();
        $error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
        unset($_SESSION['error']);
        return $error;
    }

    public function getSessionSuccess()
    {
        session_start();
        $success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        unset($_SESSION['success']);
        return $success;
    }

    public function setSessionError($message)
    {
        session_start();
        $_SESSION['error'] = $message;
    }

    public function setSessionSuccess($message)
    {
        session_start();
        $_SESSION['success'] = $message;
    }
}