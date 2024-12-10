<?php

class Role
{
    public $role_aid;
    public $role_is_active;
    public $role_name;
    public $role_description;
    public $role_datetime;
    public $role_created;

    public $connection;
    public $lastInsertedId;
    public $role_start;
    public $role_total;
    public $role_search;

    public $tblRole;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblRole = "lcss_users_role";
        
    }

    public function readAll()
      {
        try {
          $sql = "select * from {$this->tblRole} ";
          $sql .= "order by role_is_active desc, ";
          $sql .= "role_aid asc ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }

      public function readLimit()
      {
        try {
          $sql = "select * from {$this->tblRole} ";
          $sql .= "order by role_is_active desc, ";
          $sql .= "role_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->role_start - 1,
              "total" => $this->role_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblRole} ";
              $sql .= "where role_aid = :role_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "role_aid" => $this->role_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }

      public function create()
  {
    try {
      $sql = "insert into {$this->tblRole} ";
      $sql .= "(role_is_active, ";
      $sql .= "role_name, ";
      $sql .= "role_description, ";
      $sql .= "role_created, ";
      $sql .= "role_datetime ) values ( ";
      $sql .= ":role_is_active, ";
      $sql .= ":role_name, ";
      $sql .= ":role_description, ";
      $sql .= ":role_created, ";
      $sql .= ":role_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "role_is_active" => $this->role_is_active,
        "role_name" => $this->role_name,
        "role_description" => $this->role_description,
        "role_datetime" => $this->role_datetime,
        "role_created" => $this->role_created,

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
      $sql = "select role_name from {$this->tblRole} ";
      $sql .= "where role_name = :role_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "role_name" => "{$this->role_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblRole} set ";
      $sql .= "role_name = :role_name, ";
      $sql .= "role_description = :role_description, ";
      $sql .= "role_datetime = :role_datetime ";
      $sql .= "where role_aid  = :role_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "role_name" => $this->role_name,
        "role_description" => $this->role_description,
        "role_datetime" => $this->role_datetime,
        "role_aid" => $this->role_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblRole} ";
      $sql .= "where role_aid = :role_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "role_aid" => $this->role_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
    {
    try {
    $sql = "update {$this->tblRole} set ";
    $sql .= "role_is_active = :role_is_active, ";
    $sql .= "role_datetime = :role_datetime ";
    $sql .= "where role_aid  = :role_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "role_is_active" => $this->role_is_active,
    "role_datetime" => $this->role_datetime,
    "role_aid" => $this->role_aid,
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
            $sql .= "from {$this->tblRole} ";
            $sql .= "where role_name like :role_name ";
            $sql .= "order by role_is_active desc, ";
            $sql .= "role_aid asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "role_name" => "%{$this->role_search}%",
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
            $sql .= "from {$this->tblRole} ";
            $sql .= "where role_is_active = :role_is_active ";
            $sql .= "and (role_name like :role_name ";
            $sql .= ") ";
            $sql .= "order by role_is_active desc, ";
            $sql .= "role_name asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "role_name" => "%{$this->role_search}%",
                "role_is_active" => $this->role_is_active,
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
            $sql .= "from {$this->tblRole} ";
            $sql .= "where role_is_active = :role_is_active ";
            $sql .= "order by role_name asc ";

            $query = $this->connection->prepare($sql);
            $query->execute([
                "role_is_active" => $this->role_is_active,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}

