<?php
require_once 'includes/config.php';

// Fetch Active Services (limit to 3 for homepage)
$stmt = $pdo->query("SELECT * FROM services WHERE status = 'active' ORDER BY created_at DESC LIMIT 3");
$services = $stmt->fetchAll();

// Fetch Testimonials
$t_stmt = $pdo->query("SELECT * FROM testimonials ORDER BY created_at DESC LIMIT 2");
$testimonials = $t_stmt->fetchAll();

$page_title = "Home - Modern IT Services";
$meta_desc = "Building future-ready digital solutions. Top-tier software development, cloud infrastructure, and AI integrations.";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>Transform Your Business with Next-Gen Software</h1>
        <p>Premium IT consulting, custom software development, and cloud solutions designed to accelerate growth and operational efficiency.</p>
        <div class="hero-btns">
            <a href="/contact" class="btn btn-primary" style="margin-right: 15px;">Book Free Consultation</a>
            <a href="/portfolio" class="btn btn-secondary">Explore Projects</a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section section-bg">
    <div class="container">
        <div class="section-title">
            <h2>Our Core Services</h2>
            <p>We deliver end-to-end technology solutions tailored to your unique business challenges.</p>
        </div>
        
        <div class="grid-3">
            <?php foreach($services as $service): ?>
                <div class="card">
                    <i class="fa-solid <?= htmlspecialchars($service['icon']) ?> card-icon"></i>
                    <h3><?= htmlspecialchars($service['title']) ?></h3>
                    <p><?= htmlspecialchars($service['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="/services" class="btn btn-secondary">View All Services</a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section" style="background-color: var(--primary-color); color: white;">
    <div class="container">
        <div class="section-title">
            <h2 style="color: white;">Why Choose NexTech</h2>
            <p style="color: #cbd5e1;">A decade of excellence driving digital transformation.</p>
        </div>
        <div class="grid-3">
            <div class="card" style="background: rgba(255,255,255,0.1); border: none; color: white;">
                <i class="fa-solid fa-medal card-icon" style="color: #fff;"></i>
                <h3 style="color: white;">Global Expertise</h3>
                <p style="color: #cbd5e1;">Our teams have deployed solutions for Fortune 500 companies.</p>
            </div>
            <div class="card" style="background: rgba(255,255,255,0.1); border: none; color: white;">
                <i class="fa-solid fa-headset card-icon" style="color: #fff;"></i>
                <h3 style="color: white;">24/7 Premium Support</h3>
                <p style="color: #cbd5e1;">Dedicated SLAs to ensure zero downtime for mission-critical apps.</p>
            </div>
            <div class="card" style="background: rgba(255,255,255,0.1); border: none; color: white;">
                <i class="fa-solid fa-bolt card-icon" style="color: #fff;"></i>
                <h3 style="color: white;">Agile Delivery</h3>
                <p style="color: #cbd5e1;">Rapid prototyping to market-ready architecture in record time.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section section-bg">
    <div class="container">
        <div class="section-title">
            <h2>What Our Clients Say</h2>
            <p>Trusted by industry leaders worldwide.</p>
        </div>
        
        <div class="grid-3" style="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));">
            <?php foreach($testimonials as $test): ?>
                <div class="card" style="text-align: left;">
                    <div style="color: #fbbf24; margin-bottom: 15px;">
                        <?php for($i=0; $i<$test['rating']; $i++) echo '<i class="fa-solid fa-star"></i>'; ?>
                    </div>
                    <p style="font-style: italic; margin-bottom: 20px; font-size: 1.1rem;">"<?= htmlspecialchars($test['feedback']) ?>"</p>
                    <div>
                        <h4 style="margin-bottom: 5px; color: var(--primary-color);"><?= htmlspecialchars($test['client_name']) ?></h4>
                        <span style="color: var(--accent-color); font-size: 0.9rem; font-weight: 600;"><?= htmlspecialchars($test['company']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--accent-color), var(--secondary-color)); text-align: center; color: white;">
    <div class="container">
        <h2 style="color: white; font-size: 2.5rem; margin-bottom: 20px;">Ready to Scale Your Infrastructure?</h2>
        <p style="font-size: 1.2rem; margin-bottom: 30px; color: #f8fafc;">Join hundreds of companies leveraging our technology solutions.</p>
        <a href="/contact" class="btn" style="background: white; color: var(--accent-color);">Start Your Project Today</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
