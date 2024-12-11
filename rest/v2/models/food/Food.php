<?php


class Food
{
    public $food_aid;
    public $food_is_active;
    public $food_image;
    public $food_title;
    public $food_price;
    public $food_category_id;
    public $food_datetime;
    public $food_created;

    public $category_aid;
    public $category_is_active;
    public $category_title;
    public $category_datetime;
    public $category_created;

    public $connection;
    public $lastInsertedId;
    public $food_start;
    public $food_total;
    public $food_search;
    public $category_start;
    public $category_total;
    public $category_search;


    public $tblCategory;
    public $tblFood;


    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblCategory = "jollibee_category";
        $this->tblFood = "jollibee_food";
       
    }


    public function readAll()
    {
      try {
        $sql = "select * ";
        $sql .= "from ";
        $sql .= "{$this->tblFood} as food, ";
        $sql .= "{$this->tblCategory} as category ";
        $sql .= "where category.category_aid = food.food_category_id ";
        $sql .= "order by food.food_is_active desc, ";
        $sql .= "food.food_aid asc ";
        $query = $this->connection->query($sql);
      } catch (PDOException $ex) {
        $query = false;
      }
      return $query;
    }



      public function readLimit()
      {
        try {
          $sql = "select * ";
          $sql .= "from ";
          $sql .= "{$this->tblFood} as food, ";
          $sql .= "{$this->tblCategory} as category ";
          $sql .= "where category.category_aid = food.food_category_id ";
          $sql .= "order by food.food_is_active desc, ";
          $sql .= "food.food_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->food_start - 1,
              "total" => $this->food_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblFood} ";
              $sql .= "where food_aid = :food_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "food_aid" => $this->food_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }


      public function create()
  {
    try {
      $sql = "insert into {$this->tblFood} ";
      $sql .= "(food_is_active, ";
      $sql .= "food_title, ";
      $sql .= "food_price, ";
      $sql .= "food_category_id, ";
      $sql .= "food_created, ";
      $sql .= "food_datetime ) values ( ";
      $sql .= ":food_is_active, ";
      $sql .= ":food_title, ";
      $sql .= ":food_price, ";
      $sql .= ":food_category_id, ";
      $sql .= ":food_created, ";
      $sql .= ":food_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_is_active" => $this->food_is_active,
        "food_title" => $this->food_title,
        "food_price" => $this->food_price,
        "food_category_id" => $this->food_category_id,
        "food_datetime" => $this->food_datetime,
        "food_created" => $this->food_created,


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
      $sql = "select food_name from {$this->tblFood} ";
      $sql .= "where food_name = :food_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_name" => "{$this->food_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function update()
  {
    try {
      $sql = "update {$this->tblFood} set ";
      $sql .= "food_title = :food_title, ";
      $sql .= "food_price = :food_price, ";
      $sql .= "food_category_id = :food_category_id, ";
      $sql .= "food_datetime = :food_datetime ";
      $sql .= "where food_aid  = :food_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_title" => $this->food_title,
        "food_price" => $this->food_price,
        "food_category_id" => $this->food_category_id,
        "food_datetime" => $this->food_datetime,
        "food_aid" => $this->food_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function delete()
  {
    try {
      $sql = "delete from {$this->tblFood} ";
      $sql .= "where food_aid = :food_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "food_aid" => $this->food_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function active()
    {
    try {
    $sql = "update {$this->tblFood} set ";
    $sql .= "food_is_active = :food_is_active, ";
    $sql .= "food_datetime = :food_datetime ";
    $sql .= "where food_aid  = :food_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "food_is_active" => $this->food_is_active,
    "food_datetime" => $this->food_datetime,
    "food_aid" => $this->food_aid,
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
            $sql .= "from {$this->tblfood} ";
            $sql .= "where food_name like :food_name ";
            $sql .= "order by food_is_active desc, ";
            $sql .= "food_aid asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "food_name" => "%{$this->food_search}%",
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
            $sql .= "from {$this->tblfood} ";
            $sql .= "where food_is_active = :food_is_active ";
            $sql .= "and (food_name like :food_name ";
            $sql .= ") ";
            $sql .= "order by food_is_active desc, ";
            $sql .= "food_name asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "food_name" => "%{$this->food_search}%",
                "food_is_active" => $this->food_is_active,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }




    
}







