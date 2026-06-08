// Main JavaScript - BARCO MILY COMPANY

document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    setupEventListeners();
}

function setupEventListeners() {
    // Filter products
    const filterButtons = document.querySelectorAll('input[name="aina"]');
    filterButtons.forEach(btn => {
        btn.addEventListener('change', filterProducts);
    });
}

function filterProducts(event) {
    const selected = event.target.value;
    const cards = document.querySelectorAll('.product-card');
    
    cards.forEach(card => {
        if (selected === 'all' || card.getAttribute('data-aina') === selected) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}

function addToCart(id, jina, bei) {
    // Get cart from localStorage
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    
    // Check if item already exists
    const existing = cart.find(item => item.id === id);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({
            id: id,
            jina: jina,
            bei: bei,
            qty: 1
        });
    }
    
    // Save back to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Show notification
    showNotification('✓ ' + jina + ' imeongezwa kwenye kadi');
    updateCartBadge();
}

function updateCartBadge() {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const badge = document.getElementById('cart-badge');
    if (badge) {
        badge.textContent = cart.reduce((sum, item) => sum + item.qty, 0);
    }
}

function showNotification(message) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #4CAF50;
        color: white;
        padding: 15px 20px;
        border-radius: 4px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        z-index: 1000;
        animation: slideIn 0.3s ease-out;
    `;
    
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// CSS for notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Initialize cart badge on page load
updateCartBadge();
