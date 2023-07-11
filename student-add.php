<?php  
include("class.DataBase.php");
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $stname = $_POST['name'];
    $stage = $_POST['age'];
    $stgrade = $_POST['grade'];
    $db = new DataBase;
    $data = [["field"=>$stname,"type"=>PDO::PARAM_STR],
             ["field"=>$stage,"type"=>PDO::PARAM_STR],
             ["field"=>$stgrade,"type"=>PDO::PARAM_STR]  
            ];
$students = $db->insert("INSERT INTO `student`(`name`, `age`, `grade`)  VALUES (?,?,?) ;",$data); var_dump($students);
}


 ?>   
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="nav-item">Student List</a>
    </nav> 
    <div class="container">
        <h1>Add Student</h1>
        
        <!-- Student Form -->
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" required>
            </div>
            <div class="mb-3">
                <label for="grade" class="form-label">Grade</label>
                <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter grade" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>







