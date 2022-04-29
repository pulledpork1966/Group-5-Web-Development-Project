<?php

$servername = "localhost";
$username = "cti110";
$password = "wtcc";
$dbname = "hr";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
{
	die('Connection to database was not made.');
}

$jobTitle = $_POST['jobTitle'];

echo '<h1>List of ' . $jobTitle . '</h1>';




function avgWage($conn, $jobTitle){
	$sql="SELECT AVG(emp.salary)
			AS avgSalary FROM employees emp 
			JOIN jobs jbs 
            ON jbs.job_id = emp.job_id 
			WHERE jbs.job_title='$jobTitle'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo "<p>Average salary wage: $" . number_format($row['avgSalary'], 2) . "</p>";
}


function empTitleSearch($conn, $jobTitle){
	$sql="SELECT emp.employee_id, emp.first_name,
			emp.last_name, jbs.job_id, jbs.job_title, emp.salary FROM employees emp
			JOIN jobs jbs
            ON jbs.job_id = emp.job_id
			 WHERE jbs.job_title='$jobTitle' ";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		echo "<table>";
		echo "<tr><th>EMP ID</th><th>First Name</th>
		<th>Last Name</th><th>Job Code</th><th>Job Title</th><th>Salary</th></tr>";
	
	  while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo '<td>' . $row['employee_id'] . '</td>';
		echo '<td>' . $row['first_name'] . '</td>';
		echo '<td>' . $row['last_name'] . '</td>';
		echo '<td>' . $row['job_id'] . '</td>';
		echo '<td>' . $row['job_title'] . '</td>';
		echo '<td>' . $row['salary'] . '</td>';
		echo "</tr>";
	}
		echo "</table>";
	}
}

avgWage($conn, $jobTitle);
empTitleSearch($conn, $jobTitle);

?>