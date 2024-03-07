<?php
class User_model extends CI_Model {

	// Fetch to get all users
	public function get_users() {
		$this->db->select('userid, nama, alamat, username, email, telepon, photo, user_level, last_login, created_at');
		$this->db->from('users');
		$query = $this->db->get();

		return $query->result();
	}

	//Fetch biodata record by ID
	public function get_user_by_id($userid) {
		$this->db->select('userid, nama, alamat, username, email, telepon, photo, user_level, last_login, created_at');
		$this->db->from('users');
		$this->db->where('userid', $userid);
		$query = $this->db->get();

		return $query->row();
	}

	// Function to insert a new user
	public function insert_user($data) {
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	// Function to insert a new user
	public function update_user($userid, $data) {
		$this->db->where('userid', $userid);
		return $this->db->update('users', $data);
	}

	// Function to insert a new user
	public function delete_user($userid) {
		return $this->db->delete('users', array('userid' => $userid));
	}

	// Add other insert to insert a new user as needed for usr management

	public function is_unique_username($username, $userid) {
		$this->db->where('userid !=', $userid);
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		return $query->num_rows() === 0;
	}

	public function is_unique_email($email, $userid) {
		$this->db->where('userid !=', $id);
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->num_rows() === 0;
	}

	public function getByEmail($email)
	{
		return $this->db->get_where('users', ['email' => $email])->row();
	}

	public function getByUsername($username)
	{
		return $this->db->get_where('users', ['username' => $username])->row();
	}
}
