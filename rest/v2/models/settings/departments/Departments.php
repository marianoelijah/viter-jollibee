<?php

class Departments
{
  public $departments_aid;
  public $departments_is_active;
  public $departments_name;
  public $departments_datetime;
  public $departments_created;

  public $connection;
  public $lastInsertedId;
  public $departments_start;
  public $departments_total;
  public $departments_search;

  public $tblDepartments;

  public function __construct($db)
  {
    $this->connection = $db;
    $this->tblDepartments = "lcss_departments";
  }

  public function readAll()
  {
    try {
      $sql = "select * from {$this->tblDepartments} ";
      $sql .= "order by departments_is_active desc, ";
      $sql .= "departments_aid asc ";
      $query = $this->connection->query($sql);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function readLimit()
  {
    try {
      $sql = "select * from {$this->tblDepartments} ";
      $sql .= "order by departments_is_active desc, ";
      $sql .= "departments_aid asc ";
      $sql .= "limit :start, ";
      $sql .= ":total ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "start" => $this->departments_start - 1,
        "total" => $this->departments_total,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
  public function readById()
  {
    try {
      $sql = "select * from {$this->tblDepartments} ";
      $sql .= "where departments_aid = :departments_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "departments_aid" => $this->departments_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function create()
  {
    try {
      $sql = "insert into {$this->tblDepartments} ";
      $sql .= "(departments_is_active, ";
      $sql .= "departments_name, ";
      $sql .= "departments_created, ";
      $sql .= "departments_datetime ) values ( ";
      $sql .= ":departments_is_active, ";
      $sql .= ":departments_name, ";
      $sql .= ":departments_created, ";
      $sql .= ":departments_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "departments_is_active" => $this->departments_is_active,
        "departments_name" => $this->departments_name,
        "departments_datetime" => $this->departments_datetime,
        "departments_created" => $this->departments_created,

      ]);
      $this->lastInsertedId = $this->connection->lastInsertId();
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function checkName()
  {
    try {
      $sql = "select departments_name from {$this->tblDepartments} ";
      $sql .= "where departments_name = :departments_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "departments_name" => "{$this->departments_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblDepartments} set ";
      $sql .= "departments_name = :departments_name, ";
      $sql .= "departments_datetime = :departments_datetime ";
      $sql .= "where departments_aid  = :departments_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "departments_name" => $this->departments_name,
        "departments_datetime" => $this->departments_datetime,
        "departments_aid" => $this->departments_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblDepartments} ";
      $sql .= "where departments_aid = :departments_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "departments_aid" => $this->departments_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
  {
    try {
      $sql = "update {$this->tblDepartments} set ";
      $sql .= "departments_is_active = :departments_is_active, ";
      $sql .= "departments_datetime = :departments_datetime ";
      $sql .= "where departments_aid  = :departments_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "departments_is_active" => $this->departments_is_active,
        "departments_datetime" => $this->departments_datetime,
        "departments_aid" => $this->departments_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function search()
  {
    try {
      $sql = "select * ";
      $sql .= "from {$this->tblDepartments} ";
      $sql .= "where departments_name like :departments_name ";
      $sql .= "order by departments_is_active desc, ";
      $sql .= "departments_aid asc ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "departments_name" => "%{$this->departments_search}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
}
