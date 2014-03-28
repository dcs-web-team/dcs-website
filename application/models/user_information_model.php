<?php
	class User_information_model extends CI_Model {
		public function __construct() {
			parent:: __construct();
			$this->load->database();
		}

		public function getUserCredential($id) {
			$this->db->where ('id', $id);
			$result = $this->db->get ('user');
			return $result->row();			
		}

		public function authentication($username, $password) {
			$this->db->where(array('username' => $username, 'password' => md5($password)));
		}

		public function fetchUserInformation($id) {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('information', 'information.u_id = user.id');
			$this->db->join('contact', 'contact.u_id = user.id');
			$this->db->where ('user.id', addslashes($id));

			$result = $this->db->get();
			return $result->row();
		}
		
		public function editUserInformation($info, $contact_num) {
			
		}

	}
?>