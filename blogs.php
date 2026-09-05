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

// Fetching all blog posts from database
$sql = "SELECT id, title, category, date_created,  content FROM blogs ORDER BY date_created DESC";
$result = $conn->query($sql);

// Sample blog data (in case database is empty)
$sample_blogs = array(

    array(
        'id' => 1,
        'title' => 'Building My Personal Portfolio Website',
        'category' => 'Web Development',
        'date' => '2026-08-10',
        'content' => 'I designed and developed my personal portfolio website using HTML, CSS, JavaScript, and PHP. The website includes responsive pages such as Home, About, Skills, Projects, Gallery, Blog, and Contact, allowing me to showcase my academic and technical work.'
    ),

    array(
        'id' => 2,
        'title' => 'Exploratory Data Analysis of IMDB Movies',
        'category' => 'Python Data Analysis',
        'date' => '2026-08-18',
        'content' => 'Using Python and the Pandas library, I cleaned and analyzed the IMDB movie dataset. The project explored movie ratings, budgets, revenues, and return on investment (ROI) through informative visualizations created with Matplotlib and Seaborn.'
    ),

    array(
        'id' => 3,
        'title' => 'Creating Visualizations with R and ggplot2',
        'category' => 'R Programming',
        'date' => '2026-08-25',
        'content' => 'This project demonstrates how R can be used for statistical analysis and professional data visualization. I used ggplot2 and dplyr to transform datasets, generate charts, and present meaningful insights from real-world data.'
    ),

    array(
        'id' => 4,
        'title' => 'Lessons Learned from My Development and Data Projects',
        'category' => 'Project Reflection',
        'date' => '2026-09-01',
        'content' => 'Working on web development, Python, and R projects improved my problem-solving and analytical skills. Each project taught me practical experience in designing user-friendly interfaces, managing data, and communicating insights through visualization.'
    )

);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs - Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">MyPortfolio</div>
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
        <h1 style="text-align: center; color: #2c3e50; margin: 30px 0;">My Blog</h1>

        <div class="blog-list">
            <?php
            // Display sample blogs
            foreach ($sample_blogs as $blog) {
                echo '<div class="blog-post">';
                echo '<h3>' . $blog['title'] . '</h3>';
                echo '<div class="blog-meta">';
                echo '<span><strong>Category:</strong> ' . $blog['category'] . '</span> | ';
                echo '<span><strong>Date:</strong> ' . $blog['date'] . '</span>';
                echo '</div>';
                echo '<p>' . $blog['content'] . '</p>';
                echo '<a href="#" class="btn">Read More</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Bikesh Khatri. All rights reserved.</p>
        <div class="social-links">
            <a href="https://x.com/BikeshKhatri2">Twitter</a>
            <a href="https://github.com/beecase">GitHub</a>
        </div>
    </footer>
</body>
</html>
