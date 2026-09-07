<?php get_header(); ?>

<main class="site-main">
    <div class="product-single-wrapper">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <div class="product-single">
                    <div class="product-gallery">
                        <?php woocommerce_show_product_images(); ?>
                    </div>
                    
                    <div class="product-details">
                        <h1><?php the_title(); ?></h1>
                        
                        <?php woocommerce_template_single_rating(); ?>
                        
                        <div class="product-price-wrapper">
                            <?php woocommerce_template_single_price(); ?>
                        </div>
                        
                        <div class="product-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <?php woocommerce_template_single_add_to_cart(); ?>
                        
                        <div class="product-meta">
                            <?php woocommerce_template_single_meta(); ?>
                        </div>
                    </div>
                </div>
                
                <div class="product-tabs">
                    <?php woocommerce_output_product_data_tabs(); ?>
                </div>
                
                <?php woocommerce_output_related_products(); ?>
                
                <?php
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>