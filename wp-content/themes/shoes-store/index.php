<?php get_header(); ?>

<main class="site-main">
    <section class="hero">
        <div class="hero-content">
            <h1>Step Into Style</h1>
            <p>Discover our collection of premium, modern shoes for every occasion</p>
            <a href="<?php echo get_post_type_archive_link('product'); ?>" class="cta-button">Shop Now</a>
        </div>
    </section>
    
    <section class="products-container">
        <h2 class="section-title">Featured Shoes</h2>
        
        <div class="product-grid">
            <?php
            $featured = get_featured_products(8);
            if ($featured->have_posts()) :
                while ($featured->have_posts()) : $featured->the_post();
                    get_template_part('template-parts/product-card');
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>
    
    <section class="features-section">
        <div class="features-container">
            <div class="feature">
                <div class="feature-icon">🚚</div>
                <h3>Free Shipping</h3>
                <p>On orders over $50</p>
            </div>
            <div class="feature">
                <div class="feature-icon">↩️</div>
                <h3>Easy Returns</h3>
                <p>30-day money back guarantee</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🔒</div>
                <h3>Secure Payment</h3>
                <p>100% secure transactions</p>
            </div>
            <div class="feature">
                <div class="feature-icon">⭐</div>
                <h3>Quality Guaranteed</h3>
                <p>Premium materials and craftsmanship</p>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>