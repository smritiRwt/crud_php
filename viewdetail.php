<?php
	session_start();
	require "db.php";
	require_once "functions.php";
	$user = new CrudClass();
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}else{
		header('Location: get.php');
		exit();
	}
	
	
?>
<?php 
$pageTitle = "Student Details";
?>
<div class="profile">
		<table class="tab_one">
			<?php
				$getuser = $user->getuserbyid($st_id);
				while($row = $getuser->fetch_assoc()){
			?>
			<tr>
				<td></td>
				<?php if(empty($row['img'])){?>
				<td><img src="img/default.png" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }else{ ?>
				<td><img src="img/<?php echo $row['img']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }?>
			</tr>
			<tr>
				<td>Student ID: </td>
				<td><?php echo $row['st_id']; ?></td>
			</tr>
			<tr>
				<td>Name: </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td>E-mail: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Birthday: </td>
				<td><?php echo $row['bday']; ?></td>
			</tr>
			<tr>
				<td>Program: </td>
				<td><?php echo $row['program']; ?></td>
			</tr>
			<tr>
				<td>Contact: </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<tr>
				<td>Gender: </td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<tr>
				<td>Update Profile: </td>
				<td><a href="edit.php?id=<?php echo $row['st_id'];?>"><button class="editbtn">Edit Profile</button></a></td>
			</tr>
			<?php  } ?>
		</table>
		<div class="back fix">
			<p style="text-align:center"><a href="get.php"><button class="editbtn">Back to student list</button></a></p>
		</div>

</div>

