<?php
ini_set("display_errors", "1");
// session_start();
error_reporting(E_ALL);

require_once "Db.php";

class Notification extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function NewTestimonial()
    {
        $sql = "SELECT * FROM testimonials
        JOIN social_medias ON social_medias.id = testimonials.social_Id
        JOIN service ON service.id = testimonials.service_rendered
        WHERE testimonials.test_status = 'New'  LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function feedbackNotifications()
    {
        $sql = "SELECT * FROM test_notifications
            JOIN testimonials ON testimonials.id = test_notifications.testimony_id
            JOIN service ON service.id = testimonials.service_rendered
            WHERE testimonials.test_status = 'New'
            ORDER BY test_notifications.time DESC
            LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function messageNotifications()
    {
        $sql = "SELECT * FROM message_notification
            JOIN message ON message.id = message_notification.message_id
            JOIN service ON service.id = message.service_id
            JOIN country on country.idcountry = message.country_id
            ORDER BY message_notification.time DESC
            LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function mostRecentFeedback()
    {
        $sql = " SELECT * FROM message
            WHERE message.message_status = 'New'
            ORDER BY message.time DESC
            LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

// $newUser = new Message;
// $user = $newUser->Messages();

// echo "<pre>";
// print_r($user);
// echo "</pre>";
