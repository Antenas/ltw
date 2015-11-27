<?php

function createEvent($event_name, $username, $image_path, $date, $description)
{
	$db_events = new PDO('sqlite:Database/events.db');
	$sql = "SELECT event_name FROM events where event_name= :event_name";
	$stmt = $db_events->prepare($sql);
	$stmt->bindParam(':event_name', $event_name, PDO::PARAM_STR);
	$stmt->execute();

	$result = $stmt->fetchAll();

	if(count($result) > 0)
	{
		return false;
	}


	$sql = "INSERT INTO events(event_name,username,date,image_path,description) VALUES( :event_name, :username,  :image_path, :date, :description)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':event_name', $eventname, PDO::PARAM_STR);
	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
	$stmt->bindParam(':image_path', $image_path, PDO::PARAM_STR);
	$stmt->bindParam(':date', $date, PDO::PARAM_STR);
	$stmt->bindParam(':description', $description, PDO::PARAM_STR);


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



function deleteEvent($event_name)
{
	$db_events = new PDO('sqlite:Database/events.db');
	$sql = "SELECT event_name FROM events where event_name= :event_name";
	$stmt = $db_users->prepare($sql);
	$stmt->bindParam(':event_name', $event_name, PDO::PARAM_STR);
	$stmt->execute();

	$result = $stmt->fetchAll();

	if(!(count($result)) === 1)
	{
		return false;
	}

	$sql="DELETE FROM events WHERE event_name = :event_name";
	$stmt = db_events->prepare($sql);
	$stmt->bindParam(':event_name, $event_name, PDO::PARAM_STR');
	$stmt->execute();

	return true;

}

function getAllEvents() {
	$db_events = new PDO('sqlite:Database/events.db');
	$sql = "SELECT * FROM events";
	$stmt = $db_events>prepare($sql);
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

function getEventById($id_event) {
	$db_event = new PDO('sqlite:Database/event.db');

	$sql = "Select * from events WHERE id=:id_event";
	$stmt = $db_event->prepare($sql);
	$stmt->bindParam('id_event',$id_event, PDO::PARAM_STR);
	
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