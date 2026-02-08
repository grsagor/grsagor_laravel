<!-- Back to Top Button -->
<a href="#top" class="back-to-top btn btn-primary rounded-circle" id="backToTop" aria-label="Back to top">
    <i class="fa-solid fa-arrow-up"></i>
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const backToTop = document.getElementById('backToTop');
    if (!backToTop) return;

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });

    backToTop.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
</script>
