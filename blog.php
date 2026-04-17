<?php
require_once 'includes/config.php';

$stmt = $pdo->query("SELECT id, title, slug, author, created_at, seo_meta_desc FROM blog_posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();

$page_title = "Tech Blog & Insights";
$meta_desc = "Read our latest articles on cloud computing, web development, mobile apps, and IT infrastructure best practices.";
include 'includes/header.php';
?>

<section class="hero" style="padding: 80px 0 60px;">
    <div class="container">
        <h1>IT Insights & News</h1>
        <p>Stay updated with the latest trends in technology and software development.</p>
    </div>
</section>

<section class="section section-bg">
    <div class="container">
        <div class="grid-3">
            <?php if(count($posts) > 0): ?>
                <?php foreach($posts as $post): ?>
                    <article class="card" style="text-align: left;">
                        <span style="font-size: 0.85rem; color: var(--text-muted);"><?= date('F j, Y', strtotime($post['created_at'])) ?> &bull; <?= htmlspecialchars($post['author']) ?></span>
                        <h3 style="margin: 10px 0;">
                            <a href="/blog/<?= htmlspecialchars($post['slug']) ?>" style="color: var(--primary-color); text-decoration: none;"><?= htmlspecialchars($post['title']) ?></a>
                        </h3>
                        <p style="margin-bottom: 20px; color: var(--text-muted);"><?= htmlspecialchars($post['seo_meta_desc']) ?></p>
                        <a href="/blog/<?= htmlspecialchars($post['slug']) ?>" class="btn btn-secondary btn-sm" style="padding: 8px 15px; font-size: 0.9rem;">Read More</a>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No blog posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
