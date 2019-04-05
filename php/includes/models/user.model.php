<?php

class User
{
  public $id;
  public $name;
  public $email;
  public $creationDate;

  public static function getBySql($sql)
  {
    // Open database connection
    $database = new Database();

    // Execute database query
    $result = $database->query($sql);

    // Initialize object array
    $objects = array();

    // Fetch objects from database cursor
    while ($object = $result->fetch_object()) {
      $objects[] = $object;
    }

    // Close database connection
    $database->close();

    // Return objects
    return $objects;
  }

  public static function getAll()
  {
    // Build database query
    $sql = 'select * from users';

    // Return objects
    return self::getBySql($sql);
  }

  public static function getById($id)
  {
    // Initialize result array
    $result = array();

    // Build database query
    $sql = 'select * from users where id = ?';

    // Open database connection
    $database = new Database();

    // Get instance of statement
    $statement = $database->stmt_init();

    // Prepare query
    if ($statement->prepare($sql)) {
      // Bind parameters
      $statement->bind_param('i', $id);

      // Execute statement
      $statement->execute();

      // Bind variable to prepared statement
      $statement->bind_result($id, $name, $email, $creationDate);

      // Populate bind variables
      $statement->fetch();

      // Close statement
      $statement->close();
    }

    // Close database connection
    $database->close();

    // Build new object
    $object = new self();
    $object->id = $id;
    $object->name = $name;
    $object->email = $email;
    $object->creationDate = $creationDate;
    return $object;
  }

  public static function getByEmail($email)
  {
    $sql = "select * from users where email = '{$email}'";
    return self::getBySql($sql);
  }

  public function insert()
  {
    // Initialize affected rows
    $affected_rows = false;

    // Build database query
    $sql = 'insert into users (name, email) values (?, ?)';

    // Open database connection
    $database = new Database();

    // Get instance of statement
    $statement = $database->stmt_init();

    // Prepare query
    if ($statement->prepare($sql)) {
      // Bind parameters
      $statement->bind_param('ss', $this->name, $this->email);

      // Execute statement
      $statement->execute();

      // Get affected rows
      $affected_rows = $database->affected_rows;

      // Close statement
      $statement->close();
    }

    // Close database connection
    $database->close();

    // Return affected rows
    return $affected_rows;
  }

  public function update()
  {
    // Initialize affected rows
    $affected_rows = false;

    // Build database query
    $sql = 'update users set name = ?, email = ? where id = ?';

    // Open database connection
    $database = new Database();

    // Get instance of statement
    $statement = $database->stmt_init();

    // Prepare query
    if ($statement->prepare($sql)) {
      // Bind parameters
      $statement->bind_param('ssi', $this->name, $this->email, $this->id);

      // Execute statement
      $statement->execute();

      // Get affected rows
      $affected_rows = $database->affected_rows;

      // Close statement
      $statement->close();
    }

    // Close database connection
    $database->close();

    // Return affected rows
    return $affected_rows;
  }

  public function delete()
  {
    // Initialize affected rows
    $affected_rows = false;

    // Build database query
    $sql = 'delete from users where id = ?';

    // Open database connection
    $database = new Database();

    // Get instance of statement
    $statement = $database->stmt_init();

    // Prepare query
    if ($statement->prepare($sql)) {
      // Bind parameters
      $statement->bind_param('i', $this->id);

      // Execute statement
      $statement->execute();

      // Get affected rows
      $affected_rows = $database->affected_rows;

      // Close statement
      $statement->close();
    }

    // Close database connection
    $database->close();

    // Return affected rows
    return $affected_rows;
  }

  public function save()
  {
    // Check object for id
    if (isset($this->id)) {
      // Return update when id exists
      return $this->update();
    } else {
      // Return insert when id does not exists
      return $this->insert();
    }
  }
}
?>
