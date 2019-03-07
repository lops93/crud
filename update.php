<!DOCTYPE html>

<?php include 'db.php'; 
$id = (int)$_GET['id'];
$sql = "select * from task where id='$id'";
$rows = $db->query($sql);

$row = $rows->fetch_assoc();
if(isset($_POST['send'])){
	
	$task = htmlspecialchars($_POST['task']);
	$sql2 = "update task set name='$task' where id ='$id'";

	$db->query($sql2);

	header('location: index.php');

}
?>
<html>
	<head>
		<title>Crup App</title>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row" style="margin-top: 70px">
				<center><h1>Update List</h1></center>
				
				<div class="col-md-10 ">
					<br>
			 

					<!-- Button trigger modal -->


<!-- Modal -->

    
        <form method="post" >
        	<div class="form-group">
        		<label>Task Name</label>
        		<input type="text" required name="task" class="form-control">
        	</div>
        	<input type="submit" name="send" value="Update Task" class="btn btn-secondary">
        </form>
      
				</div>
			</div>
		</div>
	</body>
</html>