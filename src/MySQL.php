<?php

  /*
  ------------------------------------------------------------------------------------------------
  |                                    MySQL Exception Class                                     |
  ------------------------------------------------------------------------------------------------
  */

  class MySQLException extends \Exception
  {

  }

  /*
  ------------------------------------------------------------------------------------------------
  |                                        MySQL Class                                           |
  ------------------------------------------------------------------------------------------------
  */

  class MySQL
  {

    static $self = null;

    /*
    ------------------------------------------------------------------------------------------------
    |                                  MySQL __construct Function                                  |
    ------------------------------------------------------------------------------------------------
    */

    public function __construct($host = "localhost", $port = 3306, $username = "root", $password = null)
    {

      if(!(isset($host) or isset($port) or isset($username) or isset($password)))
      {

        throw new \MySQLException("All argument(s) passed to MySQL::__construct must not be empty.");

      }
      else
      {

        self::$self = @mysqli_connect($host . ":" . $port, $username, $password);

        if(self::$self)
        {

          return self::$self;

        }
        else
        {

          self::$self = null;

          throw new \MySQLException("Could not connect to a MySQL Server on http://" . $host . " on port " . $port . " - " . mysqli_connect_error());

        }

      }

    }

    /*
    ------------------------------------------------------------------------------------------------
    |                                    MySQL query Function                                      |
    ------------------------------------------------------------------------------------------------
    */

    public function query($query = null, $fetch_assoc = false)
    {

      if(!(isset(self::$self)))
      {

        throw new \MySQLException("You must first create a MySQL Connection(using MySQL::__construct) before trying to query the MySQL Database.");

      }
      else
      {

        if(!(isset($query) or isset($fetch_assoc)))
        {

          throw new \MySQLException("All argument(s) passed to MySQL::query must not be empty.");

        }
        else
        {

          $stmt = @self::$self->prepare($query);

          if($stmt)
          {

            $stmt->execute();

            if(mysqli_error(self::$self) != null)
            {

               throw new \MySQLException("There is an error in your MySQL Query - " . mysqli_error(self::$self));

            }
            else
            {

              $stmt_result = $stmt->get_result();

            }

            if($fetch_assoc == true)
            {

              if($stmt_result->num_rows > 0)
              {

                while(($row[] = $stmt_result->fetch_assoc()))
                {

                }

                return $row;

              }

            }
            else
            {

              return $stmt_result;

            }

          }
          else
          {

            throw new \MySQLException("Query passed to MySQL::query is invalid.");

          }

        }

      }

    }

    /*
    ------------------------------------------------------------------------------------------------
    |                                    MySQL close Function                                      |
    ------------------------------------------------------------------------------------------------
    */

    public function close()
    {

      if(!(isset(self::$self)))
      {

        throw new \MySQLException("You must first create a MySQL Connection(using MySQL::__construct) before trying to close a MySQL Connection.");

      }
      else
      {

        return mysqli_close(self::$self);

        self::$self = null;

      }

    }

  }

?>
