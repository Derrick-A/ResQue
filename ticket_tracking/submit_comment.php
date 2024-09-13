<?php
// Include database details from config.php file
require_once("../config.php");

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted data
    $ticketID = $_POST['ticketID'];
    $comment_description = $_POST['comment_description'];
    $userName = $_POST['userID']; // Replace this with the actual user session value
    $page = $_POST['page']; //the page the processor must go back to to return the data

    // attempt to make database connection
    $connection = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    // Check if connection was successful
    if ($connection->connect_error) {
        die("<p class=\"error\">Connection failed: Incorrect credentials or Database not available!</p>");
    }

    // Insert the comment into the comment table
    $sql_insert = "INSERT INTO systemsurgeons.comment (ticketID, userName, comment_description) VALUES ('$ticketID', '$userName', '$comment_description')";

    if ($connection->query($sql_insert) === TRUE) {
        // Redirect back to the ticket page

        if ($page = 'all') {
            header("Location: ticket_tracking_all.php?ticketID=$ticketID");
            exit();}
        else if ($page = 'open') {
            header("Location: ticket_tracking_open.php?ticketID=$ticketID");
            exit();}
        else if ($page = 'closed') {
            header("Location: ticket_tracking_closed.php?ticketID=$ticketID");
            exit();}
        else {
            echo "<p class='error'>Failed to find page to returnh to: " . $connection->error . "</p>";
        }
        
    } else {
        echo "<p class='error'>Failed to submit comment: " . $connection->error . "</p>";
    }

    // Close the database connection
    $connection->close();
}
?>
