<?php
$product = wc_get_product(get_the_ID());
$rating = $product->get_average_rating();
?>

<div class="product-card">
    <div class="product-image-wrapper">
        <?php the_post_thumbnail('woocommerce_thumbnail', array('class' => 'product-image')); ?>
    </div>
    
    <div class="product-info">
        <h3 class="product-name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        
        <div class="product-price">
            <?php echo $product->get_price_html(); ?>
        </div>
        
        <?php if ($rating) : ?>
            <div class="product-rating">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo ($i <= round($rating)) ? '<span class="star">★</span>' : '<span class="star">☆</span>';
                }
                ?>
                <span class="rating-count">(<?php echo $product->get_review_count(); ?>)</span>
            </div>
        <?php endif; ?>
        
        <button class="add-to-cart" onclick="addToCart(<?php echo get_the_ID(); ?>)">Add to Cart</button>
    </div>
</div>