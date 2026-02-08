@php
    use App\Utils\Helper;
    
    // Get settings values (0 means use database count)
    $projectsSetting = Helper::getSettings('stats_projects_completed');
    $experienceSetting = Helper::getSettings('stats_years_experience');
    $clientsSetting = Helper::getSettings('stats_happy_clients');
    $blogsSetting = Helper::getSettings('stats_blog_posts');
    
    // Calculate final values: if setting is 0 or empty, use database count, otherwise use setting
    $projectsCount = (!empty($projectsSetting) && $projectsSetting != '0' && $projectsSetting != 0) 
        ? (int)$projectsSetting 
        : (isset($projects) ? $projects->count() : 0);
    
    $experienceCount = (!empty($experienceSetting) && $experienceSetting != '0' && $experienceSetting != 0) 
        ? (int)$experienceSetting 
        : (isset($experiences) ? $experiences->count() : 0);
    
    $clientsCount = (!empty($clientsSetting) && $clientsSetting != '0' && $clientsSetting != 0) 
        ? (int)$clientsSetting 
        : (isset($reviews) ? $reviews->count() : 0);
    
    $blogsCount = (!empty($blogsSetting) && $blogsSetting != '0' && $blogsSetting != 0) 
        ? (int)$blogsSetting 
        : (isset($blogs) ? $blogs->count() : 0);
@endphp

<section class="stats-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3 animate-on-scroll">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold mb-2" data-count="{{ $projectsCount }}">0</h2>
                    <p class="mb-0 text-white-50">Projects Completed</p>
                </div>
            </div>
            <div class="col-6 col-md-3 animate-on-scroll" style="animation-delay: 0.1s;">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold mb-2" data-count="{{ $experienceCount }}">0</h2>
                    <p class="mb-0 text-white-50">Years Experience</p>
                </div>
            </div>
            <div class="col-6 col-md-3 animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold mb-2" data-count="{{ $clientsCount }}">0</h2>
                    <p class="mb-0 text-white-50">Happy Clients</p>
                </div>
            </div>
            <div class="col-6 col-md-3 animate-on-scroll" style="animation-delay: 0.3s;">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold mb-2" data-count="{{ $blogsCount }}">0</h2>
                    <p class="mb-0 text-white-50">Blog Posts</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statItems = document.querySelectorAll('.stat-item [data-count]');
    
    const animateCounter = (element) => {
        const target = parseInt(element.getAttribute('data-count'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                element.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target;
            }
        };
        
        updateCounter();
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                if (!element.classList.contains('counted')) {
                    element.classList.add('counted');
                    animateCounter(element);
                }
                observer.unobserve(element);
            }
        });
    }, { threshold: 0.5 });
    
    statItems.forEach(item => observer.observe(item));
});
</script>

<style>
.stats-section {
    position: relative;
    overflow: hidden;
}

.stats-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
    pointer-events: none;
}

.stat-item {
    position: relative;
    z-index: 1;
    padding: 1rem;
}

.stat-item h2 {
    color: var(--text-light);
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}
</style>
