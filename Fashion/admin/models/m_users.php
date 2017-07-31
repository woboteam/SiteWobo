<?php
include_once("database.php");
class M_user extends database{
	// user_id, user_name, user_email, user_pass, user_phone, user_code, user_reset, user_slug
	
	// Show all user
	public function list_all_users(){
		$query = "SELECT * FROM users";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	// Login
	public function login_admin($user_name, $user_pass){
		$query = "SELECT * FROM users WHERE (user_name=? or user_email=?) and user_pass = ? ";
		$this->setQuery($query);
		return $this->loadRow(array($user_name, $user_name, $user_pass));
	}
	// Get user by user_id
	public function user_by_id($user_id){
		$query = "SELECT * FROM users WHERE user_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($user_id));
	}
	// Get user by user_name
	public function user_by_name($user_name){
		$query = "SELECT * FROM users WHERE user_name=?";
		$this->setQuery($query);
		return $this->loadRow(array($user_name));
	}
	// Check is valid email
	public function check_email_valid($email){
		$query = "SELECT * FROM users WHERE user_email=?";
		$this->setQuery($query);
		return $this->loadRow(array($email));
	}
	// Check is valid user_name
	public function check_username_valid($user_name){
		$query = "SELECT * FROM users WHERE user_name=?";
		$this->setQuery($query);
		return $this->loadRow(array($user_name));
	}
	// Thêm user
	public function add_user($user_name, $password, $email){
		$query = "INSERT INTO users(user_name, password, email, date_create, date_modify) VALUES(?,?,?, NOW(), NOW())";
		$this->setQuery($query);
		return $this->execute(array($user_name, $password, $email));
	}
	// Update text_reset_pass
	public function update_text_reset_pass($user_name, $text_reset_pass){
		$query = "UPDATE users SET text_reset_pass=? WHERE user_name=?";
		$this->setQuery($query);
		return $this->execute(array($text_reset_pass, $user_name));
	}
	// Check text_reset_pass
	public function check_text_reset_pass($user_name, $text_reset_pass){
		$query = "SELECT * FROM users WHERE user_name = ? AND text_reset_pass = ?";
		$this->setQuery($query);
		return $this->loadRow(array($user_name, $text_reset_pass));
	}
	// Update Info User
	public function update_info_user($user_id, $email, $user_img){
		$query = "UPDATE users SET user_modify=NOW(), user_email=?, user_img=? WHERE user_id=?";
		$this->setQuery($query);
		return $this->execute(array($email, $user_img, $user_id));
	}
	public function change_pass($user_id, $user_pass){
		$query = "UPDATE users SET user_pass=? WHERE user_id=?";
		$this->setQuery($query);
		return $this->execute(array($user_pass, $user_id));
	}
}
?>