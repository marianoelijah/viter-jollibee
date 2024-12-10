<?php

class JobTitle
{
  public $joblevel_aid;
  public $joblevel_is_active;
  public $joblevel_name;
  public $joblevel_datetime;
  public $joblevel_created;

  public $jobtitle_aid;
  public $jobtitle_is_active;
  public $jobtitle_joblevel_id;
  public $jobtitle_name;
  public $jobtitle_datetime;
  public $jobtitle_created;

  public $connection;
  public $lastInsertedId;
  public $joblevel_start;
  public $joblevel_total;
  public $joblevel_search;
  public $jobtitle_start;
  public $jobtitle_total;
  public $jobtitle_search;

  public $tblJobLevel;
  public $tblJobTitle;

  public function __construct($db)
  {
    $this->connection = $db;
    $this->tblJobLevel = "lcss_joblevel";
    $this->tblJobTitle = "lcss_jobtitle";
  }


  public function readAll()
  {
    try {
      $sql = "select *  ";
      $sql .= "from {$this->tblJobLevel} as JobLevel, ";
      $sql .= " {$this->tblJobTitle} as JobTitle ";
      $sql .= "where JobLevel.joblevel_aid = JobTitle.jobtitle_joblevel_id ";
      $sql .= "order by JobTitle.jobtitle_is_active desc, ";
      $sql .= "JobTitle.jobtitle_name asc ";
      $query = $this->connection->query($sql);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function readLimit()
  {
    try {
      $sql = "select *  ";
      $sql .= "from {$this->tblJobLevel} as JobLevel, ";
      $sql .= " {$this->tblJobTitle} as JobTitle ";
      $sql .= "where JobLevel.joblevel_aid = JobTitle.jobtitle_joblevel_id ";
      $sql .= "order by JobTitle.jobtitle_is_active desc, ";
      $sql .= "JobTitle.jobtitle_aid asc ";
      $sql .= "limit :start, ";
      $sql .= ":total ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "start" => $this->jobtitle_start - 1,
        "total" => $this->jobtitle_total,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
  public function readById()
  {
    try {
      $sql = "select * from {$this->tblJobTitle} ";
      $sql .= "where jobtitle_aid = :jobtitle_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_aid" => $this->jobtitle_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function create()
  {
    try {
      $sql = "insert into {$this->tblJobTitle} ";
      $sql .= "(jobtitle_is_active, ";
      $sql .= "jobtitle_joblevel_id, ";
      $sql .= "jobtitle_name, ";
      $sql .= "jobtitle_created, ";
      $sql .= "jobtitle_datetime ) values ( ";
      $sql .= ":jobtitle_is_active, ";
      $sql .= ":jobtitle_joblevel_id, ";
      $sql .= ":jobtitle_name, ";
      $sql .= ":jobtitle_created, ";
      $sql .= ":jobtitle_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_is_active" => $this->jobtitle_is_active,
        "jobtitle_joblevel_id" => $this->jobtitle_joblevel_id,
        "jobtitle_name" => $this->jobtitle_name,
        "jobtitle_datetime" => $this->jobtitle_datetime,
        "jobtitle_created" => $this->jobtitle_created,

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
      $sql = "select jobtitle_name from {$this->tblJobTitle} ";
      $sql .= "where jobtitle_name = :jobtitle_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_name" => "{$this->jobtitle_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblJobTitle} set ";
      $sql .= "jobtitle_name = :jobtitle_name, ";
      $sql .= "jobtitle_joblevel_id = :jobtitle_joblevel_id, ";
      $sql .= "jobtitle_datetime = :jobtitle_datetime ";
      $sql .= "where jobtitle_aid  = :jobtitle_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_name" => $this->jobtitle_name,
        "jobtitle_joblevel_id" => $this->jobtitle_joblevel_id,
        "jobtitle_datetime" => $this->jobtitle_datetime,
        "jobtitle_aid" => $this->jobtitle_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function delete()
  {
    try {
      $sql = "delete from {$this->tblJobTitle} ";
      $sql .= "where jobtitle_aid = :jobtitle_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_aid" => $this->jobtitle_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
  {
    try {
      $sql = "update {$this->tblJobTitle} set ";
      $sql .= "jobtitle_is_active = :jobtitle_is_active, ";

      $sql .= "jobtitle_datetime = :jobtitle_datetime ";
      $sql .= "where jobtitle_aid  = :jobtitle_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_is_active" => $this->jobtitle_is_active,

        "jobtitle_datetime" => $this->jobtitle_datetime,
        "jobtitle_aid" => $this->jobtitle_aid,
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
      $sql .= "from {$this->tblJobTitle} ";
      $sql .= "where jobtitle_name like :jobtitle_name ";
      $sql .= "order by jobtitle_is_active desc, ";
      $sql .= "jobtitle_aid asc ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_name" => "%{$this->jobtitle_search}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
  public function filterByStatusAndSearch()
  {
    try {
      $sql = "select ";
      $sql .= "* ";
      $sql .= "from {$this->tblJobTitle} ";
      $sql .= "where jobtitle_is_active = :jobtitle_is_active ";
      $sql .= "and (jobtitle_name like :jobtitle_name ";
      $sql .= ") ";
      $sql .= "order by jobtitle_is_active desc, ";
      $sql .= "jobtitle_name asc ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_name" => "%{$this->jobtitle_search}%",
        "jobtitle_is_active" => $this->jobtitle_is_active,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function filterByStatus()
  {
    try {
      $sql = "select ";
      $sql .= "* ";
      $sql .= "from {$this->tblJobTitle} ";
      $sql .= "where jobtitle_is_active = :jobtitle_is_active ";
      $sql .= "order by jobtitle_name asc ";

      $query = $this->connection->prepare($sql);
      $query->execute([
        "jobtitle_is_active" => $this->jobtitle_is_active,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
}
