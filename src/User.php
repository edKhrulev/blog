<?php

class User
{
    public function __construct($name, $pwd = '', $cont = '')
    {
        $this->name = $name;
        $this->password = $pwd;
        $this->content = $cont;

        $driver = Config::$conf['db']['driver'];
        $host = Config::$conf['db']['host'];
        $name = Config::$conf['db']['name'];
        $password = Config::$conf['db']['password'];
        $dbname = Config::$conf['db']['dbname'];

        $this->db = new PDO("{$driver}:host={$host};dbname={$dbname}", $name, $password);

    }

    public function save()
    {
      $this->db->query("INSERT INTO users(name, password) VALUES ('{$this->name}', '{$this->password}')");
    }

    public function getUserByLogin()
    {
       $stmt = $this->db->query("SELECT * FROM users WHERE name = '{$this->name}'");
       return $stmt->fetchAll();
    }

    public function saveListController($userId)
    {
        $userId = (int)$userId;
        $this->db->query("INSERT INTO contents(message, userId) VALUES ('{$this->content}', '{$userId}')");
    }

    public function showUserContent()
    {
        $showCont = $this->db->query("SELECT message, name FROM contents JOIN users WHERE contents.userId = users.id");
        return $showCont->fetchAll();
    }
}

