<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

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

    public function allClients()
    {
        $sql = "SELECT * FROM clients
        JOIN country ON clients.country = country.idcountry
        JOIN client_category ON clients.category = client_category.cateid
        JOIN service ON clients.service_rendered = service.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function clientById($id)
    {
        $sql = "SELECT * FROM clients
        JOIN country ON clients.country = country.idcountry
        JOIN client_category ON clients.category = client_category.cateid
        JOIN service ON clients.service_rendered = service.id WHERE clients.clientid = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ClientProjects($clientId)
    {
        $sql = "SELECT * FROM project JOIN clients AS dclient ON dclient.clientid = project.project_client JOIN client_category AS clientCategory ON clientCategory.cateid = dclient.category JOIN country AS clientCountry ON clientCountry.idcountry = dclient.country JOIN service AS clientService ON clientService.id = dclient.service_rendered WHERE project_client = 2;
";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$clientId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addClient($fullname, $email, $phone, $country, $category, $service, $company, $website)
    {
        $sql = "INSERT INTO clients (fullname, email, phone, country, category, service_rendered, company_name, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $result =  $stmt->execute([$fullname, $email, $phone, $country, $category, $service, $company, $website]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function codeCraft()
    {
        $sql = "SELECT * FROM profile WHERE id = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function country()
    {
        $sql = "SELECT * FROM country";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function category()
    {
        $sql = "SELECT * FROM client_category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function services()
    {
        $sql = "SELECT * FROM service";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

$client = new Client;
// $addClient = $client->allClients();

// echo "<pre>";
// print_r($addClient);
// echo "</pre>";
