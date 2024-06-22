<?php
class Utilities
{
    public static function firstName($firstName)
    {
        $cleanFirstName = trim($firstName);
        $cleanFirstName = strip_tags($cleanFirstName);
        $cleanFirstName = addslashes($cleanFirstName);
        $cleanFirstName = htmlentities($cleanFirstName);
        return $cleanFirstName;
    }

    public static function lastName($lastName)
    {
        $cleanLastName = trim($lastName);
        $cleanLastName = strip_tags($cleanLastName);
        $cleanLastName = addslashes($cleanLastName);
        $cleanLastName = htmlentities($cleanLastName);
        return $cleanLastName;
    }

    public static function email($email)
    {
        $cleanEmail = trim($email);
        $cleanEmail = filter_var($cleanEmail, FILTER_SANITIZE_EMAIL);
        return $cleanEmail;
    }

    public static function phone($phone)
    {
        $cleanPhone = trim($phone);
        $cleanPhone = preg_replace('/[^0-9]/', '', $cleanPhone);
        return $cleanPhone;
    }

    // public static function convertTimestamp($timestamp)
    // {
    //     $datetime = new DateTime($timestamp);
    //     return $datetime->format('h:i A - M d, Y');
    // }

    public static function convertTimestamp($timestamp)
    {
        // Get server's default timezone
        $server_timezone = date_default_timezone_get();

        // Create DateTime object with the provided timestamp and set timezone
        $datetime = new DateTime($timestamp);
        $datetime->setTimezone(new DateTimeZone($server_timezone));

        // Format the datetime according to your preference
        return $datetime->format('h:i A - M d, Y');
    }

    // public static function timeSince($timestamp)
    // {
    //     $pastTime = new DateTime($timestamp);

    //     $currentTime = new DateTime();

    //     $interval = $currentTime->diff($pastTime);

    //     if ($interval->y > 0) {
    //         return $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->m > 0) {
    //         return $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->d >= 7) {
    //         $weeks = floor($interval->d / 7);
    //         return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->d > 0) {
    //         return $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->h > 0) {
    //         return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->i > 0) {
    //         return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->s > 0) {
    //         return $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' ago';
    //     }
    //     return 'just now';
    // }

    // public static function timeSince($timestamp)
    // {
    //     $server_timezone = date_default_timezone_get();

    //     $pastTime = new DateTime($timestamp, new DateTimeZone($server_timezone));
    //     $currentTime = new DateTime('now', new DateTimeZone($server_timezone));

    //     $interval = $currentTime->diff($pastTime);

    //     if ($interval->y > 0) {
    //         return $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->m > 0) {
    //         return $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->d >= 7) {
    //         $weeks = floor($interval->d / 7);
    //         return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->d > 0) {
    //         return $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->h > 0) {
    //         return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->i > 0) {
    //         return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
    //     }
    //     if ($interval->s > 0) {
    //         return $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' ago';
    //     }
    //     return 'just now';
    // }
    public static function timeSince($timestamp)
    {
        $pastTime = new DateTime($timestamp);

        $currentTime = new DateTime('now');

        $user_timezone = new DateTimeZone(date_default_timezone_get());

        $pastTime->setTimezone($user_timezone);
        $currentTime->setTimezone($user_timezone);

        $interval = $currentTime->diff($pastTime);

        if ($interval->y > 0) {
            return $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
        }
        if ($interval->m > 0) {
            return $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
        }
        if ($interval->d >= 7) {
            $weeks = floor($interval->d / 7);
            return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
        }
        if ($interval->d > 0) {
            return $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
        }
        if ($interval->h > 0) {
            return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
        }
        if ($interval->i > 0) {
            return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
        }
        if ($interval->s > 0) {
            return $interval->s . ' second' . ($interval->s > 1 ? 's' : '') . ' ago';
        }
        return 'just now';
    }

    public static function limitMessage($message, $limit = 30)
    {
        $message = trim($message);
        if (strlen($message) <= $limit) {
            return $message;
        }
        $truncated = substr($message, 0, $limit);
        $lastSpace = strrpos($truncated, ' ');
        if ($lastSpace !== false) {
            $truncated = substr($truncated, 0, $lastSpace);
        }
        return $truncated . '...';
    }

    public static function limitMessageAll($message, $limit = 50)
    {
        $message = trim($message);
        if (strlen($message) <= $limit) {
            return $message;
        }
        $truncated = substr($message, 0, $limit);
        $lastSpace = strrpos($truncated, ' ');
        if ($lastSpace !== false) {
            $truncated = substr($truncated, 0, $lastSpace);
        }
        return $truncated . '...';
    }

    public static function message($message)
    {
        $message = trim($message);
        $message = htmlspecialchars($message);
        return $message;
    }


    public static function cleanPhoneNumber($phoneNumber)
    {
        $cleanedNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        return $cleanedNumber;
    }

    public static function decodeMessage($encodedMessage)
    {
        return htmlspecialchars_decode($encodedMessage);
    }

    public static function fullName($fullName)
    {
        $cleanFullName = trim($fullName);
        $cleanFullName = strip_tags($cleanFullName);
        $cleanFullName = addslashes($cleanFullName);
        $cleanFullName = htmlentities($cleanFullName);
        return $cleanFullName;
    }
}
