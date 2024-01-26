<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Add these lines to the head of your HTML file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<!-- <script>
    function openDescription(desc){
       const container = document.querySelector("#description")
       const button = document.querySelector("#close")
       const para = document.querySelector("#para")

       container.classList.remove("hidden")
       para.innerHTML = desc

       button.addEventListener("click",()=>{
        container.classList.add("hidden")
       })

    }
</script> -->

<?php

$conn = mysqli_connect("localhost", "root", "", "contact_db") or die("connection failed");

if (!$conn) {
    echo "connection error:" . mysqli_connect_error();
}

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Perform the deletion
    $deleteQuery = "DELETE FROM create_form WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo '<script>alert("Record deleted successfully!");</script>';
    } else {
        echo '<script>alert("Error deleting record: ' . mysqli_error($conn) . '");</script>';
    }
}

// Check if the form is submitted for updating
if (isset($_POST['update'])) {
    // Get the updated data from the form
    $id = $_POST['editEntryId'];
    $name = mysqli_real_escape_string($conn, $_POST['editName']);
    // $email = mysqli_real_escape_string($conn, $_POST['editEmail']);
    $number = mysqli_real_escape_string($conn, $_POST['editNumber']);
    // Include other fields as needed

    // Update the database
    $updateQuery = "UPDATE create_form SET name='$name', number='$number' WHERE id=$id";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Display success message using JavaScript alert
        echo '<script>alert("Record updated successfully!");</script>';
    } else {
        // Display error message using JavaScript alert
        echo '<script>alert("Error updating record: ' . mysqli_error($conn) . '");</script>';
    }
}

// Fetch the data again after updating
$sql = "SELECT id, name, email, number, description, date FROM create_form";
$result = mysqli_query($conn, $sql);
$connect = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

mysqli_close($conn);

?>

<body>
    <div class="relative w-full h-screen bg-gray-500 py-6 relative">
        <div id="description" class="hidden h-[900px] w-[1100px] px-5 flex items-center justify-center py-3 absolute">
            <div class="flex flex-col items-center bg-black justify-center">
                <button id='close' class="bg-red-900 py-2 px-5 text-white">close</button>
                <p id='para' class='text-white'></p>
            </div>
        </div>
        <h1 class="text-center font-semibold text-3xl">List of Appointment</h1>
        <table class="w-full mr-32 mt-3 pl-3">
            <thead>
                <tr class="border text-2xl">
                    <th class="py-2">Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($connect as $entry): ?>
                    <tr class="border border-black text-white">
                        <td class="pl-14 py-1 text-xl"><?= htmlspecialchars($entry['name']) ?></td>
                        <td class="pl-14 text-xl"><?= htmlspecialchars($entry['email']) ?></td>
                        <td class="pl-14 text-xl"><?= htmlspecialchars($entry['number']) ?></td>
                        <td class="pl-20 text-xl"><?= htmlspecialchars($entry['date']) ?></td>
                        <td class="pl-20 text-[.7rem]"><?= htmlspecialchars($entry['description']) ?></td>
                        <td class="pl-20 text-xl">
                            <!-- Edit button -->
                            <button class="bg-blue-800 text-white px-4 py-1 mr-2" onclick="editEntry(<?= htmlspecialchars($entry['id']) ?>)">Update</button>
                            <!-- Delete button -->
                            <button class="bg-red-800 text-white px-4 py-1" onclick="deleteEntry(<?= htmlspecialchars($entry['id']) ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Edit form (initially hidden) -->
        <div id="editForm" class="fixed top-0 bg-black left-0 bg-opacity-70 backdrop-blur-md w-full h-full hidden mt-4">
          <div class=" p-6 rounded-lg shadow-md h-full flex flex-col items-center justify-center">
        <form action="" method="post" class="w-full shadow-md h-full flex flex-col justify-center items-center flex-col">
    <div class="mb-4">
        <label for="editName" class="text-white text-xl">Name:</label>
        <input type="text" id="editName" name="editName" required class="py-1 text-[1rem] pl-3">
    </div>

    <div class="mb-4">
        <label for="editEmail" class="text-white text-xl">Email:</label>
        <input disabled type="email" id="editEmail" name="editEmail" required class="py-1 text-[1rem] pl-3">
    </div>

    <div class="mb-4">
        <label for="editNumber" class="text-white text-xl">Number:</label>
        <input type="number" id="editNumber" name="editNumber" required class="py-1 text-[1rem] pl-3">
    </div>

    <!-- Include other fields as needed -->

    <!-- Hidden input to store the entry ID -->
    <input type="hidden" class="py-1 text-[1rem]" id="editEntryId" name="editEntryId">

    <div class="flex">
        <button type="submit" name="update" class="bg-green-500 text-white px-4 py-1 ml-2">Save Changes</button>
        <button type="button" onclick="cancelEdit()" class="bg-gray-500 text-white px-4 py-1 ml-2">Cancel</button>
    </div>
</form>

    </div>
</div>



    <script>
    function editEntry(entryId) {
        // Get the entry data (you might use AJAX to fetch it from the server)
        var entryData = getEntryData(entryId);

        // Populate the form fields with the existing data
        document.getElementById('editName').value = entryData.name;
        document.getElementById('editEmail').value = entryData.email;
        document.getElementById('editNumber').value = entryData.number;
        document.getElementById('editEntryId').value = entryId;

        // Show the edit form
        document.getElementById('editForm').style.display = 'block';
    }

    function cancelEdit() {
        // Hide the edit form
        document.getElementById('editForm').style.display = 'none';
    }

    // delete data
    function deleteEntry(entryId) {
            // You might want to confirm the deletion with the user before proceeding
            var confirmDelete = confirm("Are you sure you want to delete this entry?");

            if (confirmDelete) {
                // Send an AJAX request or navigate to a PHP script to handle the deletion
                window.location.href = 'list.php?id=' + entryId; // Adjust the URL accordingly
            }
        }

    // Function to fetch entry data from the server (you need to implement this)
    function getEntryData(entryId) {
        // You can use AJAX to fetch data from the server based on entryId
        // For simplicity, return a dummy object here
        return {
            name: '<?php echo addslashes($entry['name']); ?>',
            email: '<?php echo addslashes($entry['email']); ?>',
            number: '<?php echo addslashes($entry['number']); ?>',
            // Add other fields as needed
        };
    }
</script>
    </div>
</body>
</html>
