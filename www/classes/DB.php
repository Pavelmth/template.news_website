<?php

class DB {
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=gallery;host=localhost', 'root', '');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $param=[]) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($param);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $param=[]) {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($param);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}