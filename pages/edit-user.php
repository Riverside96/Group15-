
<?php include'../navigation/admindashnavbar.php';
require ('../config/dbcon.php'); ?>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<title>Login Form</title>
<link rel="stylesheet" href="../navigation/admindashnavbar.css">
<link rel="stylesheet" href="../css/admintickettableOG.css">
<link rel="stylesheet" href="../css/accounts.css">
<link rel="stylesheet" href="../css/create-user.css">

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    session_start();
   $_SESSION['id'] = $id;


    $query = "SELECT password FROM Users WHERE id=:id";
    $stmt = $conn->prepare($query);

    $data = [':id' => $id];
    $stmt->execute($data);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
}
?>


</head>
<body bgcolor="#2E3746">
<div class="full-screen-container">

    <div class="full-screen-container">
        <div class="login-container">
            <h3 class="login-title">Edit User Credentials</h3>


            <form action="../process/edit-user-process.php" method="POST">


                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name = "password"  value="<?= $result->password ?>">
                </div>

                <button  type="submit" value="submit" class="login-button" name="submit">Enter</button>

        </div>

        </form>
    </div>
</div>



</div>
</body>
</html>