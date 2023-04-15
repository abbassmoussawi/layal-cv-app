<?php
class ParentClass
{
    public static $tableName = '';
    public static $className = '';
    public static $dbColumns = [];
    static public $db;

    static public function set_database($database)
	{
		self::$db = $database;
	}
	//find by id
	static public function find_by_id($id)
	{
		$sql = 'SELECT * FROM ' . static::$tableName . ' WHERE id = ' . $id;
		$statement = self::$db->query($sql);
		$row = $statement->fetchObject(static::$className);
		return $row;
	}
	//find all
	static public function find_all()
	{
		$sql = 'SELECT * FROM ' . static::$tableName;
		$statement = self::$db->query($sql);
		$row = $statement->fetchAll(PDO::FETCH_CLASS, static::$className);
		return $row;
	}

	static public function find_email($email){
		$sql = "SELECT * FROM " . static::$tableName . " WHERE email = '$email'";
		$statement= self::$db->query($sql);
		$data =  $statement->fetchObject(static::$className);
		dd($data);

	
}
	

    static public function verify_user($email,$password)
	{
        $sql = "SELECT 1 FROM " . static::$tableName . " WHERE password = '$password' AND email = '$email' AND type='Main_Author'";
        $statement = self::$db->query($sql);
        return $statement->fetchObject(static::$className);
	}

	static public function verify_user_type(){
        $sql = "SELECT 1 FROM " . static::$tableName . " WHERE type = 'Main_Author'";
		// dd($sql);
		$statement = self::$db->query($sql);
        return $statement->fetchObject(static::$className);
	}

	public function attributes()
	{
		$attributes = [];
		foreach (static::$dbColumns as $column) {
			if ($column == 'id') {
				continue;
			}
			$attributes[$column] = $this->$column;
			// dd($attributes);
		}
		return $attributes;
	}

	public function create()
	{
		$sql = "INSERT INTO " . static::$tableName . " (";
		$sql .= join(', ', array_keys($this->attributes()));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($this->attributes()));
		$sql .= "')";
		$result = self::$db->query($sql);
		return $result;
	}
	public function update($id)
	{
		$attribute_pairs = [];
		foreach ($this->attributes() as $key => $value) {
			// if ($key == 'hashed_password') {
			// 	continue;
			// }
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . static::$tableName . " SET ";
		$sql .= join(', ', $attribute_pairs);
		$sql .= " WHERE id= " . $id;
		$sql .= " LIMIT 1";
		$result = self::$db->query($sql);
		return $result;
	}
	static public function delete($id)
	{
		$sql = 'DELETE FROM ' . static::$tableName . ' WHERE id = ' . $id;
		$statement = self::$db->query($sql);
		$row = $statement->fetchObject(static::$className);
		return $row;
	}

  
}