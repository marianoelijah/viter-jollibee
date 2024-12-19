<?php

class Advertisement
{
  public $ads_aid;
  public $ads_is_active;
  public $ads_image;
  public $ads_title;
  public $ads_datetime;
  public $ads_created;


  public $connection;
  public $lastInsertedId;
  public $ads_start;
  public $ads_total;
  public $ads_search;


  public $tblAdvertisement;


  public function __construct($db)
  {
    $this->connection = $db;
    $this->tblAdvertisement = "jollibee_advertisement";
  }


  public function readAll()
  {
    try {
      $sql = "select * from {$this->tblAdvertisement} ";
      $sql .= "order by ads_is_active desc, ";
      $sql .= "ads_title ";
      $query = $this->connection->query($sql);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function readLimit()
  {
    try {
      $sql = "select * from {$this->tblAdvertisement} ";
      $sql .= "order by ads_is_active desc, ";
      $sql .= "ads_title ";
      $sql .= "limit :start, ";
      $sql .= ":total ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "start" => $this->ads_start - 1,
        "total" => $this->ads_total,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function readById()
  {
    try {
      $sql = "select * from {$this->tblAdvertisement} ";
      $sql .= "where ads_aid = :ads_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_aid" => $this->ads_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function readAllActiveAdvertisement()
  {
    try {
      $sql = "select * from {$this->tblAdvertisement} ";
      $sql .= "where ads_is_active = 1 ";
      $sql .= "order by ";
      $sql .= "ads_created ";
      $query = $this->connection->query($sql);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function create()
  {
    try {
      $sql = "insert into {$this->tblAdvertisement} ";
      $sql .= "(ads_is_active, ";
      $sql .= "ads_image, ";
      $sql .= "ads_title, ";
      $sql .= "ads_created, ";
      $sql .= "ads_datetime ) values ( ";
      $sql .= ":ads_is_active, ";
      $sql .= ":ads_image, ";
      $sql .= ":ads_title, ";
      $sql .= ":ads_created, ";
      $sql .= ":ads_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_is_active" => $this->ads_is_active,
        "ads_image" => $this->ads_image,
        "ads_title" => $this->ads_title,
        "ads_datetime" => $this->ads_datetime,
        "ads_created" => $this->ads_created,


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
  //     $sql = "select ads_title from {$this->tblAdvertisement} ";
  //     $sql .= "where ads_title = :ads_title ";
  //     $query = $this->connection->prepare($sql);
  //     $query->execute([
  //       "ads_title" => "{$this->ads_title}",
  //     ]);
  //   } catch (PDOException $ex) {
  //     $query = false;
  //   }
  //   return $query;
  // }


  public function search()
  {
    try {
      $sql = "select * from {$this->tblAdvertisement} ";
      $sql .= "where ads_title like :ads_title ";
      $sql .= "order by ads_is_active desc, ";
      $sql .= "ads_title ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_title" => "%{$this->ads_search}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function filterActive()
  {
    try {
      $sql = "select * from {$this->tblAdvertisement} ";
      $sql .= "where ads_is_active like :ads_is_active ";
      $sql .= "order by ads_is_active desc, ";
      $sql .= "ads_title ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_is_active" => "%{$this->ads_is_active}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }



  public function filterActiveSearch()
  {
    try {
      $sql = "select * from {$this->tblAdvertisement} ";
      $sql .= "where ads_is_active like :ads_is_active ";
      $sql .= "and ads_title like :ads_title ";
      $sql .= "order by ads_is_active desc, ";
      $sql .= "ads_title ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_is_active" => "$this->ads_is_active",
        "ads_title" => "%{$this->ads_search}%",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }

  public function update()
  {
    try {
      $sql = "update {$this->tblAdvertisement} set ";
      $sql .= "ads_image = :ads_image, ";
      $sql .= "ads_title = :ads_title, ";
      $sql .= "ads_datetime = :ads_datetime ";
      $sql .= "where ads_aid  = :ads_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_image" => $this->ads_image,
        "ads_title" => $this->ads_title,
        "ads_datetime" => $this->ads_datetime,
        "ads_aid" => $this->ads_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function delete()
  {
    try {
      $sql = "delete from {$this->tblAdvertisement} ";
      $sql .= "where ads_aid = :ads_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_aid" => $this->ads_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function active()
  {
    try {
      $sql = "update {$this->tblAdvertisement} set ";
      $sql .= "ads_is_active = :ads_is_active, ";
      $sql .= "ads_datetime = :ads_datetime ";
      $sql .= "where ads_aid  = :ads_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "ads_is_active" => $this->ads_is_active,
        "ads_datetime" => $this->ads_datetime,
        "ads_aid" => $this->ads_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
}