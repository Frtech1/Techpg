<?php
require_once 'includes/config.php';

// Fetch Active Services
$stmt = $pdo->query("SELECT * FROM services WHERE status = 'active' ORDER BY created_at DESC");
$services = $stmt->fetchAll();

$page_title = "Our IT Services";
$meta_desc = "Explore our comprehensive range of IT services including custom web development, mobile applications, cloud integrations, and enterprise software solutions.";
include 'includes/header.php';
?>

<section class="hero" style="padding: 80px 0 60px;">
    <div class="container">
        <h1>Our Core Services</h1>
        <p>End-to-end technology solutions tailored to drive digital transformation and exponential business growth.</p>
    </div>
</section>

<section class="section section-bg">
    <div class="container">
        <div class="grid-3">
            <?php if(count($services) > 0): ?>
                <?php foreach($services as $service): ?>
                    <div class="card" style="text-align: left;">
                        <i class="fa-solid <?= htmlspecialchars($service['icon']) ?> card-icon" style="font-size: 2rem;"></i>
                        <h3 style="margin-bottom: 15px;"><?= htmlspecialchars($service['title']) ?></h3>
                        <p style="margin-bottom: 20px;"><?= htmlspecialchars($service['description']) ?></p>
                        <a href="/contact" style="font-weight: 600;">Request Quote <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No services currently found. Please add them via the Admin Dashboard.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- SEO Structured Content -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Why Invest in Professional IT Services?</h2>
        </div>
        <div style="column-count: 2; column-gap: 40px; color: var(--text-muted);">
            <p>In today's fast-paced digital economy, robust IT infrastructure is no longer an option—it is a necessity. Our custom software development and cloud integration services provide the scalability your business needs to stay ahead of the curve.</p>
            <p>From seamless UI/UX design to robust API integrations and deep performance optimizations, we ensure your digital assets are built for high security, zero-downtime, and maximum user engagement.</p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
