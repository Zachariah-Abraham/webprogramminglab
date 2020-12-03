<?php
 
    require 'dbConn.php';
    // var name = document.contactForm.name.value;
    // var password = document.contactForm.password.value;
    // var email = document.contactForm.email.value;
    // var address = document.contactForm.address.value;
    // var mobile = document.contactForm.mobile.value;
    // var languages = document.contactForm.languages.value;
    // var gender = document.contactForm.gender.value;
    // var course = [];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email']; 
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $languages = $_POST['languages'];
    $gender = $_POST['gender'];
    $course = implode(', ', $_POST['course']);
 
    $sql ="SELECT name FROM users WHERE name=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo '<h1>Cannot start db connection</h1>';
        exit();
    } else{
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            echo '<h1> Username already exists!</h1>';
            exit();
        } else{
            $sql = "INSERT INTO users (name, password, email, address, mobile, languages, gender, course) VALUES ('".$name."','".$password."','".$email."','".$address."','".$mobile."','".$languages."','".$gender."','".$course."');";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                $smth = var_dump($stmt);
                echo '<h1>Cannot prepare statement!</h1>';
                exit();
            } else{
                mysqli_stmt_execute($stmt);
                echo '<h1>Registration done!</h1>';
                $query = "SELECT name, password, email, address, mobile, languages, gender, course FROM users";

 
                echo '<table border="0" cellspacing="2" cellpadding="2"> 
                    <tr> 
                        <td> <font face="Arial">Name</font> </td> 
                        <td> <font face="Arial">Password</font> </td> 
                        <td> <font face="Arial">Email</font> </td> 
                        <td> <font face="Arial">Address</font> </td> 
                        <td> <font face="Arial">Mobile</font> </td> 
                        <td> <font face="Arial">Languages</font> </td> 
                        <td> <font face="Arial">Gender</font> </td> 
                        <td> <font face="Arial">Course</font> </td> 
                    </tr>';
 
                if ($result = $conn->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        $field1name = $row["name"];
                        $field2name = $row["password"];
                        $field3name = $row["email"];
                        $field4name = $row["address"];
                        $field5name = $row["mobile"]; 
                        $field6name = $row["languages"]; 
                        $field7name = $row["gender"]; 
                        $field8name = $row["course"]; 
                        echo '<tr> 
                                <td>'.$field1name.'</td> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field4name.'</td> 
                                <td>'.$field5name.'</td>
                                <td>'.$field6name.'</td>
                                <td>'.$field7name.'</td> 
                                <td>'.$field8name.'</td>
                            </tr>';
                    }
                    $result->free();
                } 
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
