<?php
ini_set("display_errors", "1");
// session_start();
error_reporting(E_ALL);

require_once "Db.php";

class Message extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function NewMessages()
    {
        $sql = "SELECT 
    message.id, 
    message.fullname, 
    message.email, 
    message.phone, 
    message.message, 
    message.message_status, 
    message.country_id, 
    message.service_id, 
    message.time, 
    country.country_name, 
    service.service_name
FROM 
    message 
JOIN 
    country ON country.idcountry = message.country_id 
JOIN 
    service ON service.id = message.service_id WHERE message.message_status = 'New'";;
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

    public function RespondedMessages()
    {
        $sql = "SELECT * FROM message
        JOIN country ON country.idcountry = message.country_id
        JOIN service ON service.id = message.service_id
        WHERE message.message_status = 'Responded'";;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function MostRecentMessages()
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

    public function Messages()
    {
        $sql = "SELECT 
    message.id, 
    message.fullname, 
    message.email, 
    message.phone, 
    message.message, 
    message.message_status, 
    message.country_id, 
    message.service_id, 
    message.time, 
    country.country_name, 
    service.service_name
FROM 
    message 
JOIN 
    country ON country.idcountry = message.country_id 
JOIN 
    service ON service.id = message.service_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function codeCraft()
    {
        $sql = "SELECT * FROM profile WHERE id = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function socials()
    {
        $sql = "SELECT * FROM socials WHERE status = 'Active'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function topTestimonial()
    {
        $sql = "SELECT * FROM testimonials WHERE rating >=4";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function allTestimonial()
    {
        $sql = "SELECT * FROM testimonials";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function clientsSocials()
    {
        $sql = "SELECT * FROM social_medias WHERE status = 'Active'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function countries()
    {
        $sql = "SELECT * FROM country";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function viewMessage($msgId)
    {
        $sql = "SELECT 
    message.id, 
    message.fullname, 
    message.email, 
    message.phone, 
    message.message, 
    message.message_status, 
    message.country_id, 
    message.service_id, 
    message.time, 
    country.country_name, 
    service.service_name
FROM 
    message 
JOIN 
    country ON country.idcountry = message.country_id 
JOIN 
    service ON service.id = message.service_id WHERE message.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$msgId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateMsgStatus($msgId, $status)
    {
        $sql = "UPDATE `message` SET `message_status` = :status WHERE `id` = :msgId";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(['status' => $status, 'msgId' => $msgId]);
        if ($result) {
            return true;
        }
    }

    public function updateMsgNotificationStatus($msgId, $status)
    {
        $sql = "UPDATE `message_notification` SET `notification_status` = :status WHERE `message_id` = :msgId";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(['status' => $status, 'msgId' => $msgId]);
        return $result;
    }
}



// $newUser = new Message;
// $user = $newUser->updateMsgNotificationStatus(51, "New");

// echo "<pre>";
// print_r($user);
// echo "</pre>";
