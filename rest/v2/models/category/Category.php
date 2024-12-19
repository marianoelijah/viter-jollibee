<?php

class Category
{
    public $category_aid;
    public $category_is_active;
    public $category_image;
    public $category_title;
    public $category_datetime;
    public $category_created;


    public $connection;
    public $lastInsertedId;
    public $category_start;
    public $category_total;
    public $category_search;


    public $tblCategory;


    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblCategory = "jollibee_category";
       
    }


       public function readAll()
      {
        try {
          $sql = "select * from {$this->tblCategory} ";
          $sql .= "order by category_is_active desc, ";
          $sql .= "category_title ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }


      public function readLimit()
      {
        try {
          $sql = "select * from {$this->tblCategory} ";
          $sql .= "order by category_is_active desc, ";
          $sql .= "category_title ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->category_start - 1,
              "total" => $this->category_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblCategory} ";
              $sql .= "where category_aid = :category_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "category_aid" => $this->category_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }


      public function create()
  {
    try {
      $sql = "insert into {$this->tblCategory} ";
      $sql .= "(category_is_active, ";
      $sql .= "category_image, ";
      $sql .= "category_title, ";
      $sql .= "category_created, ";
      $sql .= "category_datetime ) values ( ";
      $sql .= ":category_is_active, ";
      $sql .= ":category_image, ";
      $sql .= ":category_title, ";
      $sql .= ":category_created, ";
      $sql .= ":category_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_is_active" => $this->category_is_active,
        "category_image" => $this->category_image,
        "category_title" => $this->category_title,
        "category_datetime" => $this->category_datetime,
        "category_created" => $this->category_created,


      ]);
      $this->lastInsertedId = $this->connection->lastInsertId();
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  // public function checkName()
  // {
  //   try {
  //     $sql = "select category_title from {$this->tblCategory} ";
  //     $sql .= "where category_title = :category_title ";
  //     $query = $this->connection->prepare($sql);
  //     $query->execute([
  //       "category_title" => "{$this->category_title}",
  //     ]);
  //   } catch (PDOException $ex) {
  //     $query = false;
  //   }
  //   return $query;
  // }


  public function search()
  {
    try {
      $sql = "select * from {$this->tblCategory} ";
      $sql .= "where category_title like :category_title ";
      $sql .= "order by category_is_active desc, ";
      $sql .= "category_title ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_title" => "%{$this->category_search}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function filterActive()
  {
    try {
      $sql = "select * from {$this->tblCategory} ";
      $sql .= "where category_is_active like :category_is_active ";
      $sql .= "order by category_is_active desc, ";
      $sql .= "category_title ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_is_active" => "%{$this->category_is_active}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }



  public function filterActiveSearch()
  {
    try {
      $sql = "select * from {$this->tblCategory} ";
      $sql .= "where category_is_active like :category_is_active ";
      $sql .= "and category_title like :category_title ";
      $sql .= "order by category_is_active desc, ";
      $sql .= "category_title ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_is_active" => "$this->category_is_active",
        "category_title" => "%{$this->category_search}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblCategory} set ";
      $sql .= "category_image = :category_image, ";
      $sql .= "category_title = :category_title, ";
      $sql .= "category_datetime = :category_datetime ";
      $sql .= "where category_aid  = :category_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_image" => $this->category_image,
        "category_title" => $this->category_title,
        "category_datetime" => $this->category_datetime,
        "category_aid" => $this->category_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function delete()
  {
    try {
      $sql = "delete from {$this->tblCategory} ";
      $sql .= "where category_aid = :category_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_aid" => $this->category_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function active()
    {
    try {
    $sql = "update {$this->tblCategory} set ";
    $sql .= "category_is_active = :category_is_active, ";
    $sql .= "category_datetime = :category_datetime ";
    $sql .= "where category_aid  = :category_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "category_is_active" => $this->category_is_active,
    "category_datetime" => $this->category_datetime,
    "category_aid" => $this->category_aid,
    ]);
    } catch (PDOException $ex) {
    $query = false;
    }
    return $query;
  }



}