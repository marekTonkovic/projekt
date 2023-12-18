<?php

namespace lib;

class DB
{
    private $host = "localhost";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $dbName = "stone";

    private \PDO $connection;

    public function __construct(
        string $host = "",
        int $port = 3306,
        string $username = "",
        string $password = "",
        string $dbName = ""
    ) {
        if (!empty($host)) {
            $this->host = $host;
        }

        if (!empty($port)) {
            $this->port = $port;
        }

        if (!empty($username)) {
            $this->username = $username;
        }

        if (!empty($password)) {
            $this->password = $password;
        }

        if (!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            $this->connection = new \PDO(
                "mysql:host=$this->host;dbname=$this->dbName;charset=utf8mb4",
                $this->username,
                $this->password
            );
            // set the PDO error mode to exception
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }




    public function getItems(): array
    {
        $sql = "SELECT id, name, img,category FROM productss";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function getItemsByID(int $id): array
    {
        $sql = "SELECT * FROM productss WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }



    public function insertItem(string $name, string $category): bool
    {
        $sql = "INSERT INTO productss(name, category) VALUE ('" . $name . "', '"  . $category . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }




    public function deleteItem(int $id): bool
    {
        $sql = "DELETE FROM productss WHERE id = " . $id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateItem(int $id = NULL, string $name = "",  string $category = ""): bool
    {
        $sql = "UPDATE productss SET";

        if (!empty($name)) {
            $sql .= " name = '" . $name . "'";
        }

        if (!empty($category)) {
            $sql .= ", category = '" . $category . "'";
        }

        $sql .= " WHERE id = " . $id;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }
    public function getMenuItem(int $id): array
    {
        $sql = "SELECT * FROM productss WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }





    public function getItemsByCategory(string $category): array
    {
        $category = $this->connection->quote($category);
        $sql = "SELECT * FROM products WHERE category = $category";
        $query = $this->connection->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
