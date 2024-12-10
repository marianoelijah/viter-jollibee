<?php


class Other
{
    public $other_aid;
    public $other_is_active;
    public $other_name;
    public $other_email;
    public $other_role_id;
    public $other_datetime;
    public $other_created;


    public $role_aid;
    public $role_is_active;
    public $role_name;
    public $role_description;
    public $role_datetime;
    public $role_created;


    public $connection;
    public $lastInsertedId;
    public $other_start;
    public $other_total;
    public $other_search;
    public $role_start;
    public $role_total;
    public $role_search;


    public $tblRole;
    public $tblOther;


    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblRole = "lcss_users_role";
        $this->tblOther = "lcss_users_other";
       
    }


    public function readAll()
      {
        try {
          $sql = "select * ";
          $sql .= "from ";
          $sql .= "{$this->tblRole} as usersRole, ";
          $sql .= "{$this->tblOther} as usersOther ";
          $sql .= "where usersRole.role_aid = usersOther.other_role_id ";
          $sql .= "order by usersOther.other_is_active desc, ";
          $sql .= "usersOther.other_aid asc ";
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
          $sql .= "{$this->tblRole} as usersRole, ";
          $sql .= "{$this->tblOther} as usersOther ";
          $sql .= "where usersRole.role_aid = usersOther.other_role_id ";
          $sql .= "order by usersOther.other_is_active desc, ";
          $sql .= "usersOther.other_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->other_start - 1,
              "total" => $this->other_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
      public function readById()
      {
          try {
              $sql = "select * from {$this->tblOther} ";
              $sql .= "where other_aid = :other_aid ";
              $query = $this->connection->prepare($sql);
              $query->execute([
                  "other_aid" => $this->other_aid,
              ]);
          } catch (PDOException $ex) {
              $query = false;
          }
          return $query;
      }


      public function create()
  {
    try {
      $sql = "insert into {$this->tblOther} ";
      $sql .= "(other_is_active, ";
      $sql .= "other_name, ";
      $sql .= "other_email, ";
      $sql .= "other_role_id, ";
      $sql .= "other_created, ";
      $sql .= "other_datetime ) values ( ";
      $sql .= ":other_is_active, ";
      $sql .= ":other_name, ";
      $sql .= ":other_email, ";
      $sql .= ":other_role_id, ";
      $sql .= ":other_created, ";
      $sql .= ":other_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "other_is_active" => $this->other_is_active,
        "other_name" => $this->other_name,
        "other_email" => $this->other_email,
        "other_role_id" => $this->other_role_id,
        "other_datetime" => $this->other_datetime,
        "other_created" => $this->other_created,


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
      $sql = "select other_name from {$this->tblOther} ";
      $sql = "select other_name from {$this->tblOther} ";
      $sql = "select other_name from {$this->tblOther} ";
      $sql = "select other_name from {$this->tblOther} ";
      $sql .= "where other_name = :other_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "other_name" => "{$this->other_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function update()
  {
    try {
      $sql = "update {$this->tblOther} set ";
      $sql .= "other_name = :other_name, ";
      $sql .= "other_email = :other_email, ";
      $sql .= "other_role_id = :other_role_id, ";
      $sql .= "other_datetime = :other_datetime ";
      $sql .= "where other_aid  = :other_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "other_name" => $this->other_name,
        "other_email" => $this->other_email,
        "other_role_id" => $this->other_role_id,
        "other_datetime" => $this->other_datetime,
        "other_aid" => $this->other_aid
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function delete()
  {
    try {
      $sql = "delete from {$this->tblOther} ";
      $sql .= "where other_aid = :other_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "other_aid" => $this->other_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }


  public function active()
    {
    try {
    $sql = "update {$this->tblOther} set ";
    $sql .= "other_is_active = :other_is_active, ";
    $sql .= "other_datetime = :other_datetime ";
    $sql .= "where other_aid  = :other_aid ";
    $query = $this->connection->prepare($sql);
    $query->execute([
    "other_is_active" => $this->other_is_active,
    "other_datetime" => $this->other_datetime,
    "other_aid" => $this->other_aid,
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







