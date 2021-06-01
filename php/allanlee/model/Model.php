<?php

namespace allanlee\model;

use PDO;
use PDOException;

class Model {

    const NO_CONNECTION = 'no database connection'; 
// database connection    
    private $db = null;
// references to PDOStatement object
    private $ps = null;
    // reference to an array created by a fetch
    private $row = null;
    // number of rows selected or updated
    private $rowCount = null;
    // error data
    private $errorMessage = "Currently our system is down. Please visit us again soon.";
    private $error = '';

    public function __construct() {
        try {
            
            // load access.ini which in localhost sits in the folder c:/xampp/go-camping/
            $filePath = $_SERVER['DOCUMENT_ROOT'] . "/../allanlee-access/access.ini";
            // the second parameter makes ini file sections a separate array
            $access = parse_ini_file($filePath, true);
            // set $host to either "localhost" or "remotehost" as defined in ini file
            $host = ($_SERVER['HTTP_HOST'] == 'localhost')?"localhost":"remotehost";
                // read the returned array
            $credentials  = $access[$host];
            $database = $credentials['database'];
            $username = $credentials['username'];
            $password = $credentials['password'];
            
// connect to database
            $this->db = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->error =  $this->errorMessage;
        }
    }

    public function query($query) {
        try {
            if($this->db != null)
            {
            $this->ps = $this->db->query($query);
            $this->rowCount = $this->ps->rowCount();
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->error =  $this->errorMessage;
        }
    }

    public function execute($query) {
        try {
             if($this->db != null)
            {
            $this->rowCount = $this->db->exec($query);
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->error = $this->errorMessage;
        }
    }

    public function prepare($query, $parameters = null) {
        try {
            if ($this->db != null) {

                $this->ps = $this->db->prepare($query);
                if ($parameters) {
                    $this->prepareBind($parameters);
                }
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->error = $this->errorMessage;
        }
    }

    public function prepareBind($parameters = null) {
        try {
            foreach ($parameters as $placeholder => $value) {
                $this->ps->bindValue($placeholder, $value);
            }
            $this->ps->execute();
            $this->rowCount = $this->ps->rowCount();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->error = $this->errorMessage;
        }
    }

    public function next() {
        $this->row = null;
        
        try {
            
            if($this->ps != null)
            {
            $this->row = $this->ps->fetch(PDO::FETCH_ASSOC);
            }
            
        } catch (PDOException $e) {
            error_log($e->getMessage());
            $this->error = $this->errorMessage;
        }
        
        return $this->row;
    }

    public function get($column) {
        if (isset($this->row[$column])) {
            return $this->row[$column];
        } else {
            error_log("undefined column name " . $column);
            return '';
        }
    }

    public function getRowCount() {
        return $this->rowCount;
    }

    public function setError($e)
    {
        $this->error = $e;
    }
    
    public function getError()
    {
        return $this->error;
    }

    
    // is any data returned from the query
    public function isDataReturned()
    {
        return ( $this->rowCount > 0);
    }
    
   // is there an error returns true or false;    
    public function isError()
    {
        return ($this->error != '');
    } 
  
  // start a database transaction  
    public function startTransaction()
 {
     $this->db->beginTransaction();
 }
 // commit the data from the transaction
  public function commit()
 {
     $this->db->commit();
 }
 // rollback any transaction statements
   public function rollback()
 {
     $this->db->rollback();
 }
 // get the last inserted record autoincrement id
 public function getLastId()
 {
     return $this->db->lastInsertId();
 }
    
}

?>
