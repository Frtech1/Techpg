<?php
$page_title = "Contact Us - Free Consultation";
$meta_desc = "Get in touch with our IT experts today. We offer free consultations for businesses looking to scale their software, web, and mobile infrastructure.";
include 'includes/header.php';

$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // In a production environment, you would use mail() or a service like PHPMailer to actually send this inquiry.
    // For now, we simulate a successful submission.
    $success = true;
}
?>

<section class="hero" style="padding: 80px 0 60px;">
    <div class="container">
        <h1>Let's Build Something Great</h1>
        <p>Contact our sales team for a free IT consultation and project estimate.</p>
    </div>
</section>

<section class="section section-bg">
    <div class="container" style="display: flex; flex-wrap: wrap; gap: 50px;">
        
        <div style="flex: 1; min-width: 300px;">
            <h2 style="margin-bottom: 20px;">Get In Touch</h2>
            <p style="color: var(--text-muted); margin-bottom: 30px;">Fill out the form below and one of our solution architects will get back to you within 24 hours.</p>
            
            <?php if($success): ?>
                <div style="background: #dcfce7; color: #166534; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                    <i class="fa-solid fa-circle-check"></i> Thank you! Your inquiry has been received. Our team will contact you shortly.
                </div>
            <?php else: ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600;">Full Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600;">Email Address *</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600;">Phone Number</label>
                        <input type="tel" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600;">How can we help? *</label>
                        <textarea name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem; padding: 15px;">Send Inquiry</button>
                </form>
            <?php endif; ?>
        </div>

        <div style="flex: 1; min-width: 300px;">
            <div class="card" style="text-align: left; background: var(--primary-color); color: white; border: none; height: 100%; display: flex; flex-direction: column; justify-content: center;">
                <h3 style="color: white; margin-bottom: 30px; font-size: 1.8rem;">Contact Information</h3>
                
                <div style="margin-bottom: 30px; display: flex; align-items: flex-start; gap: 15px;">
                    <i class="fa-solid fa-location-dot" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h4 style="color: white; margin-bottom: 5px;">Headquarters</h4>
                        <p style="color: #cbd5e1;">123 Tech Lane<br>Silicon Valley, CA 94000<br>United States</p>
                    </div>
                </div>
                
                <div style="margin-bottom: 30px; display: flex; align-items: flex-start; gap: 15px;">
                    <i class="fa-solid fa-phone" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h4 style="color: white; margin-bottom: 5px;">Phone</h4>
                        <p style="color: #cbd5e1;">+1 (555) 123-4567<br>Mon-Fri, 9am - 6pm PST</p>
                    </div>
                </div>
                
                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <i class="fa-solid fa-envelope" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h4 style="color: white; margin-bottom: 5px;">Email Support</h4>
                        <p style="color: #cbd5e1;">contact@nextechsolutions.example.com</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
