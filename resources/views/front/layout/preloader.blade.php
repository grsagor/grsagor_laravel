<!-- Stylish Preloader -->
<div id="preloader"
    class="position-fixed top-0 start-0 w-100 vh-100 bg-white d-flex justify-content-center align-items-center"
    style="z-index: 1050;">
    <div class="d-flex gap-3 align-items-center">
        <div class="preloader-dot"></div>
        <div class="preloader-dot" style="animation-delay: 0.2s;"></div>
        <div class="preloader-dot" style="animation-delay: 0.4s;"></div>
    </div>
</div>

<script>
    window.addEventListener('load', () => {
        const preloader = document.getElementById('preloader');
        if (!preloader) return;
        // Fade out
        setTimeout(() => {
            preloader.style.transition = 'opacity var(--transition-slow) ease';
            preloader.style.opacity = '0';
        }, 800);
        // Remove from DOM after fade
        setTimeout(() => preloader.remove(), 1300);
    });
</script>
