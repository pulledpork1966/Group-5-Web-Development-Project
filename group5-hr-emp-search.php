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

$empLname = $_POST["lastName"];
$empID = $_POST["empID"];

$conn = mysqli_connect($servername, $username, $password, $dbname);
empSearchLname($conn, $empLname);
empSearchID($conn, $empID);

if (!$conn)
{
	die('Connection to database was not made.');
}

function empSearchID($conn, $empID)
{
	$sql = "SELECT emp.employee_id, emp.first_name,
			emp.last_name, jbs.job_id, jbs.job_title, emp.salary FROM employees emp
			JOIN jobs jbs
            ON jbs.job_id = emp.job_id
			 WHERE emp.last_name='$empID' ";
	$result = mysqli_query($conn, $sql);
	
	
	$row = mysqli_fetch_assoc($result);
	
	
	echo "<h1>Search Completed By Employee ID</h1>";
	if(mysqli_num_rows($result) > 0){
		
		
		echo "<h2>EMPLOYEE SEARCH RESULT</h2>";
		echo "<table>";
		echo "<tr><th>EMP ID</th><th>First Name</th>
		<th>Last Name</th><th>Job Code</th><th>Job Title</th><th>Salary</th></tr>";
		
		
			echo "<tr>";
			echo '<td>' . $row['employee_id'] . '</td>';
			echo '<td>' . $row['first_name'] . '</td>';
			echo '<td>' . $row['last_name'] . '</td>';
			echo '<td>' . $row['job_id'] . '</td>';
			echo '<td>' . $row['job_title'] . '</td>';
			echo '<td>' . $row['salary'] . '</td>';
			echo "</tr>";
	
	
	echo "</table>";
}
	else
		{
			echo "No results.";
		}
}

function empSearchLname($conn, $empLname)
{
	echo "<h1>Search Completed By Last Name</h1>";
	
	
	$sql = "SELECT emp.employee_id, emp.first_name,
			emp.last_name, jbs.job_id, jbs.job_title, emp.salary FROM employees emp
			JOIN jobs jbs
            ON jbs.job_id = emp.job_id
			 WHERE emp.last_name='$empLname' ";
	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_assoc($result);
	
	if(mysqli_num_rows($result) > 0){
		echo "<h2>EMPLOYEE SEARCH RESULT</h2>";	
		echo "<table>";
		echo "<tr><th>EMP ID</th><th>First Name</th>
		<th>Last Name</th><th>Job Code</th><th>Job Title</th><th>Salary</th></tr>";
		
		echo "<tr>";
		echo '<td>' . $row['employee_id'] . '</td>';
		echo '<td>' . $row['first_name'] . '</td>';
		echo '<td>' . $row['last_name'] . '</td>';
		echo '<td>' . $row['job_id'] . '</td>';
		echo '<td>' . $row['job_title'] . '</td>';
		echo '<td>' . $row['salary'] . '</td>';
		echo "</tr>";
	
	
	echo "</table>";
	}
else
	{
		echo "No results.";
	}


echo "<footer>
	<p><a href='group5-hr-emp-search.html'>Return to Form Page</a></p>
	</footer>";

}
?>
</body>
<footer>
<p><a href="group5-hr-emp-search.html">Return to Form Page</a></p>
<p><a class="portalfooter" href="group5-hr-portal.html">Return to Portal</a></p>
</footer>
</html>