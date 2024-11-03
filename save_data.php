<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = htmlspecialchars($_POST['gender']);
    
    // Specify the file to save data
    $file = 'employee_data.txt';

    // Check if file exists and is writable, or if it doesn't exist yet
    if (is_writable($file) || !file_exists($file)) {
        // Format data as a single line for each submission
        $data = "Name: $firstName $lastName, Email: $email, Phone: $phone, Gender: $gender\n";

        // Append data to file
        if (file_put_contents($file, $data, FILE_APPEND) !== false) {
            echo "Employee data saved successfully!";
        } else {
            echo "Error: Could not write to the file.";
        }
    } else {
        echo "Error: The file is not writable. Check file permissions.";
    }
} else {
    echo "Invalid request method.";
}
?>
