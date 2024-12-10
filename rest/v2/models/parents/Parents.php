<?php

class Parents
{
    public $parents_aid;
    public $parents_is_active;
    public $parents_name;
    public $parents_email;
    public $parents_address;
    public $parents_created;
    public $parents_datetime;

    public $connection;
    public $lastInsertedId;
    public $parents_start;
    public $parents_total;
    public $parents_search;

    public $tblParents;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblParents = "lcss_parents";
        
    }

    public function readAll()
      {
        try {
          $sql = "select * from {$this->tblParents} ";
          $sql .= "order by parents_is_active desc, ";
          $sql .= "parents_aid asc ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }

  //     public function readLimit()
  //     {
  //       try {
  //         $sql = "select * from {$this->tblClient} ";
  //         $sql .= "order by client_is_active desc, ";
  //         $sql .= "client_aid asc ";
  //         $sql .= "limit :start, ";
  //         $sql .= ":total ";
  //         $query = $this->connection->prepare($sql);
  //         $query->execute([
  //             "start" => $this->client_start - 1,
  //             "total" => $this->client_total,
  //         ]);
  //     } catch (PDOException $ex) {
  //         $query = false;
  //     }
  //     return $query;
  // }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblParents} ";
              $sql .= "where parents_aid = :parents_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "parents_aid" => $this->parents_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }

      public function create()
  {
    try {
      $sql = "insert into {$this->tblParents} ";
      $sql .= "(parents_is_active, ";
      $sql .= "parents_name, ";
      $sql .= "parents_email, ";
      $sql .= "parents_address, ";
      $sql .= "parents_created, ";
      $sql .= "parents_datetime ) values ( ";
      $sql .= ":parents_is_active, ";
      $sql .= ":parents_name, ";
      $sql .= ":parents_email, ";
      $sql .= ":parents_address, ";
      $sql .= ":parents_created, ";
      $sql .= ":parents_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "parents_is_active" => $this->parents_is_active,
        "parents_name" => $this->parents_name,
        "parents_email" => $this->parents_email,
        "parents_address" => $this->parents_address,
        "parents_created" => $this->parents_created,
        "parents_datetime" => $this->parents_datetime,
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
      $sql = "select parents_name from {$this->tblParents} ";
      $sql .= "where parents_name = :parents_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "parents_name" => "{$this->parents_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function update()
  {
    try {
      $sql = "update {$this->tblParents} set ";
      $sql .= "parents_name = :parents_name, ";
      $sql .= "parents_email = :parents_email, ";
      $sql .= "parents_address = :parents_address, ";
      $sql .= "parents_datetime = :parents_datetime ";
      $sql .= "where parents_aid  = :parents_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "parents_name" => $this->parents_name,
        "parents_email" => $this->parents_email,
        "parents_address" => $this->parents_address,
        "parents_datetime" => $this->parents_datetime,
        "parents_aid" => $this->parents_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblParents} ";
      $sql .= "where parents_aid = :parents_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "parents_aid" => $this->parents_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
    {
    try {
    $sql = "update {$this->tblParents} set ";
    $sql .= "parents_is_active = :parents_is_active, ";
    $sql .= "parents_datetime = :parents_datetime ";
    $sql .= "where parents_aid  = :parents_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "parents_is_active" => $this->parents_is_active,
    "parents_datetime" => $this->parents_datetime,
    "parents_aid" => $this->parents_aid,
    ]);
    } catch (PDOException $ex) {
    $query = false;
    }
    return $query;
  }


  // public function search()
  //   {
  //       try {
  //           $sql = "select * ";
  //           $sql .= "from {$this->tblClient} ";
  //           $sql .= "where client_name like :client_name ";
  //           $sql .= "order by client_is_active desc, ";
  //           $sql .= "client_aid asc ";
  //           $query = $this->connection->prepare($sql);
  //           $query->execute([
  //               "client_name" => "%{$this->client_search}%",
  //           ]);
  //       } catch (PDOException $ex) {
  //           $query = false;
  //       }
  //       return $query;
  //   }

}