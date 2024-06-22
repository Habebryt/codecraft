<?php
ini_set("display_errors", "1");
// session_start();
error_reporting(E_ALL);

require_once "Db.php";

class Testimonial extends Db
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

    public function updateFeedStatus($feedId, $status)
    {
        $sql = "UPDATE `testimonials` SET `test_status` = :status WHERE `id` = :feedId";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(['status' => $status, 'feedId' => $feedId]);
        if ($result) {
            return true;
        }
    }

    public function viewTestimony($testId)
    {
        $sql = "SELECT 
    t.id AS testimony_id,
    s.id AS service_id,
    t.*, 
    sm.*, 
    s.*
FROM 
    testimonials AS t
JOIN 
    social_medias AS sm ON sm.id = t.social_Id
JOIN 
    service AS s ON s.id = t.service_rendered
WHERE 
    t.id = ?
";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$testId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function MostRecentTest()
    {
        $sql = "SELECT 
    t.id AS testimony_id,
    s.id AS service_id,
    t.*, 
    sm.*, 
    s.*
FROM 
    testimonials AS t
JOIN 
    social_medias AS sm ON sm.id = t.social_Id
JOIN 
    service AS s ON s.id = t.service_rendered
WHERE 
    t.test_status = 'New'
ORDER BY 
    t.time DESC
LIMIT 3;
";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function Testimonials()
    {
        $sql = "SELECT 
    t.id AS testimony_id,
    s.id AS service_id,
    t.*, 
    sm.*, 
    s.*
FROM 
    testimonials AS t
JOIN 
    social_medias AS sm ON sm.id = t.social_Id
JOIN 
    service AS s ON s.id = t.service_rendered";
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
}

// $newUser = new Testimonial;
// $user = $newUser->updateFeedStatus(1, "Seen");

// echo "<pre>";
// print_r($user);
// echo "</pre>";
