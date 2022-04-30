<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="group5-hr-style.css">
</head>
<body>
<?php

$servername = "localhost";
$username = "cti110";
$password = "wtcc";
$dbname = "hr";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$department = $_POST['department'];

empSearchDepartment($conn, $department);

function empSearchDepartment($conn, $department)
{
	echo "<h1>Search Completed By $department</h1>";
	
	
	$sql = "SELECT emp.employee_id, emp.first_name,
			emp.last_name, emp.job_id, dpts.department_name, dpts.department_id, emp.salary FROM employees emp
			JOIN departments dpts
            ON dpts.department_id = emp.department_id
			 WHERE dpts.department_name='$department' ";
	$result = mysqli_query($conn, $sql);
	
	
	if (mysqli_num_rows($result) > 0){
		echo "<h2>EMPLOYEE SEARCH RESULT</h2>";	
		echo "<table>";
		echo "<tr><th>EMP ID</th><th>First Name</th>
		<th>Last Name</th><th>Job Code</th><th>Dep. Name</th><th>Salary</th></tr>";
		
		while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo '<td>' . $row['employee_id'] . '</td>';
		echo '<td>' . $row['first_name'] . '</td>';
		echo '<td>' . $row['last_name'] . '</td>';
		echo '<td>' . $row['job_id'] . '</td>';
		echo '<td>' . $row['department_name'] . '</td>';
		echo '<td>' . $row['salary'] . '</td>';
		echo "</tr>";
		}
	
	echo "</table>";
	}
else
	{
		echo "No results.";
	}
}




?>

</body>
<footer>
<p><a href="group5-hr-department.html">Return to Form Page</a></p>
<p><a class="portalfooter" href="group5-hr-portal.html">Return to Portal</a></p>
</footer>
</html>