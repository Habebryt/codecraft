<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "Db.php";

class Project extends Db
{
    private $dbconn;

    public function __construct()
    {
        $this->dbconn = $this->connect();
    }

    public function Projects()
    {
        $sql = "SELECT * FROM project JOIN clients AS dclient ON dclient.clientid = project.project_client JOIN client_category AS clientCategory ON clientCategory.cateid = dclient.category JOIN country AS clientCountry ON clientCountry.idcountry = dclient.country JOIN service AS clientService ON clientService.id = dclient.service_rendered";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ProjectDetails($id)
    {
        $sql = "SELECT * FROM project JOIN clients AS dclient ON dclient.clientid = project.project_client JOIN client_category AS clientCategory ON clientCategory.cateid = dclient.category JOIN country AS clientCountry ON clientCountry.idcountry = dclient.country JOIN service AS clientService ON clientService.id = dclient.service_rendered WHERE projectid = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function allProjects()
    {
        $sql = "SELECT * FROM project JOIN clients ON clients.clientid = project_client";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function clientProjects($id)
    {
        $sql = "SELECT * FROM project JOIN clients ON clients.clientid = project_client WHERE project.project_client = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function newProjects()
    {
        $sql = "SELECT * FROM project JOIN clients ON clients.clientid = project_client WHERE project.pro_status = 'New' LIMIT 5";
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
}


// $client = new Project;
// $addClient = $client->allProjects();

// echo "<pre>";
// print_r($addClient);
// echo "</pre>";
