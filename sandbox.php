<?php 

    //sessions
    if(isset($_POST['submit'])) {

        // cookie for gender,   hàm setcookie(tên cookie, giá trị nhập vào, thời gian tồn tại)
        setcookie('gender', $_POST['gender'], time() + 86400); 
        session_start();
        $_SESSION['name'] = $_POST['name'];
        echo $_SESSION['name'];
        header('Location: index.php');
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>PHP tuts</title>
</head>
<body>
    
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="name">
    <select name="gender">
        <option value="male">male</option>
        <option value="female">female</option>
    </select>
    <input type="submit" name="submit" value="submit">
</form>

</body>
</html>