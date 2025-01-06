<?php

class Developer
{
    public $user_developer_aid;
    public $user_developer_is_active;
    public $user_developer_first_name;
    public $user_developer_last_name;
    public $user_developer_email;
    public $user_developer_new_email;
    public $user_developer_role_id;
    public $user_developer_key;
    public $user_developer_password;
    public $user_developer_created;
    public $user_developer_datetime;

    public $connection;
    public $lastInsertedId;
    public $developer_start;
    public $developer_total;
    public $developer_search;

    public $tblRole;
    public $tblDeveloper;


    public function __construct($db)
    {
        $this->connection = $db;
        $this->tblRole = " jollibee_settings_role";
        $this->tblDeveloper = "jollibee_settings_user_developer";
    }

    public function create()
    {
        try {
            $sql = "insert into {$this->tblDeveloper} ";
            $sql .= "( user_developer_is_active, ";
            $sql .= "user_developer_first_name, ";
            $sql .= "user_developer_last_name, ";
            $sql .= "user_developer_email, ";
            $sql .= "user_developer_role_id, ";
            $sql .= "user_developer_key, ";
            $sql .= "user_developer_created, ";
            $sql .= "user_developer_datetime ) values ( ";
            $sql .= ":user_developer_is_active, ";
            $sql .= ":user_developer_first_name, ";
            $sql .= ":user_developer_last_name, ";
            $sql .= ":user_developer_email, ";
            $sql .= ":user_developer_role_id, ";
            $sql .= ":user_developer_key, ";
            $sql .= ":user_developer_created, ";
            $sql .= ":user_developer_datetime ) ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_is_active" => $this->user_developer_is_active,
                "user_developer_first_name" => $this->user_developer_first_name,
                "user_developer_last_name" => $this->user_developer_last_name,
                "user_developer_email" => $this->user_developer_email,
                "user_developer_role_id" => $this->user_developer_role_id,
                "user_developer_key" => $this->user_developer_key,
                "user_developer_created" => $this->user_developer_created,
                "user_developer_datetime" => $this->user_developer_datetime,

            ]);
            $this->lastInsertedId = $this->connection->lastInsertId();
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function readAll()
    {
        try {
            $sql = "select * from {$this->tblDeveloper} ";
            $sql .= "order by user_developer_is_active desc, ";
            $sql .= "user_developer_first_name, ";
            $sql .= "user_developer_last_name ";
            $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function readLimit()
    {
        try {
            $sql = "select * from {$this->tblDeveloper} ";
            $sql .= "order by user_developer_is_active desc, ";
            $sql .= "user_developer_first_name, ";
            $sql .= "user_developer_last_name ";
            $sql .= "limit :start, ";
            $sql .= ":total ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "start" => $this->developer_start - 1,
                "total" => $this->developer_total,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function search()
    {
        try {

            $sql = "select * from {$this->tblDeveloper} ";
            $sql .= "where ";
            $sql .= "user_developer_first_name like :user_developer_first_name ";
            $sql .= "or user_developer_last_name like :user_developer_last_name ";
            $sql .= "or user_developer_email like :user_developer_email ";
            $sql .= "order by user_developer_is_active desc, ";
            $sql .= "user_developer_first_name, ";
            $sql .= "user_developer_last_name ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_first_name" => "%{$this->developer_search}%",
                "user_developer_last_name" => "%{$this->developer_search}%",
                "user_developer_email" => "%{$this->developer_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function filterActive()
    {
        try {

            $sql = "select ";
            $sql .= "dev.*, ";
            $sql .= "role.* ";
            $sql .= "from {$this->tblDeveloper} as dev, ";
            $sql .= "{$this->tblRole} as role ";
            $sql .= "where ";
            $sql .= "dev.user_developer_role_id = role.role_aid ";
            $sql .= "and dev.user_developer_is_active = :user_developer_is_active ";
            $sql .= "order by dev.user_developer_is_active desc, ";
            $sql .= "dev.user_developer_first_name, ";
            $sql .= "dev.user_developer_last_name ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_is_active" => $this->user_developer_is_active,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function filterActiveSearch()
    {
        try {

            $sql = "select ";
            $sql .= "dev.*, ";
            $sql .= "role.* ";
            $sql .= "from {$this->tblDeveloper} as dev, ";
            $sql .= "{$this->tblRole} as role ";
            $sql .= "where ";
            $sql .= "dev.user_developer_aid = role.role_aid ";
            $sql .= "and dev.user_developer_is_active = :user_developer_is_active ";
            $sql .= "and ";
            $sql .= " ( ";
            $sql .= "dev.user_developer_first_name like :user_developer_first_name, ";
            $sql .= "or dev.user_developer_last_name like :user_developer_last_name, ";
            $sql .= "or dev.user_developer_email like :user_developer_email ";
            $sql .= " ) ";
            $sql .= "order by dev.user_developer_is_active desc, ";
            $sql .= "dev.user_developer_first_name, ";
            $sql .= "dev.user_developer_last_name ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_is_active" => $this->user_developer_is_active,
                "user_developer_first_name" => "%{$this->developer_search}%",
                "user_developer_last_name" => "%{$this->developer_search}%",
                "user_developer_email" => "%{$this->developer_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function readById()
    {
        try {
            $sql = "select ";
            $sql .= "dev.*, ";
            $sql .= "role.* ";
            $sql .= "from {$this->tblDeveloper} as dev, ";
            $sql .= "{$this->tblRole} as role ";
            $sql .= "where ";
            $sql .= "dev.user_developer_role_aid = role.role_aid ";
            $sql .= "and user_developer_aid = :user_developer_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_aid" => $this->user_developer_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function readLogin()
    {
        try {
            $sql = "select ";
            $sql .= "dev.*, ";
            $sql .= "role.* ";
            $sql .= "from {$this->tblDeveloper} as dev, ";
            $sql .= "{$this->tblRole} as role ";
            $sql .= "where ";
            $sql .= "dev.user_developer_role_id = role.role_aid ";
            $sql .= "and dev.user_developer_email = :user_developer_email ";
            $sql .= "and role.role_is_developer = 1 ";
            $sql .= "and dev.user_developer_is_active = 1 ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_email" => $this->user_developer_email,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function readKey()
    {
        try {
            $sql = "select ";
            $sql .= "dev.*, ";
            $sql .= "role.* ";
            $sql .= "from {$this->tblDeveloper} as dev, ";
            $sql .= "{$this->tblRole} as role ";
            $sql .= "where ";
            $sql .= "dev.user_developer_role_id = role.role_aid ";
            $sql .= "and user_developer_key = :user_developer_key ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_key" => $this->user_developer_key,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function readKeyChangeEmail()
    {
        try {
            $sql = "select ";
            $sql .= "dev.*, ";
            $sql .= "role.* ";
            $sql .= "from {$this->tblDeveloper} as dev, ";
            $sql .= "{$this->tblRole} as role ";
            $sql .= "where ";
            $sql .= "dev.user_developer_role_id = role.role_aid ";
            $sql .= "and user_developer_key = :user_developer_key ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_key" => $this->user_developer_key,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function update()
    {
        try {
            $sql = "update {$this->tblDeveloper} set ";
            $sql .= "user_developer_first_name = :user_developer_first_name, ";
            $sql .= "user_developer_last_name = :user_developer_last_name, ";
            $sql .= "user_developer_datetime = :user_developer_datetime ";
            $sql .= "where user_developer_aid  = :user_developer_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_first_name" => $this->user_developer_first_name,
                "user_developer_last_name" => $this->user_developer_last_name,
                "user_developer_datetime" => $this->user_developer_datetime,
                "user_developer_aid" => $this->user_developer_aid
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function checkEmail()
    {
        try {
            $sql = "select user_developer_email from {$this->tblDeveloper} ";
            $sql .= "where user_developer_email = :user_developer_email ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_email" => "{$this->user_developer_email}",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function active()
    {
        try {
            $sql = "update {$this->tblDeveloper} set ";
            $sql .= "user_developer_is_active = :user_developer_is_active, ";
            $sql .= "user_developer_datetime = :user_developer_datetime ";
            $sql .= "where user_developer_aid  = :user_developer_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_is_active" => $this->user_developer_is_active,
                "user_developer_datetime" => $this->user_developer_datetime,
                "user_developer_aid" => $this->user_developer_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
    public function updateEmailForUser()
    {
        try {
            $sql = "update {$this->tblDeveloper} set ";
            $sql .= "user_developer_email = :user_developer_email, ";
            $sql .= "user_developer_new_email = '' ";
            $sql .= "user_developer_key = '' ";
            $sql .= "user_developer_datetime = :user_developer_datetime, ";
            $sql .= "where user_developer_key  = :user_developer_key ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_email" => $this->user_developer_email,
                "user_developer_datetime" => $this->user_developer_datetime,
                "user_developer_key" => $this->user_developer_key
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
    public function updateUserKeyAndNewEmail()
    {
        try {
            $sql = "update {$this->tblDeveloper} set ";
            $sql .= "user_developer_key = :user_developer_key, ";
            $sql .= "user_developer_new_email = :user_developer_new_email ";
            $sql .= "user_developer_datetime = :user_developer_datetime, ";
            $sql .= "where user_developer_aid  = :user_developer_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_key" => $this->user_developer_key,
                "user_developer_new_email" => $this->user_developer_new_email,
                "user_developer_datetime" => $this->user_developer_datetime,
                "user_developer_aid" => $this->user_developer_aid
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
    public function setPassword()
    {
        try {
            $sql = "update {$this->tblDeveloper} set ";
            $sql .= "user_developer_password = :user_developer_password, ";
            $sql .= "user_developer_key = '', ";
            $sql .= "user_developer_datetime = :user_developer_datetime ";
            $sql .= "where user_developer_key  = :user_developer_key ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_password" => $this->user_developer_password,
                "user_developer_datetime" => $this->user_developer_datetime,
                "user_developer_key" => $this->user_developer_key
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
    public function resetPassword()
    {
        try {
            $sql = "update {$this->tblDeveloper} set ";
            $sql .= "user_developer_key = :user_developer_key, ";
            $sql .= "user_developer_datetime = :user_developer_datetime, ";
            $sql .= "where user_developer_email  = :user_developer_email ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "user_developer_key" => $this->user_developer_key,
                "user_developer_datetime" => $this->user_developer_datetime,
                "user_developer_email" => $this->user_developer_email
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}
