<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

require_once "Db.php";

class Client extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function Clients()
    {
        $sql = "SELECT * FROM clients";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function AllProjects()
    {
        $sql = "SELECT * FROM project";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function AllMessages()
    {
        $sql = "SELECT * FROM message WHERE message_status ='New'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function services()
    {
        $sql = "SELECT * FROM service WHERE status = 'Active'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function projects()
    {
        $sql = "SELECT * FROM myproject WHERE status = 'Publish'";
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
        $sql = "SELECT * FROM testimonials WHERE rating >=4 LIMIT 9";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function allTestimonial()
    {
        $sql = "SELECT * FROM testimonials LIMIT 10";
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

    // public function contactMe($fullname, $email, $phone, $message, $country, $service)
    // {
    //     try {
    //         $this->conn->beginTransaction();
    //         $sql = "INSERT INTO message (fullname, email, phone, message, country_id, service_id) VALUES (:fullname, :email, :phone, :message, :country, :service)";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':fullname', $fullname);
    //         $stmt->bindParam(':email', $email);
    //         $stmt->bindParam(':phone', $phone);
    //         $stmt->bindParam(':message', $message);
    //         $stmt->bindParam(':country', $country);
    //         $stmt->bindParam(':service', $service);
    //         $result = $stmt->execute();
    //         if ($result) {
    //             $msgId = $this->conn->lastInsertId();
    //             $sql = "INSERT INTO message_notification (message_id) VALUES (:msgId)";
    //             $stmt = $this->conn->prepare($sql);
    //             $stmt->bindParam(':msgId', $msgId);
    //             $stmt->execute();
    //             $msg = $stmt->fetch(PDO::FETCH_ASSOC);
    //             $this->conn->commit();
    //             return true;
    //         } else {
    //             $this->conn->rollBack();
    //             return false;
    //         }
    //     } catch (PDOException $p) {
    //         $this->conn->rollBack();
    //         return false;
    //     } catch (Exception $e) {
    //         $this->conn->rollBack();
    //         return false;
    //     }
    // }



    public function contactMe($fullname, $email, $phone, $msg, $country, $service)
    {
        try {
           // $this->conn->beginTransaction();
            $sql = "INSERT INTO message (fullname, email, phone, message, country_id, service_id) VALUES (:fullname, :email, :phone, :message, :country, :service)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':message', $msg);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':service', $service);
            $result = $stmt->execute();
            if ($result) {
                $msgId = $this->conn->lastInsertId();
                $sql = "INSERT INTO message_notification (message_id) VALUES (:msgId)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':msgId', $msgId);
                $stmt->execute();
                //$msg = $stmt->fetch(PDO::FETCH_ASSOC);
             //   $this->conn->commit();
                return true;
            } else {
                //$this->conn->rollBack();
                return false;
            }
        } catch (PDOException $p) {
            if ($p->getCode() == '23000' && strpos($p->getMessage(), '1062') !== false) {
                $feedback = "Duplicate entry error: The contact message already exists.";
                return json_encode($feedback);
            } else {
             //   $this->conn->rollBack();
                return false;
            }
        } catch (Exception $e) {
            // Handle other exceptions
          //  $this->conn->rollBack();
            return false;
        }
    }

    public function feedback($fullname, $social_id, $social_handle, $email, $company, $project, $service, $message, $rating)
    {
        try {
            $this->conn->beginTransaction();
            $sql = "INSERT INTO testimonials 
            (fullname, social_Id, social_handle, email, company, project, service_rendered, message,  rating)
            VALUES (:fullname, :social_id, :social_handle, :email, :company, :project, :service, :message, :rating)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':social_id', $social_id);
            $stmt->bindParam(':social_handle', $social_handle);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':project', $project);
            $stmt->bindParam(':service', $service);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':rating', $rating);
            $result = $stmt->execute();
            if ($result) {
                $testId = $this->conn->lastInsertId();
                $sql = "INSERT INTO test_notifications (testimony_id) VALUES (:testId)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':testId', $testId);
                $stmt->execute();
                $test = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->conn->commit();
                return true;
            } else {
                $this->conn->rollBack();
                $feedback = "Failed to send Feedback. Please try again.";
                return $feedback;
            }
        } catch (PDOException $p) {
            $feedback = $p->getMessage();
            $this->conn->rollBack();

            return $feedback;
        } catch (Exception $e) {
            $feedback = $e->getMessage();
            $this->conn->rollBack();

            return $feedback;
        }
    }

    public function newsletter($firstname, $lastname, $email, $subscriberCode)
    {
        try {
            $this->conn->beginTransaction();
            $sql = "INSERT INTO newsletter (firstname, lastname, email, unsubscribe_code) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$firstname, $lastname, $email, $subscriberCode]);
            if ($result == true) {
                $newsId = $this->conn->lastInsertId();
                $sql = "INSERT INTO news_notification (newsletter_id) VALUES (:newsId)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':newsId', $newsId);
                $stmt->execute();
                $this->conn->commit();
                return "Subscription to CodeCraft is Successful.";
            } else {
                $this->conn->rollBack();
                $feedback = "Failed to register trial user. Please try again.";
                return $feedback;
            }
        } catch (PDOException $p) {
            $feedback = $p->getMessage();
            $this->conn->rollBack();
            return $feedback;
        } catch (Exception $e) {
            $feedback = $e->getMessage();
            $this->conn->rollBack();
            return $feedback;
        }
    }
}
