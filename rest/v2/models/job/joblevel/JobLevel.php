<?php

class JobLevel
{
    public $joblevel_aid;
    public $joblevel_is_active;
    public $joblevel_name;
    public $joblevel_datetime;
    public $joblevel_created;

    public $connection;
    public $lastInsertedId;
    public $joblevel_start;
    public $joblevel_total;
    public $joblevel_search;

    public $tblJobLevel;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblJobLevel = "lcss_joblevel";
        
    }

    public function readAll()
      {
        try {
          $sql = "select * from {$this->tblJobLevel} ";
          $sql .= "order by joblevel_is_active desc, ";
          $sql .= "joblevel_aid asc ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }

      public function readLimit()
      {
        try {
          $sql = "select * from {$this->tblJobLevel} ";
          $sql .= "order by joblevel_is_active desc, ";
          $sql .= "joblevel_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->joblevel_start - 1,
              "total" => $this->joblevel_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblJobLevel} ";
              $sql .= "where joblevel_aid = :joblevel_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "joblevel_aid" => $this->joblevel_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }

      public function create()
  {
    try {
      $sql = "insert into {$this->tblJobLevel} ";
      $sql .= "(joblevel_is_active, ";
      $sql .= "joblevel_name, ";
      $sql .= "joblevel_created, ";
      $sql .= "joblevel_datetime ) values ( ";
      $sql .= ":joblevel_is_active, ";
      $sql .= ":joblevel_name, ";
      $sql .= ":joblevel_created, ";
      $sql .= ":joblevel_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "joblevel_is_active" => $this->joblevel_is_active,
        "joblevel_name" => $this->joblevel_name,
        "joblevel_datetime" => $this->joblevel_datetime,
        "joblevel_created" => $this->joblevel_created,

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
      $sql = "select joblevel_name from {$this->tblJobLevel} ";
      $sql .= "where joblevel_name = :joblevel_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "joblevel_name" => "{$this->joblevel_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblJobLevel} set ";
      $sql .= "joblevel_name = :joblevel_name, ";
      $sql .= "joblevel_datetime = :joblevel_datetime ";
      $sql .= "where joblevel_aid  = :joblevel_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "joblevel_name" => $this->joblevel_name,
        "joblevel_datetime" => $this->joblevel_datetime,
        "joblevel_aid" => $this->joblevel_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblJobLevel} ";
      $sql .= "where joblevel_aid = :joblevel_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "joblevel_aid" => $this->joblevel_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
    {
    try {
    $sql = "update {$this->tblJobLevel} set ";
    $sql .= "joblevel_is_active = :joblevel_is_active, ";
    $sql .= "joblevel_datetime = :joblevel_datetime ";
    $sql .= "where joblevel_aid  = :joblevel_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "joblevel_is_active" => $this->joblevel_is_active,
    "joblevel_datetime" => $this->joblevel_datetime,
    "joblevel_aid" => $this->joblevel_aid,
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
            $sql .= "from {$this->tblJobLevel} ";
            $sql .= "where joblevel_name like :joblevel_name ";
            $sql .= "order by joblevel_is_active desc, ";
            $sql .= "joblevel_aid asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "joblevel_name" => "%{$this->joblevel_search}%",
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
            $sql .= "from {$this->tblJobLevel} ";
            $sql .= "where joblevel_is_active = :joblevel_is_active ";
            $sql .= "and (joblevel_name like :joblevel_name ";
            $sql .= ") ";
            $sql .= "order by joblevel_is_active desc, ";
            $sql .= "joblevel_name asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "joblevel_name" => "%{$this->joblevel_search}%",
                "joblevel_is_active" => $this->joblevel_is_active,
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
            $sql .= "from {$this->tblJobLevel} ";
            $sql .= "where joblevel_is_active = :joblevel_is_active ";
            $sql .= "order by joblevel_name asc ";

            $query = $this->connection->prepare($sql);
            $query->execute([
                "joblevel_is_active" => $this->joblevel_is_active,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}

