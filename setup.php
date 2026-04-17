<?php
require_once 'includes/config.php';

try {
    // Admin user table
    $pdo->exec("CREATE TABLE IF NOT EXISTS admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Services table
    $pdo->exec("CREATE TABLE IF NOT EXISTS services (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        icon VARCHAR(50) NOT NULL,
        status ENUM('active', 'inactive') DEFAULT 'active',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Portfolio table
    $pdo->exec("CREATE TABLE IF NOT EXISTS portfolio (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        client VARCHAR(100),
        description TEXT NOT NULL,
        image_url VARCHAR(255),
        category VARCHAR(50),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Testimonials table
    $pdo->exec("CREATE TABLE IF NOT EXISTS testimonials (
        id INT AUTO_INCREMENT PRIMARY KEY,
        client_name VARCHAR(100) NOT NULL,
        company VARCHAR(100),
        feedback TEXT NOT NULL,
        rating INT DEFAULT 5,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Blog_posts table
    $pdo->exec("CREATE TABLE IF NOT EXISTS blog_posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255) NOT NULL UNIQUE,
        content LONGTEXT NOT NULL,
        author VARCHAR(100),
        seo_meta_desc VARCHAR(160),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Define initial Admin User
    $admin_username = 'admin';
    $password = password_hash('admin123', PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT IGNORE INTO admin_users (username, password_hash) VALUES (?, ?)");
    $stmt->execute([$admin_username, $password]);

    // Insert dummy data for services (optional) to make the frontend look 'WOW' initially
    $pdo->exec("INSERT IGNORE INTO services (id, title, description, icon) VALUES 
        (1, 'Custom Web Development', 'High-performance, scalable web applications tailored to your specific business requirements.', 'fa-laptop-code'),
        (2, 'Cloud Solutions', 'Secure and scalable cloud infrastructures to modernize your IT operations and lower costs.', 'fa-cloud'),
        (3, 'Mobile App Development', 'Native and cross-platform mobile apps delivering seamless user experiences on iOS and Android.', 'fa-mobile-screen-button'),
        (4, 'UI/UX Design', 'User-centric interfaces combining beautiful aesthetics with highly intuitive navigation patterns.', 'fa-pen-ruler')
    ");

    $pdo->exec("INSERT IGNORE INTO testimonials (id, client_name, company, feedback, rating) VALUES 
        (1, 'Sarah Jenkins', 'TechFlow Innovations', 'They completely transformed our digital presence. Incredible attention to detail and outstanding support!', 5),
        (2, 'Michael Chen', 'Global Logistics Inc', 'The web application they built for us reduced overhead by 30%. A truly spectacular team to work with.', 5)
    ");

    $pdo->exec("INSERT IGNORE INTO blog_posts (id, title, slug, content, author, seo_meta_desc) VALUES 
        (1, 'The Future of Cloud Computing in 2026', 'future-of-cloud-computing-2026', '<p>Cloud computing continues to evolve at a rapid pace, driving digital transformation across all industries...</p>', 'Admin', 'Explore the latest trends in cloud computing and how businesses can leverage serverless architectures in 2026.')
    ");

    echo "<h2>Setup Complete!</h2>";
    echo "<p>Database tables configured successfully.</p>";
    echo "<p>Default admin user created: <b>admin</b> | Password: <b>admin123</b></p>";
    echo "<p><a href='admin/login'>Go to Admin Login</a> | <a href='index'>Go to Homepage</a></p>";
    
} catch (PDOException $e) {
    die("Setup failed: " . $e->getMessage());
}
?>
