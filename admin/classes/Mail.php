<?php
ini_set("display_errors", "1");
// session_start();
error_reporting(E_ALL);

require_once "Db.php";

class Email extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }
    
    public function clientEmail($sender, $receiver, $email, $subject, $message, $document){
        $sql = "INSERT into clientMails (sender, receiver, receiver_email, subject, message, document) VALUES (?, ?, ?,?,?,?)";
        $stmt = $this->dbconn->prepare($sql);
        $result = $stmt->execute([$sender, $receiver, $email, $subject, $message, $document]);
        return $result;
    }

}