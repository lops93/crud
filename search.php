<!DOCTYPE html>

<?php include 'db.php'; 

if (isset($_POST['search'])) {
	$name = htmlspecialchars($_POST['search']);
	$sql = "select * from task where name like '%$name%' "; 

$rows = $db->query($sql);
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
				<center><h1>Todo List</h1></center>
				
				<div class="col-md-10 ">
					<br>


					<div class="col-md-12 text-center">
						
						<form action="search.php" method="post" class="form-group"><p>Search
						<input type="text" placeholder="Search" name="search" class="form-control">	</p>

						</form>
					</div>
					<?php if(mysqli_num_rows($rows) < 1): ?>
						<h2 class="text-danger text-center">Nothing Found</h2>
						<a href="index.php" class="btn btn-warning">Back</a>
						<?php else:  ?>

					<table class="table table-hover">
						<button type="button" class="btn btn-success" data-target="#Mymodal" data-toggle="modal">Add Task</button>
						<button type="button" class="btn btn-light offset-md-4" onclick="print()">Print</button><hr><br>
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Task</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php while ($row = $rows->fetch_assoc()): 
								
								?>
								<?php //var_dump($row) //tudo certo ?>

								<th><?php echo $row['id']; ?></th>
								<td class="col-md-10"><?php echo $row['name']; ?></td>
								<td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success" class="btn btn-success">Edit</a></td>
								<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
							</tr>
							<?php endwhile;  ?>
							
						</tbody>
						<?php endif; ?>
					</table>





					<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php">
        	<div class="form-group">
        		<label>Task Name</label>
        		<input type="text" required name="task" class="form-control">
        	</div>
        	<input type="submit" name="send" value="Add Task" class="btn btn-secondary">
        </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary">add task</button>
      </div>
    </div>
  </div>
</div>
				</div>
			</div>
		</div>
	</body>
</html>