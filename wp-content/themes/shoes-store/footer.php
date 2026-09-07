    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>Premium shoes for every lifestyle and occasion.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu',
                        'fallback_cb' => false
                    ));
                    ?>
                </div>
                
                <div class="footer-section">
                    <h3>Newsletter</h3>
                    <p>Subscribe for exclusive deals and new arrivals.</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
                
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Email: info@shoes.com</p>
                    <p>Phone: +1 (555) 123-4567</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Shoes Store. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>