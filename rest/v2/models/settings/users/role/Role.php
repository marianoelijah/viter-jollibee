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
        $this->tblRole = "jollibee_settings_role";
        
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



  // add column to database table
  public function addColumn($column_name)
  {
    try {
      $sql = "alter table {$this->tblRole} ";
      $sql .= "add column role_is_{$column_name} boolean ";
      $sql .= "NOT NULL ";
      $query = $this->connection->query($sql);
    } catch (PDOException $ex) {
      $query = false;
    }

    return $query;
  }

  // update
  public function updateColumnValue($column_name)
  {
    try {
      $sql = "update {$this->tblRole} set ";
      $sql .= "role_is_{$column_name} = :role_column_name, ";
      $sql .= "role_datetime = :role_datetime ";
      $sql .= "where role_name = :role_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "role_column_name" => $this->role_is_active,
        "role_datetime" => $this->role_datetime,
        "role_name" => $this->role_name,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  // update column name to database table
  public function updateColumnName($column_name, $column_name_old)
  {
    try {
      $sql = "alter table {$this->tblRole} change ";
      $sql .= "role_is_{$column_name_old} ";
      $sql .= "role_is_{$column_name} boolean ";
      $query = $this->connection->query($sql);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  // drop column name to database table
  public function dropColumnName($column_name)
  {
    try {
      $sql = "alter table {$this->tblRole} ";
      $sql .= "drop role_is_{$column_name} ";
      $query = $this->connection->query($sql);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
}