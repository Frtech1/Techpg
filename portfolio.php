<?php
require_once 'includes/config.php';

$stmt = $pdo->query("SELECT * FROM portfolio ORDER BY created_at DESC");
$portfolio_items = $stmt->fetchAll();

$page_title = "Portfolio & Case Studies";
$meta_desc = "View our portfolio of successful software development, mobile app, and cloud integration case studies. See how we drive business outcomes.";
include 'includes/header.php';
?>

<section class="hero" style="padding: 80px 0 60px;">
    <div class="container">
        <h1>Case Studies & Portfolio</h1>
        <p>Real-world examples of how our digital solutions accelerate enterprise growth.</p>
    </div>
</section>

<section class="section section-bg">
    <div class="container">
        <div class="grid-3">
            <?php if(count($portfolio_items) > 0): ?>
                <?php foreach($portfolio_items as $item): ?>
                    <div class="card" style="padding: 0; overflow: hidden; text-align: left;">
                        <img src="<?= htmlspecialchars($item['image_url'] ? $item['image_url'] : '/assets/images/placeholder-project.jpg') ?>" style="width:100%; height: 200px; object-fit: cover; background: #e2e8f0; display:block;" alt="<?= htmlspecialchars($item['title']) ?>">
                        <div style="padding: 25px;">
                            <span style="font-size: 0.85rem; color: var(--accent-color); font-weight: 600; text-transform: uppercase;"><?= htmlspecialchars($item['category'] ? $item['category'] : 'Case Study') ?></span>
                            <h3 style="margin: 10px 0; font-size: 1.25rem;"><?= htmlspecialchars($item['title']) ?></h3>
                            <p style="margin-bottom: 15px; font-size: 0.95rem; color: var(--text-muted);"><?= htmlspecialchars($item['description']) ?></p>
                            <p style="font-size: 0.9rem;"><strong>Client:</strong> <?= htmlspecialchars($item['client']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card" style="grid-column: span 3;">
                    <p>Portfolio items will appear here once added in the Admin Dashboard.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
