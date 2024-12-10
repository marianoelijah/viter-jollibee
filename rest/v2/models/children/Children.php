<?php

class Children
{
    public $children_aid;
    public $children_is_active;
    public $children_name;
    public $children_email;
    public $children_address;
    public $children_created;
    public $children_datetime;

    public $connection;
    public $lastInsertedId;
    public $children_start;
    public $children_total;
    public $children_search;

    public $tblChildren;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblChildren = "lcss_children";
        
    }

    public function readAll()
      {
        try {
          $sql = "select * from {$this->tblChildren} ";
          $sql .= "order by children_is_active desc, ";
          $sql .= "children_aid asc ";
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
              $sql = "select * from {$this->tblChildren} ";
              $sql .= "where children_aid = :children_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "children_aid" => $this->children_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }

      public function create()
  {
    try {
      $sql = "insert into {$this->tblChildren} ";
      $sql .= "(children_is_active, ";
      $sql .= "children_name, ";
      $sql .= "children_email, ";
      $sql .= "children_address, ";
      $sql .= "children_created, ";
      $sql .= "children_datetime ) values ( ";
      $sql .= ":children_is_active, ";
      $sql .= ":children_name, ";
      $sql .= ":children_email, ";
      $sql .= ":children_address, ";
      $sql .= ":children_created, ";
      $sql .= ":children_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "children_is_active" => $this->children_is_active,
        "children_name" => $this->children_name,
        "children_email" => $this->children_email,
        "children_address" => $this->children_address,
        "children_created" => $this->children_created,
        "children_datetime" => $this->children_datetime,
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
      $sql = "select children_name from {$this->tblChildren} ";
      $sql .= "where children_name = :children_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "children_name" => "{$this->children_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblChildren} set ";
      $sql .= "children_name = :children_name, ";
      $sql .= "children_email = :children_email, ";
      $sql .= "children_address = :children_address, ";
      $sql .= "children_datetime = :children_datetime ";
      $sql .= "where children_aid  = :children_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "children_aid" => $this->children_aid,
        "children_name" => $this->children_name,
        "children_email" => $this->children_email,
        "children_address" => $this->children_address,
        "children_datetime" => $this->children_datetime,
        
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function delete()
  {
    try {
      $sql = "delete from {$this->tblChildren} ";
      $sql .= "where children_aid = :children_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "children_aid" => $this->children_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function active()
    {
    try {
    $sql = "update {$this->tblChildren} set ";
    $sql .= "children_is_active = :children_is_active, ";
    $sql .= "children_datetime = :children_datetime ";
    $sql .= "where children_aid  = :children_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "children_is_active" => $this->children_is_active,
    "children_datetime" => $this->children_datetime,
    "children_aid" => $this->children_aid,
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