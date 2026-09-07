// Dark Mode Toggle
function toggleDarkMode() {
    const isDark = document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', isDark);
}

// Check for saved dark mode preference
if (localStorage.getItem('darkMode') === 'true') {
    document.body.classList.add('dark-mode');
}

// Add to Cart via AJAX
function addToCart(productId) {
    const quantity = 1;
    
    fetch(shoesStoreData.ajaxurl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'add_to_cart',
            product_id: productId,
            quantity: quantity,
            nonce: shoesStoreData.nonce
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Product added to cart!');
            // Update cart count in header
            updateCartCount(data.data.cart_count);
        }
    })
    .catch(error => console.error('Error:', error));
}

// Update cart count
function updateCartCount(count) {
    const cartLink = document.querySelector('.cart-link');
    if (cartLink) {
        cartLink.innerHTML = `🛒 (${count})`;
    }
}

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Product filtering
function filterProducts(category) {
    const cards = document.querySelectorAll('.product-card');
    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Newsletter subscription
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.newsletter-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            // Add your newsletter API integration here
            alert('Thank you for subscribing!');
            this.reset();
        });
    }
});