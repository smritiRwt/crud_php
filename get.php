<?php
	ob_start ();
	session_start();
	require "db.php";
	require_once "functions.php";
	$user = new CrudClass();
	
?>
<?php 
$pageTitle = "All student details";
?>
<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>All Registered Student List</h3></div>
		
		<div class="search">
		<form action="search.php" method="GET">
			<input type="text" name="src_student" placeholder="search student" />
			<input type="submit" value="Search" />
		</form>
        <a href="create.php">Create</a>
	</div>
	</div>
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data deleted successfully</h3>";
				}
			}
			
		?>
		<table class="tab_one">
			<tr>
				<th>SL</th>
				<th>Name</th>
				<th>ID</th>
				<th>Show Profile</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Photo</th>
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td><a href="viewdetail.php?id=<?php echo $rows['st_id'];?>">View Details</a></td>
				<td><a href="edit.php?id=<?php echo $rows['st_id'];?>">Edit</a></td>
				<td><a href="delete.php?id=<?php echo $rows['st_id'];?>">Delete</a></td>
				<td><img src="img/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
			</tr>
			<?php } ?>
		</table>
</div>
<?php ob_end_flush() ; ?>