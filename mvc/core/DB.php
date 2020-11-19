<?php 
	require_once "./mvc/core/vendor/autoload.php";
	class DB
	{
		protected $servername = "mongodb://localhost:27017";
		protected $filter = [];
		protected $options = [];
		protected $query;
		public $mongoConnection;

		public $connection;
		protected $db;
		public $userCollection;
		public $messageCollection;

		public function __construct()
		{
			$this->query = new MongoDB\Driver\Query($this->filter, $this->options);
			$this->mongoConnection = new MongoDB\Driver\Manager($this->servername);

			$this->connection = new MongoDB\Client;
			$this->db = $this->connection->phongtrodb;
			$this->userCollection = $this->db->users;
			$this->messageCollection = $this->db->message;
		}

	}
 ?>