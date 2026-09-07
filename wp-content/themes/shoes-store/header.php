<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern shoes e-commerce store">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="<?php echo home_url('/'); ?>">SHOES</a>
            </div>
            
            <nav class="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'fallback_cb' => 'wp_page_menu'
                ));
                ?>
            </nav>
            
            <div class="header-actions">
                <button class="theme-toggle" onclick="toggleDarkMode()">🌙</button>
                <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link">🛒</a>
            </div>
        </div>
    </header>