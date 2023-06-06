<?php
require('config.php');

class User extends Usuario
{
	protected $hostName;
	protected $userName;
	protected $password;
	protected $dbName;
	private $memberTable = 'members';
	private $dbConnect = false;

	public function __construct()
	{
		if (!$this->dbConnect) {

			$database = new Usuario();

			$this->hostName = $database->serverName;
			$this->userName = $database->userName;
			$this->password = $database->password;
			$this->dbName   = $database->dbName;

			$conn = new mysqli($this->hostName, $this->userName, null, $this->dbName);

			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}

	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}

		return $data;
	}

	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);

		return $numRows;
	}

	public function login()
	{
		$sqlQuery = "
			SELECT * 
			FROM " . $this->memberTable . " 
			WHERE email='" . $_POST['userEmail'] . "' AND password='" . md5($_POST['userPassword']) . "'";
		return  $this->getData($sqlQuery);
	}
}