<<<<<<< HEAD
<?php
require_once("secure.php");

if (isset($_SESSION['username'])) {
    // echo 'Session Username: ' . $_SESSION['username'];
    $studentID = $_SESSION['username'];
}else {
    die("User is not logged in.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Requisition Form</title>
    <link rel="icon" type="image/x-icon" href="pictures/resque-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />    
    <link rel="stylesheet" href="ticketCreationStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="scriptTC.js "></script>
</head>
<body>
<?php
    
    // include database details from config.php file
    require_once("config.php");

    // attempt to make database connection
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    // Check if connection was successful
    if ($conn -> connect_error) {
        die("<p class=\"error\">Connection failed: Incorrect credentials or Database not available!</p>");
    }

    //for the res name on top
    $sql1 = "SELECT resName FROM student WHERE userName = '$studentID'";
    $result = $conn->query($sql1);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $resName = $row['resName'];
        //echo "Residence: " . $resName;
    } else {
        $resName = "Residence not found";
    }

    $conn->close();
// }
?>
    <div class="container">
        <!-- the white left side of the page -->
        <aside class="sidebar">
            <div class="logo">ResQue</div>
            
            <!-- search bar -->
            <form action="" class="search">
                <span class="search-icon material-symbols-outlined">search</span>
                <input class="search-input" type="search" name="search-field" id="search-field" placeholder="Search">
            </form>
            
            <nav>
                <ul>
                    <li id="logFaults"><a href="#"><img src="pictures/receipt-add.png" alt="receipt-add">Log faults</a></li> <!--style="background-color: #A020F0;" -->
                    <li id="allTickets"><a href="#"><img src="pictures/receipt-icon.png" alt="receipt-icon">All Tickets</a></li>
                    <li id="openTickets"><a href="#"><img src="pictures/layer.png" alt="layer">Open Tickets</a></li>
                    <li id="closedTickets"><a href="#"><img src="pictures/clipboard-tick.png" alt="clipboard-tick">Closed Tickets</a></li>
                    <!-- <li id="statistics"><a class="sidebar-links" href="#"><img src="images/bar-chart-icon.png" alt="bar chart icon">Statistics</a></li>height="18px" -->
                </ul>
            </nav>

            <!-- the user information at the bottom -->
            <div class="profile">
               <!-- Profile picture area -->
               <div class="profile-pic">AM</div>
               <!-- Profile information area -->
               <div class="profile-info">
                   <span id="user-name" class="username">Jesus Christ</span><br>
                   <span class="role">Student</span>
               </div>
               <!-- Logout button with icon -->
               <div id="sidebar-log-out">
                   <a href="#"><i class="fa-solid fa-arrow-right-from-bracket fa-xl" style="color: #B197FC;"></i></a>
               </div>
            </div>
        </aside>

        <main class="content">
            <header class="page-header">
                <!-- div is to ensure that the title page and res name are beneath each other -->
                <div>
                    <h1>Maintenance requisition form</h1>   
                    <!-- <h1></h1> -->

                    <p class="fade-out" id="residence" name="residence">
                        <?php echo htmlspecialchars($resName); ?>
                    </p>
                </div>
                <!-- Fix the logo size -->
                <img src="pictures/resque-logo.png" alt="Logo" width="150" height="110">
            </header>
            <section>
                <!-- the actual form for fault -->
                <form action="ticketCreation.php" method="post" enctype="multipart/form-data" class="requisition-form">
                    <div class="form-header">
                        <h3>Requisition Details</h3>
                        <p class="fade-out">Please fill in the form below</p>
                    </div>

                    <!-- dropdown for fault category -->
                    <div class="form-group">
                        <label for="fault-category">Fault Category *</label>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <select id="fault-category" name="fault-category" required>
                                <option value="" >Please enter fault category</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Plumbing">Plumbing</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Heater">Heater</option>
                                <option value="Other">Other</option> <!-- when this option is chosen then description is a must -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <div class="form-extra-info"><small>Please provide any additional information or instructions related to the requisition</small></div>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <textarea id="description" name="description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority *</label>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <select id="priority" name="priority" required>
                                <option value="">Please indicate severity of fault</option>
                                <option value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">High</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="picture">Upload an Image</label>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <input type="file" id="picture" name="picture" placeholder="Choose file" multiple required>
                            <!-- <small>Upload an image to provide context for the maintenance requisition</small> -->
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" id="resName" name="residence" value="<?php $resName; ?>">
                        <button type="reset" class="cancel-btn">Cancel</button>
                        <input type="submit" value="Submit" >
                        
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>
=======
<?php
require_once("secure.php");

if (isset($_SESSION['username'])) {
    // echo 'Session Username: ' . $_SESSION['username'];
    $studentID = $_SESSION['username'];
}else {
    die("User is not logged in.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Requisition Form</title>
    <link rel="icon" type="image/x-icon" href="pictures/resque-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />    
    <link rel="stylesheet" href="ticketCreationStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="scriptTC.js "></script>
</head>
<body>
<?php
    
    // include database details from config.php file
    require_once("config.php");

    // attempt to make database connection
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    // Check if connection was successful
    if ($conn -> connect_error) {
        die("<p class=\"error\">Connection failed: Incorrect credentials or Database not available!</p>");
    }

    //for the res name on top
    $sql1 = "SELECT resName FROM student WHERE userName = '$studentID'";
    $result = $conn->query($sql1);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $resName = $row['resName'];
        //echo "Residence: " . $resName;
    } else {
        $resName = "Residence not found";
    }

    $conn->close();
// }
?>
    <div class="container">
        <!-- the white left side of the page -->
        <aside class="sidebar">
            <div class="logo">ResQue</div>
            
            <!-- search bar -->
            <form action="" class="search">
                <span class="search-icon material-symbols-outlined">search</span>
                <input class="search-input" type="search" name="search-field" id="search-field" placeholder="Search">
            </form>
            
            <nav>
                <ul>
                    <li id="logFaults"><a href="#"><img src="pictures/receipt-add.png" alt="receipt-add">Log faults</a></li> <!--style="background-color: #A020F0;" -->
                    <li id="allTickets"><a href="#"><img src="pictures/receipt-icon.png" alt="receipt-icon">All Tickets</a></li>
                    <li id="openTickets"><a href="#"><img src="pictures/layer.png" alt="layer">Open Tickets</a></li>
                    <li id="closedTickets"><a href="#"><img src="pictures/clipboard-tick.png" alt="clipboard-tick">Closed Tickets</a></li>
                    <!-- <li id="statistics"><a class="sidebar-links" href="#"><img src="images/bar-chart-icon.png" alt="bar chart icon">Statistics</a></li>height="18px" -->
                </ul>
            </nav>

            <!-- the user information at the bottom -->
            <div class="profile">
               <!-- Profile picture area -->
               <div class="profile-pic">AM</div>
               <!-- Profile information area -->
               <div class="profile-info">
                   <span id="user-name" class="username">Jesus Christ</span><br>
                   <span class="role">Student</span>
               </div>
               <!-- Logout button with icon -->
               <div id="sidebar-log-out">
                   <a href="#"><i class="fa-solid fa-arrow-right-from-bracket fa-xl" style="color: #B197FC;"></i></a>
               </div>
            </div>
        </aside>

        <main class="content">
            <header class="page-header">
                <!-- div is to ensure that the title page and res name are beneath each other -->
                <div>
                    <h1>Maintenance requisition form</h1>   
                    <!-- <h1></h1> -->

                    <p class="fade-out" id="residence" name="residence">
                        <?php echo htmlspecialchars($resName); ?>
                    </p>
                </div>
                <!-- Fix the logo size -->
                <img src="pictures/resque-logo.png" alt="Logo" width="150" height="110">
            </header>
            <section>
                <!-- the actual form for fault -->
                <form action="ticketCreation.php" method="post" enctype="multipart/form-data" class="requisition-form">
                    <div class="form-header">
                        <h3>Requisition Details</h3>
                        <p class="fade-out">Please fill in the form below</p>
                    </div>

                    <!-- dropdown for fault category -->
                    <div class="form-group">
                        <label for="fault-category">Fault Category *</label>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <select id="fault-category" name="fault-category" required>
                                <option value="" >Please enter fault category</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Plumbing">Plumbing</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Heater">Heater</option>
                                <option value="Other">Other</option> <!-- when this option is chosen then description is a must -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <div class="form-extra-info"><small>Please provide any additional information or instructions related to the requisition</small></div>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <textarea id="description" name="description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="priority">Priority *</label>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <select id="priority" name="priority" required>
                                <option value="">Please indicate severity of fault</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="picture">Upload an Image</label>
                        <div class="form-input"> <!-- to ensure that the dropdown is in line with the label -->
                            <input type="file" name="picture[]" id="picture" placeholder="Choose file" multiple>
                            <!-- <small>Upload an image to provide context for the maintenance requisition</small> -->
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" id="resName" name="residence" value="<?php $resName; ?>">
                        <button type="reset" class="cancel-btn">Cancel</button>
                        <input type="submit" value="Submit" >
                        
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>
>>>>>>> 1c9f5f447eac07b9894be219ee0d875339c15591
</html>