<?php

class db{
	public $con = "";
	private $db = "";
	/**
	 * connect
	 *  
	 * @param string $server
	 * @param string $db
     * @param string $user 
     * @param string $pass 
     * @return object
     **/  
    public function db($server, $db, $user, $pass){
		$this->con = mysql_connect($server, $user, $pass);
		if (!$this->con) {
		    return ('Could not connect: '.mysql_error());
		}else{
			return $this->db = mysql_select_db($db, $this->con);
		}
	}
	/**
	 * Return table fields
	 *
	 * @return array
	 * @author Ramon Roche
	 **/
	public function describe($table){
		$sql = "DESCRIBE $table";
		$fields = $this->fetchAll($sql);
		$return = array();
		for( $i = 0 ; $i < count( $fields->data ) ; $i++ ){
			$return[] = $fields->data[$i]['Field'];
		}
		return $return;
	}
	/**
	 * Truncate a Table from the DB
	 *
	 * @return void
	 * @author Ramon Roche
	 **/
	public function truncate($table){
		$sql = "TRUNCATE $table ;";
		$result = TRUE;
		if(!empty($sql)){
			$query = mysql_query($sql, $this->con) or die(mysql_error());
		}
		return $result;
	}
	/**
	 * fetch data from db and return in object
	 *
	 * @param string $sql
	 * @return object
	 **/
	public function fetchAll($sql){
		$result = false;
		if(!empty($sql)){
			$query = mysql_query($sql, $this->con) or die(mysql_error());
			if($query){
				$num = mysql_num_rows($query);
				$result = new stdClass();
				$result->count = $num;
				if ($num != 0) {
					$data = array();
					while($row  = mysql_fetch_assoc($query)){
						array_push($data, $row);
					}
					$result->data = $data;
				}
			}
		}
		return $result;
	}
	/**
	 * inser data in db and return object with id data
	 *
	 * @param string $sql
	 * @return object
	 **/
	public function insert($sql, $strict = true){
		$result = new stdClass();
		$result->success = false;
		if(!empty($sql)){
			$query = mysql_query($sql, $this->con) or die(mysql_error()."\n");
			$result->insertId = mysql_insert_id($this->con);
			$result->success = $query;
			$result->sql = $sql;
		}
		return $result;
	}
	/**
	 * remove data from db and return object with remove data
	 *
	 * @param string $sql
	 * @return object
	 **/
	public function remove($sql){
		$result = new stdClass();
		$result->success = false;
		if(!empty($sql)){
			$query = mysql_query($sql, $this->con);
			$result->success = $query;
		}
		return $result;
	}
	/**
	 * update data from db and return object with row info
	 *
	 * @param string $sql
	 * @return object
	 **/
	public function update($sql){
		$result = new stdClass();
		$result->success = false;
		if(!empty($sql)){
			$query = mysql_query($sql, $this->con);
			$result->updateId = mysql_insert_id($this->con);
			$result->success = $query;
		}
		return $result;
	}
}