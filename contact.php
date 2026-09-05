<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_message = "";
$error_message = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validate fields
    if (empty($name)) {
        $error_message = "Name is required!";
    } elseif (empty($email)) {
        $error_message = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address!";
    } elseif (empty($subject)) {
        $error_message = "Subject is required!";
    } elseif (empty($message)) {
        $error_message = "Message is required!";
    } else {
        // Insert data into database
        $sql = "INSERT INTO contacts (name, email, subject, message, date_created) VALUES ('$name', '$email', '$subject', '$message', NOW())";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Your message has been sent successfully! We will get back to you soon.";
            // Clear form fields
            $name = "";
            $email = "";
            $subject = "";
            $message = "";
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me - Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">MyPortfolio</div>
            <button class="menu-toggle" aria-label="Open menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="skills.html">Skills</a></li>
                <li><a href="project.html">Projects</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="blogs.php">Blogs</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1 style="text-align: center; color: #2c3e50; margin: 30px 0;">Contact Me</h1>

        <div class="contact-form">
            <?php
            if (!empty($success_message)) {
                echo '<div class="success-message">' . $success_message . '</div>';
            }
            if (!empty($error_message)) {
                echo '<div class="error-message">' . $error_message . '</div>';
            }
            ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" value="<?php echo isset($subject) ? $subject : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required><?php echo isset($message) ? $message : ''; ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit">Send Message</button>
                </div>
            </form>

            <hr style="margin: 30px 0;">
            <h3 style="color: #2c3e50;">Other Ways to Reach Me</h3>
            <p><strong>Email:</strong> beecasekhatri17@gmail.com</p>
            <p><strong>Phone:</strong> +977-9705593715</p>
            <p><strong>Address:</strong> Bhaktapur , Nepal</p>
        </div>
    </div>

    <footer>
        <p>&copy; <span data-year></span> Bikesh Khatri. All rights reserved.</p>
        <div class="social-links">
             <a href="https://x.com/BikeshKhatri2">Twitter</a>
            <a href="https://github.com/beecase">GitHub</a>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
