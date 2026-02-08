<!-- Floating CTA Button -->
<div class="floating-cta" id="floatingCTA">
    <a href="{{ route('front.contact') }}" class="floating-cta-button" aria-label="Get In Touch">
        <i class="fa-solid fa-envelope me-2"></i>
        <span class="floating-cta-text">Get In Touch</span>
    </a>
    <a href="https://wa.me/8801710384479" target="_blank" rel="noopener noreferrer" class="floating-cta-button floating-cta-whatsapp" aria-label="WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
</div>

<style>
.floating-cta {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 15px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: all var(--transition-normal) ease;
}

.floating-cta.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.floating-cta-button {
    background: var(--primary-color);
    color: var(--text-light);
    padding: 15px 25px;
    border-radius: 50px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px var(--shadow-primary);
    transition: all var(--transition-normal) ease;
    font-weight: 600;
    font-size: 0.95rem;
    white-space: nowrap;
    min-width: 60px;
    height: 60px;
}

.floating-cta-button:hover {
    background: var(--primary-hover-color);
    color: var(--text-light);
    transform: translateY(-5px);
    box-shadow: 0 12px 35px var(--shadow-primary-hover);
}

.floating-cta-whatsapp {
    background: #25D366;
    width: 60px;
    height: 60px;
    padding: 0;
}

.floating-cta-whatsapp:hover {
    background: #20BA5A;
}

.floating-cta-text {
    display: none;
}

@media (min-width: 768px) {
    .floating-cta-text {
        display: inline;
    }
    
    .floating-cta-button {
        min-width: auto;
        padding: 15px 25px;
    }
}

@media (max-width: 767px) {
    .floating-cta {
        bottom: 20px;
        right: 20px;
        gap: 12px;
    }
    
    .floating-cta-button {
        width: 56px;
        height: 56px;
        padding: 0;
        font-size: 1.2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const floatingCTA = document.getElementById('floatingCTA');
    if (!floatingCTA) return;

    // Show CTA after scrolling down
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            floatingCTA.classList.add('show');
        } else {
            floatingCTA.classList.remove('show');
        }
    });

    // Hide on contact page
    const currentPath = window.location.pathname;
    if (currentPath.includes('/contact')) {
        floatingCTA.style.display = 'none';
    }
});
</script>
