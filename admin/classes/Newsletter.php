<?php
ini_set("display_errors", "1");
// session_start();
error_reporting(E_ALL);

require_once "Db.php";

class Newsletter extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function ActiveSubscribers()
    {
        $sql = "SELECT * FROM newsletter WHERE status = 'Active'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function InActiveSubscribers()
    {
        $sql = "SELECT * FROM newsletter WHERE status = 'Inactive'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateSubStatus($subId, $status)
    {
        $sql = "UPDATE `newsletter` SET `status` = :status WHERE `id` = :subId";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(['status' => $status, 'subId' => $subId]);
        if ($result) {
            return true;
        }
    }

    public function feedbackNotifications()
    {
        $sql = "SELECT * FROM test_notifications
            JOIN testimonials ON testimonials.id = test_notifications.testimony_id
            JOIN service ON service.id = testimonials.service_rendered
            ORDER BY test_notifications.time DESC
            LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function mostRecentSubscriber()
    {
        $sql = "SELECT * FROM news_notification
            JOIN newsletter ON news_notification.newsletter_id = newsletter.id
            ORDER BY news_notification.time DESC
            LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ActiveMessages()
    {
        $sql = "SELECT * FROM message
        JOIN country ON country.idcountry = message.country_id
        JOIN service ON service.id = message.service_id
        WHERE message.message_status = 'Active'";;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function Subscribers()
    {
        $sql = "SELECT * FROM newsletter";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function viewSubscribers($subId)
    {
        $sql = "SELECT * FROM newsletter WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$subId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

// $newUser = new Newsletter;
// $id = 1;
// $status = "Inactive";
// $user = $newUser->updateSubStatus($id, $status);

// echo "<pre>";
// print_r($user);
// echo "</pre>";
