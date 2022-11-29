<?php

namespace App\Core;

use App\Core\SESSION;
/**
 * Encapsulates the alert message in a session variable
 */
class Toolbox
{
    public const RED_COLOR = "alert-danger";
    public const ORANGE_COLOR = "alert-warning";
    public const GREEN_COLOR = "alert-success";
    /**
     * Add an alert message in a session variable
     * @param string $message Alert message
     * @param string $type alert message color
     */
    public static function addAlertMessage($message,$type){
        Session::setAttribute("alert", [
            "message" => $message,
            "type" => $type
        ]);
    }
}