<?php


class Category
{
    public $category_aid;
    public $category_is_active;
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
          $sql .= "category_aid asc ";
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
          $sql .= "category_aid asc ";
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
      $sql .= "category_title, ";
      $sql .= "category_created, ";
      $sql .= "category_datetime ) values ( ";
      $sql .= ":category_is_active, ";
      $sql .= ":category_title, ";
      $sql .= ":category_email, ";
      $sql .= ":category_role_id, ";
      $sql .= ":category_created, ";
      $sql .= ":category_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_is_active" => $this->category_is_active,
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


  public function checkName()
  {
    try {
      $sql = "select category_name from {$this->tblCategory} ";
      $sql = "select category_name from {$this->tblCategory} ";
      $sql = "select category_name from {$this->tblCategory} ";
      $sql = "select category_name from {$this->tblCategory} ";
      $sql .= "where category_name = :category_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_name" => "{$this->category_name}",
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
      $sql .= "category_name = :category_name, ";
      $sql .= "category_email = :category_email, ";
      $sql .= "category_role_id = :category_role_id, ";
      $sql .= "category_datetime = :category_datetime ";
      $sql .= "where category_aid  = :category_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "category_name" => $this->category_name,
        "category_email" => $this->category_email,
        "category_role_id" => $this->category_role_id,
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




  public function search()
    {
        try {
            $sql = "select * ";
            $sql .= "from {$this->tblCategory} ";
            $sql .= "where category_name like :category_name ";
            $sql .= "order by category_is_active desc, ";
            $sql .= "category_aid asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "category_name" => "%{$this->category_search}%",
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
            $sql .= "from {$this->tblCategory} ";
            $sql .= "where category_is_active = :category_is_active ";
            $sql .= "and (category_name like :category_name ";
            $sql .= ") ";
            $sql .= "order by category_is_active desc, ";
            $sql .= "category_name asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "category_name" => "%{$this->category_search}%",
                "category_is_active" => $this->category_is_active,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }




    
}







