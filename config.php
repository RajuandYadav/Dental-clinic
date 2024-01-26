<?php

$conn = mysqli_connect("localhost", "root", "", "contact_db") or die("connection failed");

if (!$conn) {
    echo "connection error:" . mysqli_connect_error();
}



