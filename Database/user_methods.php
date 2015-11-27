<?php

function createUser($username, $password)
{
	$db_users = new PDO('sqlite:Database/users.db');
	$sql = "SELECT username FROM users where username= :username";
	$stmt = $db_users->prepare($sql);
	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
	$stmt->execute();

	$result = $stmt->fetchAll();

	if(count($result) > 0)
	{
		return false;
	}

	$sql = "INSERT INTO user(username,password) VALUES(:username, :password)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
	$stmt->bindParam(':password', $password, PDO::PARAM_STR);

	try
	{
		$stmt->execute();
	}
	cacth(PDOException $e)
	{
		return -1;
	}

	return true;
}

function deleteUser($username)
{
	$db_users = new PDO('sqlite:Database/users.db');
	$sql = "SELECT username FROM users where username= :username";
	$stmt = $db_users->prepare($sql);
	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
	$stmt->execute();
	
	$result = $stmt->fetchAll();

	if(!(count($result) === 1))
	{
		return false;
	}

	$sql="DELETE FROM users WHERE username = :username";
	$stmt = db_users->prepare($sql);
	$stmt->bindParam(':username, $username, PDO::PARAM_STR');
	$stmt->execute();

	return true;
}


function getAllUsers() {
	$db_users = new PDO('sqlite:Database/users.db');
	$sql = "SELECT * FROM user";
	$stmt = $db_users->prepare($sql);
	try
	{
	$stmt->execute();
	}
	catch(PDOException $e)
	{
		return -1;
	}

	$result = $stmt->fetchAll();
	return $result;
}

function getUserById($id_user) {
	$db_users = new PDO('sqlite:Database/users.db');

	$sql = "Select * from users WHERE id=:id_user";
	$stmt = $db_users->prepare($sql);
	$stmt->bindParam('id_user',$id_user, PDO::PARAM_STR);
	
	try
	{
	$stmt->execute();
	}
	catch(PDOException $e)
	{
		return -1;
	}

	$result = $stmt->fetch();
	return $result;
}




?>