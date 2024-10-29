<?php
//include "DB.php";
$con = mysqli_connect("localhost", "root", "","learningplatform3");
//include('../includes/Connection.php');
class User
{
	public $UserName;
	public $Password;
	public $UserType_obj;
	public $ID;
	
	function __construct($id)	{
		
		if ($id !=""){
			$sql="select * from users where 	id=$id";
			$User = mysqli_query($GLOBALS['con'],$sql);
			if ($row = mysqli_fetch_array($User)){
				$this->UserName=$row["UserName"];
				$this->Password=$row["Password"];
				$this->ID=$row["id"];
				$this->UserType_obj= $row["usertype"];
			}
		}
	}
	// FEtch user by ID

	public static function getUserById($userID) {
        global $con;
        $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
	// count total quizzez taken by the user
	public static function countUserQuizzes($userID) {
		global $con;
		$stmt = $con->prepare("SELECT COUNT(*) as count FROM results WHERE user_id = ?");
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		return $row['count'];
	}
	
	public static function getUserProgress($userID) {
		global $con;
		$stmt = $con->prepare("SELECT quiz_title, score, total_questions FROM results r JOIN quizzes q ON q.id = r.quiz_id  WHERE user_id = ?");
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		return $row['quiz_title'] . ": " . (($row['score'] / $row['total_questions']) * 100) . '%';
	}
	
	static function login($UserName,$Password){
		$sql="SELECT * FROM users WHERE username='$UserName' and password='$Password'";	
		$result=mysqli_query($GLOBALS['con'],$sql);
		if ($row=mysqli_fetch_array($result)){
			$_SESSION["usertype"] = $row['usertype'];
			return new User($row[0]); 		
		}
		//echo "Invalid login";
		return NULL;
	}
	
	static function SelectAllUsersInDB(){
		$sql="select * from users";
		$Users = mysqli_query($con,$sql);
		$i=0;
		$Result;
		while ($row = mysql_fetch_array(Users)){
			$MyObj= new User($row["ID"]);
			$Result[$i]=$MyObj;
			$i++;
		}
		return $Result;
	}
	
	static function deleteUser($ObjUser){
		$sql="delete from users where id=".$ObjUser->ID;
		if(mysqli_query($GLOBALS['con'],$sql))
			return true;
		else
			return false;
	}
	
	static function InsertinDB_Static($UN,$PW)	{
		$sql="insert into users(UserName,Password,UserType_id) values ('$UN','$PW',2)";
		if(mysqli_query($GLOBALS['con'],$sql))
			return true;
		else
			return false;
	}
	
	function UpdateMyDB(){
		$sql="update users set UserName='".$this->UserName."' ,Password='$this->Password' where ID=".$this->ID."";
		if(mysqli_query($GLOBALS['con'],$sql))
			return true;
		else
			return false;	
	}	
}

?>