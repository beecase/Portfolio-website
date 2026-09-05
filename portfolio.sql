-- Create Database
CREATE DATABASE IF NOT EXISTS portfolio;
USE portfolio;

-- Create Contacts Table
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Blogs Table
CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    image VARCHAR(255),
    content LONGTEXT NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert Sample Blog Posts
INSERT INTO blogs (title, category, image, content) VALUES
(
    'Getting Started with Web Development',
    'Web Development',
    'https://via.placeholder.com/600x300',
    'Web development is an exciting field that combines creativity with technical skills. In this blog post, I will share my journey of learning web development and the resources that helped me get started. From learning HTML basics to mastering JavaScript, the journey has been transformative.'
),
(
    'Responsive Design Best Practices',
    'Web Design',
    'https://via.placeholder.com/600x300',
    'Responsive design is essential in today\'s world where users access websites from various devices. Learn about mobile-first approach, media queries, and flexible layouts that make your website accessible to everyone. A well-designed responsive website ensures better user experience and higher engagement.'
),
(
    'JavaScript Tips and Tricks',
    'Programming',
    'https://via.placeholder.com/600x300',
    'JavaScript is a powerful language that enables interactive web pages. In this article, I share some useful tips and tricks to improve your JavaScript code and make it more efficient. Learn about arrow functions, destructuring, and async/await patterns.'
),
(
    'Database Design with MySQL',
    'Database',
    'https://via.placeholder.com/600x300',
    'Proper database design is crucial for building scalable applications. Learn about normalization, indexing, and best practices for designing efficient MySQL databases. A well-structured database can improve application performance significantly.'
),
(
    'Building Dynamic Websites with PHP',
    'Backend',
    'https://via.placeholder.com/600x300',
    'PHP is a popular server-side scripting language. Discover how to use PHP to create dynamic websites, handle forms, interact with databases, and build powerful web applications. PHP remains one of the most widely used languages for web development.'
);
