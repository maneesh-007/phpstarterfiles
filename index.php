<?php 
include("class.DataBase.php");
$db = new DataBase;
$students = $db->select("SELECT * FROM student");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar">
        <a href="student-add.php" class="nav-item">Add Student </a>
    </nav>    
    <div class="container">
        <h1>Student Records</h1>
        
        <!-- Search box -->
        <div class="mb-3">

            <input type="text" class="form-control" id="search-input" placeholder="Search">
            <input type="submit" name="submit" value="search" class="btn btn-primary"> 
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody id="student-table-body">
            	<?php foreach($students as $student): ?>
            	<tr>
            		<td><?php echo $student["id"];?></td>
            		<td><?php echo $student["name"];?></td>
            		<td><?php echo $student["age"];?></td>
            		<td><?php echo $student["grade"];?></td>
            	</tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

     <script type="text/javascript">
        $('#search-input').keyup(function() {
                var searchValue = $(this).val();
                $.ajax({
                	url:"student-search.php",
                	method:"post",
                	data:{name:searchValue},
                	success:function(data){
                       $("#student-table-body").html(data);
                	}
                });
            });
    </script>
</body>
</html>
