<?php
class Login_model
{
	private $db;

	public function __construct()
	{
		// create object from database class
		$this->db = new Database;

		// check status
		if ($this->db == false) {
			echo "<script>console.log('Connection failed.' );</script>";
		} else {
			echo "<script>console.log('Connected successfully.' );</script>";
		}
	}

	public function check_login($data)
	{
		$user = $data['usernameoremail'];
		$password = $data['password'];

		$result = $this->db->query("select * from user where (username = '$user' OR email = '$user') AND password = '$password';");
		$this->db->db_close();

		if ($result->num_rows > 0) {
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $rows;
		} else {
			return [];
		}
	}

	public function register_user($data)
	{
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];
		$password = $data['password']; // sebaiknya di-hash
		$phone = $data['phone'];
		$role = "admin";

		$query = "INSERT INTO user (name, username, email, password, phone, role) 
              VALUES ('$name', '$username', '$email', '$password', '$phone', '$role')";

		$result = $this->db->query($query);
		$this->db->db_close();

		return $result;
	}


}
