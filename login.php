<?php

include 'C:\Users\Dell\Desktop\Hamro.AI\config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
        // Set the user information in localStorage using JavaScript
        echo "<script>
        localStorage.setItem('user', JSON.stringify({
            'id': '{$row['id']}',
            'email': '{$row['email']}',
            // Add other user data as needed
        }));
        window.open('http://localhost:3000/index.php');
    </script>";
   //  header('location:index.php');

     exit();
      
   }
   else{
      $message[] = 'incorrect email or password!'. $email . $pass;
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>


<script src="https://cdn.tailwindcss.com"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body class=' bg-white '>
   
<div class=" flex item-center w-full justify-center pt-80" >

   <form action="" method="post" enctype="multipart/form-data" class='flex rounded-3xl bg-[#00b8b8] backdrop-blur-lg px-20 py-20 flex-col space-y-4'>
      <h3 class="text-3xl text-white font-semibold item-center py-5 flex justify-center">login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box py-3 px-3 rounded-lg text-[1rem] mt-3 w-[300px] text-black" required>
      <input type="password" name="password" placeholder="enter password" class="box py-3 px-3 mt-3 rounded-lg  text-[1rem] text-black" required>
      <input type="submit" name="submit" value="login now" class="btn py-2 text-[1.3rem] mt-7 rounded-xl font-semibold bg-black px-3 text-white">
      <!-- <p class="text-white text-[1rem] flex justify-center item-center">don't have an account? <a href="register.php" class="text-blue-700 text-[1.2rem] font-semibold">regiser now</a></p> -->
   </form>

</div>

</body>
</html>