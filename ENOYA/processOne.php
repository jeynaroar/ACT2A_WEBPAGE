<?php
 include "connectionOne.php";

 if(isset($_POST["register"])){
    $student_no = $_POST["student_no"];
    $student_name = $_POST["student_name"];
    $course = $_POST["course"];
    
    
    $sql = "INSERT INTO students(
                    student_no,
                    student_name,
                    course
                )
                VALUES(
                    '$student_no',
                    '$student_name',     
                    '$course'
                )
    ";

    if(mysqli_query($conn, $sql)){
        echo "<script>
            alert('Student registered successfully!');
            window.location.href = 'registrationOne.php';
        </script>";
        exit();
    }
    else{
        echo "<script>
            alert('Error: " . mysqli_error($conn) . "');
            window.location.href = 'registrationOne.php';
        </script>";
        exit();
    }

 }
?>