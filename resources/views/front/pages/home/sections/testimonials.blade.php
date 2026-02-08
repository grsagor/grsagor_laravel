<section class="testimonials section bg-light py-5">
    <div class="container">
        <x-section-title 
            title="What Clients Say" 
            subtitle="Testimonials from clients I've worked with"
        />
        <div class="swiper testimonials-swiper animate-on-scroll">
            <div class="swiper-wrapper">

                @foreach ($reviews as $review)
                    <div class="swiper-slide">
                        <div class="card border-0 shadow-sm p-4 h-100" itemscope itemtype="https://schema.org/Review">
                            <div itemprop="reviewBody">
                                <p class="mb-3 fst-italic" style="line-height: 1.8;">
                                    "{{ $review->review }}"
                                </p>
                            </div>
                            <div itemprop="author" itemscope itemtype="https://schema.org/Person">
                                <h5 class="text-end mb-0 fw-bold text-primary">
                                    - <span itemprop="name">{{ $review->reviewer->name }}</span>
                                </h5>
                            </div>
                            <meta itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                            <meta itemprop="ratingValue" content="5">
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.testimonials-swiper', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>
@endpush
