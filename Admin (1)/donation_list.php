
<?php require_once 'check_admin_login.php';?>
<?php 
 //mysqli function, mysqli class, PDO (PHP Data Object)
error_reporting(E_ERROR);
try{
	$connection = mysqli_connect('localhost','root','','dog-adoption-project');
	$sql = "select * from donation";
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
    <title>List of Doantion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	
	<div class="list">
		<h1 class="h1list">List of Donation</h1>
			<div>
		
			</div>
		<table  class="tablestyle">
			<tr>
				<th>SN</th>
				
                <th>firstname</th>
                <th>lastname</th>
				<th>Email</th>
				<th>number</th>
				<th>Address</th>
				<th>donation_type</th>
                <th>image</th>
                <th>description</th>
				<th>Action</th>


			</tr>
			<?php foreach ($data as $key => $record) { ?>
				<tr>
					<td class="color-id"><?php echo $record['p_id'] ?></td>
					<td class="color-id"><?php echo $record['firstname'] ?></td>
					<td class="color-id"><?php echo $record['lastname'] ?></td>
					<td class="color-id"><?php echo $record['email'] ?></td>
					<td class="color-id"><?php echo $record['number'] ?></td>
					<td class="color-id"><?php echo $record['address'] ?></td>
					<td class="color-id"><?php echo $record['donation_type'] ?></td>
                    <td class="color-id"><?php echo $record['image'] ?></td>
                    <td class="color-id"><?php echo $record['description'] ?></td>
					<td class="actioncol">
                    <a href="view_donation.php?p_id=<?php echo $record['p_id'] ?>" class="view">View</a>
                    <a href="delete_donation.php?p_id=<?php echo $record['p_id']?>" class="del" onclick="return confirm('are you sure to delete?')">Delete</a>
                </td>
				</tr>
			<?php } ?>
		</table>
		
</div>

</body>
</html>


