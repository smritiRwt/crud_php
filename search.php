<?php
	session_start();
	require "db.php";
	require_once "functions.php";
	$user = new CrudClass();

?>
<?php 
$pageTitle = "All student details";
?>
	<div class="search_result">		
		
		
		<table class="tab_one">
			
			<?php 
				$key = $_GET['src_student'];
				$min_length = 1;
				if(strlen($key) >= $min_length){
					$key = htmlspecialchars($key);
					$src_result = $user->search($key);
					$count = $src_result->num_rows;
					if($count>0){
			?>
			<tr>
				<th>Name</th>
				<th>ID</th>
				<th>Show Profile</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Photo</th>
			</tr>
			<?php
					while($rows = $src_result->fetch_assoc()){				
			?>
			
			<tr>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td><a href="viewdetail.php?id=<?php echo $rows['st_id'];?>">View Details</a></td>
				<td><a href="edit.php?id=<?php echo $rows['st_id'];?>">Edit</a></td>
				<td><a href="delete.php?id=<?php echo $rows['st_id'];?>">Delete</a></td>
				<td><img src="img/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
			</tr>
			
			<?php } ?>
			</table>
		<?php
		}else{
				echo "<h2 style='font-size:45px;text-align:center;color:#ddd;'>Opps....No result found !</h2>";
			}
				
		}else{
			  echo "<h2 style='font-size:45px;text-align:center;color:#ddd;'>Opps....No result found !</h2>";
		}
		?>
		<div class="back fix">
			<p style="text-align:center"><a href="get.php"><button class="editbtn">Back to student list</button></a></p>
		</div>
	</div>
