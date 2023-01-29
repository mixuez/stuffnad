<?php



class BaseClass extends Database
{
  protected $table;

  public function findAll()
  {
    $sql = "SELECT *FROM $this->table";
    return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
  }

  public function find(string $value = NULL, string $option = "id")
  {
    if ($option == NULL || $value == NULL) {
      return exit;
    }

    $option = $this->db->escape_string($option);
    $value = $this->db->escape_string($value);

    $sql = "SELECT *FROM $this->table WHERE $option = '$value'";
    $row = $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    return $row[0];
  }

  public function create($data = NULL)
  {
    if ($data == NULL) {
      return exit;
    }

    $values = "";
    foreach ($data as $value) {
      $values .= "'$value',";
    }
    $values = rtrim($values, ',');

    $column = "";
    foreach (array_keys($data) as $name) {
      $column .= "$name,";
    }
    $column = rtrim($column, ',');

    $sql = "INSERT INTO $this->table ($column) VALUES($values)";

    if ($this->db->query($sql)) {
      return 1;
    }
  }

  public function update($id, $data, string $option = NULL)
  {
    if ($data == NULL) {
      return exit;
    }

    $optionDefault = "id";
    if ($option !== NULL) {
      $optionDefault = $option;
    }

    $column = "";
    foreach (array_keys($data) as $name) {
      $column .= "$name = '$data[$name]',";
    }
    $column = rtrim($column, ',');

    $sql = "UPDATE $this->table SET $column WHERE $optionDefault = '$id'";

    // echo $sql;

    if ($this->db->query($sql)) {
      return 1;
    }
  }

  public function delete($id, string $option = NULL)
  {
    $optionDefault = "id";
    if ($option !== NULL) {
      $optionDefault = $option;
    }

    $sql = "DELETE FROM $this->table WHERE $optionDefault = '$id'";
    if ($this->db->query($sql)) {
      return 1;
    }
  }
}
