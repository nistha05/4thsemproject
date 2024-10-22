
<?php require_once 'check_admin_login.php';?>
<?php 
 //mysqli function, mysqli class, PDO (PHP Data Object)
error_reporting(E_ERROR);
try{
	$connection = mysqli_connect('localhost','root','','dog-adoption-project');
	$sql = "select * from information";
	$res = mysqli_query($connection,$sql);
	$data = [];
	// print_r($res);
	if ($res->num_rows > 0) {
		while ($r = mysqli_fetch_assoc($res)) {
			array_push($data, $r);
		}
	}
	// print_r($data);
}catch(Exception $e){
	die('Connection Error: ' . $e->getMessage());
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of adoption</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	
	<div class="list">
		<!-- <h1 class="h1list">List of Adoption</h1> -->
			<div>
		
			</div>
		<table  class="tablestyle">
			<tr>
				<th>SN</th>
				<th>fname</th>
                <th>lname</th>
				<th>Email</th>
				<th>phone</th>
				<th>Address</th>
				<th>Action</th>
            </tr>
			<?php foreach ($data as $key => $record) { ?>
				<tr>
					<td class="color-id"><?php echo $record['id'] ?></td>
					<td class="color-id"><?php echo $record['fname'] ?></td>
					<td class="color-id"><?php echo $record['lname'] ?></td>
					<td class="color-id"><?php echo $record['email'] ?></td>
					<td class="color-id"><?php echo $record['phone'] ?></td>
					<td class="color-id"><?php echo $record['address'] ?></td>
					<td class="actioncol">
                    <a href="view_adoption.php?id=<?php echo $record['id'] ?>" class="view">View</a>
                    <a href="delete_adoption.php?id=<?php echo $record['id']?>" class="del" onclick="return confirm('are you sure to delete?')">Delete</a>
                </td>
				</tr>
			<?php } ?>
		</table>
		
</div>

</body>
</html>


