<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
 	
 	function checkInstall() {
		$result = $this->db->query("SELECT count(*) AS 'total' FROM information_schema.tables WHERE table_schema = 'icmyazil_crm' AND (table_name = 'user')")->row(0)->total;

		if ($result == 0)
			return false;
		else
			return true;
 	}   

 	function getVariableTypes() {
 		$result = $this->db->query("SELECT * FROM variable_type");

 		return $result->result_array();
 	}

 	function startInstall($data) {
 		$results = array();
 		/* User Scripts */
 		$results['create_variable_names_table'] = $this->db->query("CREATE TABLE variable_name (
 			variable_name_id int unsigned not null auto_increment primary key,
 			name 	varchar(255),
 			value 	varchar(120),
 			display int(1) DEFAULT 1 NOT NULL
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['create_user_table'] = $this->db->query("CREATE TABLE user (
 			user_id int unsigned not null auto_increment primary key,
   		    user_username 		varchar(255),
			user_email 			varchar(120),
 			user_name 			varchar(255),
 			user_password 		varchar(255),
 			user_allowed_pages 	varchar(500),
 			user_status 			int
 			) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['create_owner_company_table'] = $this->db->query("CREATE TABLE owner_company (
 			owner_company_id int unsigned not null auto_increment primary key,
 			owner_company_name 	varchar(255),
 			owner_company_email 	varchar(120),
 			owner_company_logo 	varchar(255)
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['add_user_info'] = $this->db->query("INSERT INTO user SET user_username = " . $this->db->escape($data['admin_username']) . ", user_email = " . $this->db->escape($data['admin_email']) . ", user_password = " . $this->db->escape(md5($data['admin_password'])) . ", user_name = " . $this->db->escape($data['admin_name_surname']) . ", user_allowed_pages = 'all', user_status = '1'");

 		if ($data['admin_company_name'] != '')
 			$results['add_owner_company_info'] = $this->db->query("INSERT INTO owner_company SET owner_company_name = " . $this->db->escape($data['admin_company_name']));
 		/* User Scripts */

 		/* Customer Scripts */
 		$results['create_customer_company_table'] = $this->db->query("CREATE TABLE customer_company (
 			customer_company_id int unsigned not null auto_increment primary key,
 			customer_company_name 	varchar(255),
 			customer_company_email 	varchar(120),
 			customer_company_logo 	varchar(255)
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['create_customer_status_table'] = $this->db->query("CREATE TABLE customer_status (
 			customer_status_id int unsigned not null auto_increment primary key,
 			customer_status_content 	varchar(75),
 			customer_status_description varchar(500)
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['create_customer_group_table'] = $this->db->query("CREATE TABLE customer_group (
 			customer_group_id int unsigned not null auto_increment primary key,
 			customer_group_content 	   varchar(75),
 			customer_group_description varchar(500)
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['create_action_to_select_table'] = $this->db->query("CREATE TABLE action_to_select (
 			action_to_select_id int unsigned not null auto_increment primary key,
 			action_name varchar(75),
 			select_name varchar(75)
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['create_action_product_related_table'] = $this->db->query("CREATE TABLE action_product_related (
 			action_product_related int unsigned not null auto_increment primary key,
 			action_name varchar(75),
 			status 		int
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$results['create_action_status_table'] = $this->db->query("CREATE TABLE action_status (
 			action_status_id int unsigned not null auto_increment primary key,
 			content 	  varchar(120),
 			value varchar(255)
 		    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 		$customer_fields = array(
 			'customer_id' 			=> ' int unsigned not null auto_increment primary key,',
 			'customer_name'			=> ' varchar(75),',
 			'customer_surname'		=> ' varchar(75),',
 			'customer_email'		=> ' varchar(120),',
 			'customer_address'		=> ' varchar(255),',
 			'customer_phone'		=> ' varchar(30),',
 			'customer_status_id'	=> ' int,',
 			'customer_group_id'		=> ' int,',
 			'customer_company_id'	=> ' int,',
 			'customer_date_added'	=> ' datetime,',
 			'customer_date_updated'	=> ' datetime,'
		);

		$this->db->query("INSERT INTO variable_name (name, value) VALUES ('Müşteri No', 'customer_id'), ('Adı', 'customer_name'), ('Soyadı', 'customer_surname'), ('E-Posta', 'customer_email'), ('Adres', 'customer_address'), ('Telefon', 'customer_phone'), ('Ekleme Tarihi', 'customer_date_added'), ('Güncelleme Tarihi', 'customer_date_updated'), ('Müşteri Grubu', 'customer_group_id'), ('Durum', 'customer_status_id'), ('Şirket', 'customer_company_id')");

 		if (isset($data['customer'])) {
 			foreach ($data['customer'] as $value) {
 				$field_name = $this->clearTableName($value['field_name']);
 				$this->db->query("INSERT INTO variable_name SET value = '" . $field_name . "', name = '" . $value['field_name'] . "'");

 				switch ($value['field_type']) {
 					case 'varchar':
 						$field_type = ' varchar(255),';
 						break;
 					case 'text' ;
 						$field_type = ' text,';
 						break;
 					case 'integer' ;
 						$field_type = ' int,';
 						break;
 					case 'decimal' ;
 						$field_type = ' decimal(15,2),';
 						break;
 					case 'boolean' ;
 						$field_type = ' boolean,';
 						break;
 					case 'datetime' ;
 						$field_type = ' datetime,';
 						break;
 					case 'date' ;
 						$field_type = ' date,';
 						break;
 					case 'time' ;
 						$field_type = ' time,';
 						break;
 					case 'year' ;
 						$field_type = ' year,';
 						break;
 					case 'image' ;
 						$field_type = ' tinyblob,';
 						break;
 					case 'gallery' ;
 						$field_type = ' blob,';
 						break;
 					case 'select' ;
 						$table_name = $field_name;
 						$field_name .= '_id';

 						$results['create_custom_customer_select_' . $table_name] = $this->db->query("CREATE TABLE " . $table_name . " (
 							" . $field_name . " int unsigned not null auto_increment primary key,
 							content varchar(75),
 							value 	varchar(75)
 						    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

 						for ($i=0; $i < count($value['option_value']); $i++) { 
 							$this->db->query("INSERT INTO " . $table_name . " SET content = '" . $value['option_name'][$i] . "', value = '" . $value['option_value'][$i] . "'");
 						}

 						$field_type = ' int,';

 						break;
 				}

 				$customer_fields[$field_name] = $field_type; 
 			}
 		}

		$customer_table_sql = "CREATE TABLE customer (";
		
		foreach ($customer_fields as $key => $value) {
			$customer_table_sql .= $key . $value;
		}

		$customer_table_sql = rtrim($customer_table_sql, ",");
		$customer_table_sql .= ") CHARACTER SET utf8 COLLATE utf8_general_ci";

		$results['create_customer_table'] = $this->db->query($customer_table_sql);

		foreach ($data['action'] as $action) {
			$action_fields = array(
				'action_id' 			=> ' int unsigned not null auto_increment primary key,',
				'action_name'			=> ' varchar(75),',
				'action_notes'			=> ' varchar(255),',
				'action_status_id'		=> ' int,',
				'action_customer_id'	=> ' int,',
				'action_date_added'		=> ' datetime,',
				'action_date_updated'	=> ' datetime,' 
			);

			$this->db->query("INSERT INTO variable_name (name, value) VALUES ('İşlem No', 'action_id') ,('İşlem Adı', 'action_name'), ('İşlem Notları', 'action_notes'), ('İşlem Durumu', 'action_status_id'), ('Müşteri', 'action_customer_id'), ('Ekleme Tarihi', 'action_date_added'), ('Güncelleme Tarihi', 'action_date_updated')");

			foreach ($action['variables'] as $value) {
				$field_name = $this->clearTableName($value['field_name']);
 				$this->db->query("INSERT INTO variable_name SET value = '" . $field_name . "', name = '" . $value['field_name'] . "'");

				switch ($value['field_type']) {
					case 'varchar':
						$field_type = ' varchar(255),';
						break;
					case 'text' ;
						$field_type = ' text,';
						break;
					case 'integer' ;
						$field_type = ' int,';
						break;
					case 'decimal' ;
						$field_type = ' decimal(15,2),';
						break;
					case 'boolean' ;
						$field_type = ' boolean,';
						break;
					case 'datetime' ;
						$field_type = ' datetime,';
						break;
					case 'date' ;
						$field_type = ' date,';
						break;
					case 'time' ;
						$field_type = ' time,';
						break;
					case 'year' ;
						$field_type = ' year,';
						break;
					case 'image' ;
						$field_type = ' tinyblob,';
						break;
					case 'gallery' ;
						$field_type = ' blob,';
						break;
					case 'select' ;
						$table_name = $field_name;
						$field_name .= '_id';

						$results['create_custom_action_select_' . $table_name] = $this->db->query("CREATE TABLE " . $table_name . " (
							" . $field_name . " int unsigned not null auto_increment primary key,
							content varchar(75),
							value 	varchar(75)
						    ) CHARACTER SET utf8 COLLATE utf8_general_ci");

						for ($i=0; $i < count($value['option_value']); $i++) { 
							$this->db->query("INSERT INTO " . $table_name . " SET content = '" . $value['option_name'][$i] . "', value = '" . $value['option_value'][$i] . "'");
						}

						$this->db->query("INSERT INTO action_to_select SET action_name = " . $this->db->escape($this->clearTableName($action['action_name'])) . ", select_name = " . $this->db->escape($table_name));

						$field_type = ' int,';
						break;
				}

				$action_fields[$field_name] = $field_type; 
			}

			$action_table_sql = "CREATE TABLE " . $this->clearTableName($action['action_name']) . " (";
			$this->db->query("INSERT INTO variable_name SET value = '" . $this->clearTableName($action['action_name']) . "', name = '" . $action['action_name'] . "'");
			
			foreach ($action_fields as $key => $value) {
				$action_table_sql .= $key . $value;
			}

			$action_table_sql = rtrim($action_table_sql, ",");
			$action_table_sql .= ") CHARACTER SET utf8 COLLATE utf8_general_ci";

			$results['create_action_table_' . $action['action_name']] = $this->db->query($action_table_sql);

			if ($action['product_related']) {
				$this->db->query("INSERT INTO action_product_related SET action_name = " . $this->db->escape($this->clearTableName($action['action_name'])) . ", status = '1'");
			}
		}

		return $results;

 	}

 	public function clearTableName($name) {
 		$name = strtolower($name);
 		$name = preg_replace("[^A-Za-z0-9]", "", $name);
 		$name = str_replace(" ", "_", $name);
 		$name = str_replace(array('ı', 'ü', 'ğ', 'ç', 'ö', 'ş', 'İ', 'Ş', 'Ü', 'Ö', 'Ç'), array('i', 'u', 'g', 'c', 'o', 's', 'i', 's', 'u', 'o', 'c'), $name);
 		$name = strtolower($name);

 		return $name;
 	}
}