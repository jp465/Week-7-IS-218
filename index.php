<?php
	$username = 'jp465';
	$password = 'eEOVTlIX';
	$hostname = 'sql1.njit.edu';

	$dsn = "mysql:host=$hostname;dbname=$username";

	try{
		$db = new PDO($dsn,$username,$password);
		echo "Connected Successfully<br><br>";
	}catch(PDOException $error){
		echo '<h3>DB Error</h3>';
		echo $error->getMessage();
		exit();
	}catch(Exception $error){
		echo '<h3>Generic</h3>';
		echo $error->getMessage();
		exit();
	}

	$query = 'SELECT * FROM accounts WHERE id < 6';
	$statement = $db->prepare($query);
	$statement->bindValue(':ID',2);
	$statement->execute();
	$accounts = $statement->fetchAll();
	$statement->closeCursor();

	$count=0;
	foreach ($accounts as $account) {
		$count++;
	}
	echo "$count<br><br>";
?>
<html>
<table style="border: 1px solid black">
	<?php foreach ($accounts as $account) :?>
		<tr>
			<td><?php echo $account['id']; ?></td>
			<td><?php echo $account['email']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>
</html>