<?php
Class UserClass
{

	//CONNECT TO DATABASE	
	public function DBConnect()
	{

		$dbhost ="localhost"; 
		$dbname ="user" ; 
		$dbuser ="root" ; 
		$dbpass ="";  

		try
		{
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
			$dbConnection->exec("set names utf8");
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $dbConnection;
		}

		catch (PDOException $e) 
		{
			echo 'Connection failed: ' . $e->getMessage();
		}	
	}	
	
	//VALIDATION REGISTER
	public function userRegistration($username,$email,$password)
	{

		try
		{
		$dbConnection = $this->DBConnect();
		$stmt = $dbConnection->prepare('SELECT * FROM `user` WHERE `EMAILID` = :EMAILID ');
		$stmt->bindParam(":EMAILID", $email,PDO::PARAM_STR);
		$stmt->execute();

		$Count = $stmt->rowCount();
		if($Count < 1)
		{
			$stmt = $dbConnection->prepare('INSERT INTO `user`(USERNAME,EMAILID,PASSWORD,JOINDATE) 
			VALUES(:USERNAME,:EMAILID,:PASSWORD,:JOINDATE)');

			$joindate =  date("F j, Y, g:i a"); 
			$hash_password= hash('sha256', $password); 

			$stmt->bindParam(':USERNAME', $username,PDO::PARAM_STR ); 
			$stmt->bindParam(':EMAILID', $email,PDO::PARAM_STR); 
			$stmt->bindParam(':PASSWORD', $hash_password,PDO::PARAM_STR ); 
			$stmt->bindParam(':JOINDATE', $joindate,PDO::PARAM_STR); 
			$stmt->execute();

			$Count = $stmt->rowCount();

			if($Count  == 1 )	
			{
				$uid=$dbConnection->lastInsertId(); 
				$dbConnection = null;

				return true;  
			}

			else
			{
				$dbConnection = null;
				return false;	
			}
				
		}
		
		else
		{
			//Email-ID already exits
			$dbConnection = null;
			return false;	
			}
		}

		catch (PDOException $e) 
		{
		echo 'Connection failed: ' . $e->getMessage();
		}
	}	
		
	//VALIDATION LOGIN
	public function userLogin($email,$password)
	{
		
		try
		{
			$dbConnection = $this->DBConnect();
			$stmt = $dbConnection->prepare('SELECT * FROM `user` 
			WHERE `EMAILID` = :EMAILID and `PASSWORD` = :PASSWORD');
			
			$hash_password= hash('sha256', $password); 
			$stmt->bindParam(":EMAILID", $email,PDO::PARAM_STR);
			$stmt->bindParam(":PASSWORD", $hash_password,PDO::PARAM_STR);
			$stmt->execute();

			$Count = $stmt->rowCount();
			
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			if($Count == 1)
			{
				session_start();
				$_SESSION['uid']=$data->UID; 
				$_SESSION['uname']=$data->USERNAME; 
				
				$dbConnection = null ;
				return true;
							
			}
			else
			{
				$dbConnection = null ;
				return false;	
			}
			
		}

		catch (PDOException $e) 
		{
			echo 'Connection failed: ' . $e->getMessage();
		}
		
	}		
}
?>