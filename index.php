<?php
$conn = mysqli_connect("localhost", "root", "", "contact_db") or die("connection failed");

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $date = $_POST['date'];
    $desc = $_POST['description'];

if (preg_match('/^\d{10}$/', $number)) {
    // Valid 10-digit number
     $insert = mysqli_query($conn, "INSERT INTO `create_form` (name, email, number, date, description)
    VALUES ('$name', '$email', '$number', '$date', '$desc')") or die('query failed');

if ($insert) {
    $message[] = 'appointment made successfully!';
} else {
    $message[] = 'appointment failed!';
} 
}
else {
     $message[] = 'mobile number must be 10 digit';
 }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-comaptible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Dentist Websits Design tutorial </title>

    <!--  font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.rtl.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<style>
     .hidden {
            display: none;
        }
</style>
<script>

document.addEventListener('DOMContentLoaded', function () {
        // Check if 'user' exists in localStorage
        const user = localStorage.getItem('user');
        
        // Select the button element
        const listButton = document.querySelector('#list-appointment');
        const loginButton = document.querySelector('#login');
        const logoutButton = document.querySelector('#logout');


        // If 'user' exists, show the button; otherwise, hide it
        if (user) {
            listButton.classList.remove('hidden');
            loginButton.classList.add('hidden');
            logoutButton.classList.remove('hidden');
        } else {
            listButton.classList.add('hidden');
            logoutButton.classList.add('hidden');
            loginButton.classList.remove('hidden');
        }
    });
        function openNewPage() {

           
            // Replace 'url_of_your_page' with the actual URL you want to open
            var newPageUrl = 'http://localhost:3000/list.php';

            // Open the new page in a new tab or window
            window.open(newPageUrl, '_blank');
        }
        function openLoginPage() {
           
        // Replace 'url_of_your_page' with the actual URL you want to open
        var newPageUrl = 'http://localhost:3000/login.php';

        // Open the new page in a new tab or window
        window.open(newPageUrl, '_blank');
        }

        function openLogout() {
            localStorage.clear()
            window.location.reload()
        }

    </script>

<body>

    <!-- header section starts -->

    <header class="header fixed-top">

        <div class="">

            <div class="navbar">

                <a href="#home" class="logo">dental<span>care.</span></a>

                <nav class="nav">
                    <a href="#home">home</a>
                    <a href="#about">about</a>
                    <a href="#services">services</a>
                    <a href="#reviews">reviews</a>
                    <a href="#contact">contact</a>
                </nav>

                <div class="flex">
                <button onclick="openNewPage()" id="list-appointment" class="link-btn">list of appointment</button>
                <button id="login" onclick="openLoginPage()" class="link-btn">Login</button>
                <button id="logout" onclick="openLogout()" class="link-btn">Logout</button>
                </div>
                



                <!-- <div id="menu-btn" class="fas fa-bas"></div> -->
            </div>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="img-container">

            <div class="img-child">
                <h1>let us brighten</h1>
                <h1>your smile</h1>
                <p>Almost all dentists work in a private dental practice with a small number of staff including
                    hygienists, assistants, and front office personnel.</p>
                <a href="#contact" class="link-btn">make appointment</a>
            </div>
        </div>
    </section>


    <!-- custom js file link -->
    <script src="js/script.js"></script>
    <!-- home section ends-->

    <!--about section starts-->

    <section class="about" id="about">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6 image">
                    <img src="https://imgs.search.brave.com/FWE1QBJ9xh0WyDx_jAY0BYhL7YJGpQNEMdNtLszXthA/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9wbHVz/LnVuc3BsYXNoLmNv/bS9wcmVtaXVtX3Bo/b3RvLTE2NzM3NzM0/MDE3MTAtZDIzZWYx/MTNlMDZmP3E9ODAm/dz0xMDAwJmF1dG89/Zm9ybWF0JmZpdD1j/cm9wJml4bGliPXJi/LTQuMC4zJml4aWQ9/TTN3eE1qQTNmREI4/TUh4elpXRnlZMmg4/TVRkOGZHUmxiblJo/Ykh4bGJud3dmSHd3/Zkh4OE1BPT0.jpeg"
                        class="w-100 mb-4 mb-md-0" alt="">
                </div>

                <div class="col-md-6 content">
                    <span> about us</span>
                    <h3>True Healthcare For Your Family</h3>
                    <p>This is the best option to take appontment from here where we can easily apponts the best and
                        good quality</p>
                    <a href="#contact" class="link-btn">make appontment </a>
                </div>

            </div>

        </div>

    </section>

    <!--about section ends-->

    <!-- services section starts -->

    <section class="services" id="services">

        <h1 class="heading">our services</h1>

        <div class="box-container service-div">
            <div class="upper-div">
                <div class="box">
                    <img src="https://imgs.search.brave.com/209EsfcDA9zKvopGFL7Aj7MrcOcHNPMKriioBhsvfkM/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9keW5h/bWljLmJyYW5kY3Jv/d2QuY29tL2Fzc2V0/L2xvZ28vYWI5NTdk/N2MtMWU3Ni00Njhl/LThjNzUtYTg4YzM2/NDUxMjAwL2xvZ28t/c2VhcmNoLWdyaWQt/MXg_bG9nb1RlbXBs/YXRlVmVyc2lvbj0x/JnY9NjM3OTE2MzM2/NzkwNzAwMDAw.jpeg"
                        alt="">
                    <h3>alignment specialist</h3>
                    <p>Almost all dentists work in a private dental practice with a small number </p>
                </div>

                <div class="box">
                    <img src="https://imgs.search.brave.com/uS9TzBCP_IjXeDF5VfH_3viQ6qFDki3XE2RP2WIMkig/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9hc3Nl/dHMud2Vic2l0ZS1m/aWxlcy5jb20vNjAy/YWVlN2FkOTFkMWU0/NzE3NWIzNDQ2LzYw/MmFlZTdhZDkxZDFl/NDE1NzViMzYyYl9B/c3NldCUyMDgucG5n"
                        alt="">
                    <h3>cosmetic dentistry</h3>
                    <p>Almost all dentists work in a private dental practice with a small number </p>
                </div>

                <div class="box">
                    <img src="https://imgs.search.brave.com/TxOgbGyZU3EZliju4dq-5QBsIlXeCLoZkv1Kw82CwxA/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/ZnJlZS1waG90by9k/ZW50YWwtaW1wbGFu/dHMtc3VyZ2VyeS1j/b25jZXB0LXBlbi10/b29sLWNyZWF0ZWQt/Y2xpcHBpbmctcGF0/aC1pbmNsdWRlZC1q/cGVnLWVhc3ktY29t/cG9zaXRlXzQ2MDg0/OC0xMDcxMS5qcGc_/c2l6ZT02MjYmZXh0/PWpwZw" alt="">
                    <h3>Root canal specialist</h3>
                    <p>Almost all dentists work in a private dental practice with a small number </p>
                </div>
            </div>
            <div class="lower-div">
                <div class="box">
                    <img src="https://imgs.search.brave.com/gLw8rNsq_cf5JZQISJyYpQzcz8TPjwnzqTCsx4SO094/rs:fit:500:0:0/g:ce/aHR0cHM6Ly90aHVt/YnMuZHJlYW1zdGlt/ZS5jb20vYi9kZW50/YWwtZGFtLTE5MjE3/NzgxLmpwZw" alt="">
                    <h3>Oral Hygiene Expert</h3>
                    <p>Almost all dentists work in a private dental practice with a small number </p>
                </div>

                <div class="box">
                    <img src="https://imgs.search.brave.com/wN9al8f9cPNJoG0WSRTHkkB8E11Pr1v9Q_3tIzytUOQ/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/ZnJlZS1waG90by9k/ZW50YWwtaHlnaWVu/ZS1jb25jZXB0LXdp/dGgtdG9vdGhfMjMt/MjE1MDI3MzYxMC5q/cGc_c2l6ZT02MjYm/ZXh0PWpwZw" alt="">
                    <h3>live dental advisory</h3>
                    <p>Almost all dentists work in a private dental practice with a small number </p>
                </div>

                <div class="box">
                    <img src="https://imgs.search.brave.com/dr5YAfakc62BIX9Mv9e4P4XMnW9awjTxdqCL3X4GmEA/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9wbHVz/LnVuc3BsYXNoLmNv/bS9wcmVtaXVtX3Bo/b3RvLTE2Nzk0ODk0/MDkyMzEtNzIwNDBk/MmQwNDFhP3E9ODAm/dz0xMDAwJmF1dG89/Zm9ybWF0JmZpdD1j/cm9wJml4bGliPXJi/LTQuMC4zJml4aWQ9/TTN3eE1qQTNmREI4/TUh4elpXRnlZMmg4/Tlh4OGNtOXZkQ1V5/TUdOaGJtRnNmR1Z1/ZkRCOGZEQjhmSHd3.jpeg" alt="">
                    <h3>cavity inspection</h3>
                    <p>Almost all dentists work in a private dental practice with a small number </p>
                </div>

            </div>

        </div>

    </section>

    <!-- services section ends-->

    <!-- process sections starts -->

    <section class="process">

        <h1 class="heading">work process</h1>

        <div class="box-container container">

            <div class="box">
                <img src="https://imgs.search.brave.com/i_h-vJwRlisa3HeOd0nDSoXdPxBlmTJAmwbe3Q784-8/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9jZG4u/dmVjdG9yc3RvY2su/Y29tL2kvcHJldmll/dy0xeC85Ny8yMS9k/ZW50YWwtY2xpbmlj/LWRvY3Rvci1hbmQt/cGF0aWVudC1jYXJ0/b29uLXZlY3Rvci0y/OTIyOTcyMS5qcGc"
                    alt="">
                <h3>cosmetic dentistry</h3>
                <p> If your teeth are crooked or discoloured, your dentist might recommend veneers.</p>
            </div>

            <div class="box">
                <img src="https://imgs.search.brave.com/3tYj9TaVFgpwqTO3ARIN3tbITNfdJnHJJH4ows69bT0/rs:fit:500:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAyLzU2Lzc4Lzgz/LzM2MF9GXzI1Njc4/ODMyM19Ja0JXWUFk/U2JnZlFzT2tRSmFH/dHhvR3F3WDQwa25w/dC5qcGc"
                    alt="">
                <h3>pediatric dentistry</h3>
                <p> If your teeth are crooked or discoloured, your dentist might recommend veneers.</p>
            </div>

            <div class="box">
                <img src="https://imgs.search.brave.com/3Ak_dtoQb51YQ1jUV-d5lB2aVsTPAHOkQWAD18A9X1M/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9jZG4u/dmVjdG9yc3RvY2su/Y29tL2kvcHJldmll/dy0xeC8yOS84OS9j/YXJ0b29uLWRlbnRp/c3Qtc2hvd2luZy12/ZWN0b3ItMzM0NDI5/ODkuanBn"
                    alt="">
                <h3>dental implants</h3>
                <p> If your teeth are crooked or discoloured, your dentist might recommend veneers.</p>
            </div>

        </div>

    </section>

    <!-- process sections ends -->

    <!-- reviews sections starts -->

    <section class="reviews" id="reviews">

        <h1 class="heading"> satisfied clients </h1>

        <div class="box-container container">

            <div class="box">
                <img src="https://imgs.search.brave.com/nswx1SYPLLn8fNewtdFiohlyq_Bt7p0mZjM20KfDfAo/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzL2MzLzY5/L2UwL2MzNjllMDVk/OTEyNThmYjZkNzkw/N2M0YzQwZjFkN2Fi/LmpwZw"
                    alt="">
                <p> Get updated Latest News and information from movie industry by actress, music directors, actors and
                    directors etc</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
                <span>satisfied client</span>
            </div>

            <div class="box">
                <img src="https://imgs.search.brave.com/zQK4aDQlzRsHZzJt8vBPBxOUu-bbA43Mp6tcv0zkCKE/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzJlLzI3/L2Q3LzJlMjdkN2M4/N2E1Y2U5OGQzZWIw/ZmUxYmZiOTE0NzZi/LmpwZw"
                    alt="">
                <p> Get updated Latest News and information from movie industry by actress, music directors, actors and
                    directors etc</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
                <span>satisfied client</span>
            </div>

            <div class="box">
                <img src="https://imgs.search.brave.com/_i5y7niW6CpZMbbHzJ2Wf23FF4a9fUdwdmDWkJ2ntnI/rs:fit:500:0:0/g:ce/aHR0cHM6Ly93d3cu/bXJkdXN0YmluLmNv/bS9lbi93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMS8wMS9jaGxv/ZS1ncmFjZS1tb3Jl/dHouanBn"
                    alt="">
                <p> Get updated Latest News and information from movie industry by actress, music directors, actors and
                    directors etc</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
                <span>satisfied client</span>
            </div>

        </div>

    </section>

    <!-- reviews sectiond ends -->

    <!-- contact section starts -->

    <section class="contact" id="contact">

        <h1 class="heading p-3">make appointment</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<p class="message">' .$message.'</p>';
            }
        }
       ?>
            <span>your name :</span>
            <input type="text" name="name" placeholder="enter your name" class="box" required>
            <span>your email :</span>
            <input type="email" name="email" placeholder="enter your email" class="box" required>
            <span>your number :</span>
            <input type="number" id="number" name="number" value="" placeholder="enter your number" class="box"
                required>
            <span>appointment date :</span>
            <input type="datetime-local" name="date" placeholder="enter your name" class="box" required>
            <span>description :</span>
            <textarea name="description" id="number" value="" placeholder="enter description" class="box"
                required></textarea>
            <input type="submit" value="make appointment" name="submit" class="link-btn">
        </form>

    </section>

    <!-- contact section ends -->

    <!-- footer section starts-->

    <section class="footer">

        <div class="box_container container">
            <div class="box">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <p>+123-456-7890</p>
                <p>+111-222-3333</p>
            </div>

            <div class="box">
                <i class="fas fa-location"></i>
                <h3>our address</h3>
                <p>lalitpur, ktm -400104</p>
            </div>

            <div class="box">
                <i class="fas fa-clock"></i>
                <h3>opening hours</h3>
                <p>00:08am to 05:00pm</p>
            </div>

            <div class="box">
                <i class="fas fa-envelope"></i>
                <h3>email address</h3>
                <p>rajuyadav@gmail.com</p>
                <p>dikshyajha@gmail.com</p>
            </div>

        </div>

        <div class="credit"> &copy; copyright @
            <?php echo date('y'); ?> by <span>mrs dikshyajha</span>
        </div>

    </section>

    <!-- footer section ends-->










    <!-- custom js file link -->

    <script>
        let number = document.getElementById("number");
        document.querySelector("input[name='submit']").addEventListener("click", function () {
            if (number.value.length !== 10) {
                alert('Mobile number must be 10 digits');
            }
        });
    </script>

</body>
</header>

</html>