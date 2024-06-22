<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "Db.php";

class User extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function loginUser($email, $password)
    {
        try {

            $sql = "SELECT * FROM admin WHERE email=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {

                if (password_verify($password, $result['password'])) {

                    $_SESSION['adminonline'] = $result['id'];
                    $_SESSION['adminonline'] = $result;
                    return 1;
                } else {
                    return 2;
                }
            } else {
                return 3;
            }
        } catch (PDOException $e) {
            $_SESSION['admin_errormsg'] = $e->getMessage();
            return 0;
        } catch (Exception $e) {
            $_SESSION['admin_errormsg'] = $e->getMessage();
            return 0;
        }
    }

    public function profileUpdate()
    {
        return "UnityDocs User profile updated Successfully";
    }

    public function logoutAdmin()
    {
        session_unset();
        session_destroy();
    }
}
