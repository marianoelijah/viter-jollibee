<?php

class Company
{
    public $company_aid;
    public $company_is_active;
    public $company_name;
    public $company_email;
    public $company_phone;
    public $company_street;
    public $company_city;
    public $company_province;
    public $company_postal;
    public $company_country;
    public $navigation_bgc;
    public $submenu_color;
    public $accent_color;
    public $company_logo;
    // public $company_datetime;
    // public $company_created;

    public $connection;
    public $lastInsertedId;
    public $company_start;
    public $company_total;
    public $company_search;

    public $tblCompany;

    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblCompany = "lcss_companyinfo";
        
    }

    public function readAll()
      {
        try {
          $sql = "select * from {$this->tblCompany} ";
          $sql .= "order by company_is_active desc, ";
          $sql .= "company_aid asc ";
          $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
          $query = false;
        }
        return $query;
      }

      public function readLimit()
      {
        try {
          $sql = "select * from {$this->tblCompany} ";
          $sql .= "order by company_is_active desc, ";
          $sql .= "company_aid asc ";
          $sql .= "limit :start, ";
          $sql .= ":total ";
          $query = $this->connection->prepare($sql);
          $query->execute([
              "start" => $this->company_start - 1,
              "total" => $this->company_total,
          ]);
      } catch (PDOException $ex) {
          $query = false;
      }
      return $query;
  }
       public function readById()
       {
           try {
               $sql = "select * from {$this->tblCompany} ";
               $sql .= "where company_aid = :company_aid ";
               $query = $this->connection->prepare($sql);
               $query->execute([
                   "company_aid" => $this->company_aid,
               ]);
           } catch (PDOException $ex) {
               $query = false;
           }
           return $query;
       }
      public function create()
  {
    try {
      $sql = "insert into {$this->tblCompany} ";
      $sql .= "(company_is_active, ";
      $sql .= "company_name, ";
      $sql .= "company_created, ";
      $sql .= "company_datetime ) values ( ";
      $sql .= ":company_is_active, ";
      $sql .= ":company_name, ";
      $sql .= ":company_created, ";
      $sql .= ":company_datetime ) ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "company_is_active" => $this->company_is_active,
        "company_name" => $this->company_name,
     

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
      $sql = "select company_name from {$this->tblCompany} ";
      $sql .= "where company_name = :company_name ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "company_name" => "{$this->company_name}",
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
   public function update()
   {
     try {
       $sql = "update {$this->tblCompany} set ";
       $sql .= "company_name = :company_name,  ";
       $sql .= "company_email = :company_email, ";
       $sql .= "company_phone = :company_phone, ";
       $sql .= "company_street = :company_street, ";
       $sql .= "company_city = :company_city, ";
       $sql .= "company_province = :company_province, ";
       $sql .= "company_postal = :company_postal, ";
       $sql .= "company_country = :company_country, ";
       $sql .= "navigation_bgc = :navigation_bgc, ";
       $sql .= "submenu_color = :submenu_color, ";
       $sql .= "accent_color = :accent_color, ";
       $sql .= "company_logo = :company_logo ";
      $sql .= "where company_aid = :company_aid ";
       $query = $this->connection->prepare($sql);
       $query->execute([
         "company_name" => $this->company_name,
         "company_email" => $this->company_email,
         "company_phone" => $this->company_phone,
         "company_street" => $this->company_street,
         "company_city" => $this->company_city,
         "company_province" => $this->company_province,
         "company_postal" => $this->company_postal,
         "company_country" => $this->company_country,
         "navigation_bgc" => $this->navigation_bgc,
         "submenu_color" => $this->submenu_color,
         "accent_color" => $this->accent_color,
         "company_logo" => $this->company_logo,
         "company_aid" => $this->company_aid,
       ]);
     } catch (PDOException $ex) {
       $query = false;
     }
     return $query;
   }
  public function delete()
  {
    try {
      $sql = "delete from {$this->tblCompany} ";
      $sql .= "where company_aid = :company_aid ";
      $query = $this->connection->prepare($sql);
      $query->execute([
        "company_aid" => $this->company_aid,
      ]);
    } catch (PDOException $ex) {
      $query = false;
    }
    return $query;
  }
   public function active()
     {
     try {
     $sql = "update {$this->tblCompany} set ";
     $sql .= "company_is_active = :company_is_active, ";
     $sql .= "where company_aid  = :company_aid ";
     $query = $this->connection->prepare($sql);
     $query->execute([
     "company_is_active" => $this->company_is_active,
     "company_aid" => $this->company_aid,
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
            $sql .= "from {$this->tblCompany} ";
            $sql .= "where company_name like :company_name ";
            $sql .= "order by company_is_active desc, ";
            $sql .= "company_aid asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "company_name" => "%{$this->company_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}