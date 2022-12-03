<?php

namespace App\Core;

/**
 * filters data inputs
 */
class Securite
{
    /**
     * filters backslashes, whites spaces and converts specials characters to HTML entities of data inputs
     */
    public static function test_input($datas)
    {
        foreach ($datas as $key => $data) {
            $data_filtered = stripslashes(trim(htmlspecialchars($data)));
            $datas[$key] = $data_filtered;
        }
        return $datas;
    }
    /**
     * hashes a string and return it
     */
    public static function passwordHash($datas)
    {
        foreach ($datas as $key => $data) {
            if ($key === "password") {
                $password_hashed = password_hash($datas[$key], PASSWORD_DEFAULT);
                $datas["password"] = $password_hashed;
            }
        }

        return $datas;
    }
    /**
     * Check if data inputs are welformed otherwise return an errormessage
     */
    public static function formValidator($datas)
    {
        $data_filtered = self::test_input($datas);

        if (isset($data_filtered["name"])) {
            if (empty($data_filtered["name"])) {
                $message[] = "Name is required";
            } else {
                // check if firstname has only letters and whitespaces
                if (!preg_match("/^[a-zA-Z-' ]*$/", $data_filtered["name"])) {
                    $message[] = "Only letters and white space allowed for field name";
                }
            }
        }

        if (isset($data_filtered["firstname"])) {
            if (empty($data_filtered["firstname"])) {
                $message[] = "Firstname is required";
            } else {
                // check if firstname has only letters and whitespaces
                if (!preg_match("/^[\p{L}-]*$/u", $data_filtered["name"])) {
                    $message[] = "Only letters and white space allowed for field firstname";
                }
            }
        }

        if (isset($data_filtered["message"])) {
            // check if message is not empty
            if (empty($data_filtered["message"])) {
                $message[] = "A message is required";
            }
        }

        if (isset($data_filtered["content"])) {
            // check if a post is not empty
            if (empty($data_filtered["content"])) {
                $message[] = "A Post is required";
            }
        }

        if (isset($data_filtered["comment"])) {
            // check if a post is not empty
            if (empty($data_filtered["comment"])) {
                $message[] = "A Comment is required";
            }
        }

        if (isset($data_filtered["title"])) {
            // check if title is not empty
            if (empty($data_filtered["title"])) {
                $message[] = "A title is required";
            }
        }

        if (isset($data_filtered["chapo"])) {
            // check if title is not empty
            if (empty($data_filtered["chapo"])) {
                $message[] = "A chapo is required";
            }
        }

        if (isset($data_filtered["category"])) {
            // check if category is empty
            if (empty($data_filtered["category"])) {
                $message[] = "A category is required";
            }
        }

        if (isset($data_filtered["email"])) {
            if (empty($data_filtered["email"])) {
                $message[] = "Email is required";
            } else {;
                // check if e-mail address is well-formed
                if (!filter_var($data_filtered["email"], FILTER_VALIDATE_EMAIL)) {
                    $message[] = "Invalid email format";
                }
            }
        }

        if (isset($data_filtered["tel"])) {
            if (!empty($data_filtered["tel"])) {
                // check if phone number is well-formed
                if (!preg_match('`^0[1-9]([-. ]?[0-9]{2}){4}$`', $data_filtered["tel"])) {
                    $message[] = "Invalid tel format, follow the exemple";
                }
            } else {
                $message[] = "A Phone number is required";
            }
        }

        if (isset($data_filtered["password"])) {

            if (empty($data_filtered["password"])) {
                // check if password input is empty
                $message[] = "A password is required";
            }
        }

        if (isset($message)) {
            $feed_back = implode("<br>", $message);
        }

        return isset($feed_back) ? $feed_back : $data_filtered;
    }
    /**
     * Check for the presence of session variable
     */
    public static function isAdminConnected()
    {
        $session = Session::getAttribute("profile");
        return $session ? $session["is_admin"] : false;
    }
}