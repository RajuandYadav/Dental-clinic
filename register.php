<?php

// include 'C:\Users\Dell\Desktop\Dental Clinic\config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
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
   
<div class=" flex item-center w-full justify-center pt-60" >

<form action="" method="post" enctype="multipart/form-data" class='flex rounded-3xl backdrop-blur-lg bg-[#00b8b8] px-20 py-20 flex-col space-y-6'>
      <h3 class="text-3xl text-white font-semibold item-center py-5 flex justify-center">Register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Enter name" class="box py-3 px-3 rounded-lg text-[1rem] mt-3 w-[300px] text-black" required>
      <input type="password" name="password" placeholder="enter email" class="box py-3 px-3 mt-3 rounded-lg  text-[1rem] text-black" required>
      <input type="email" name="email" placeholder="enter password" class="box py-3 px-3 rounded-lg text-[1rem] mt-3 w-[300px] text-black" required>
      <input type="password" name="password" placeholder="enter comfirm password" class="box py-3 px-3 mt-3 rounded-lg  text-[1rem] text-black" required>
      <input type="submit" name="submit" value="Register now" class="btn py-2 text-[1.3rem] mt-7 rounded-xl font-semibold bg-black px-3 text-white">
   </form>

</div>

</body>
</html>