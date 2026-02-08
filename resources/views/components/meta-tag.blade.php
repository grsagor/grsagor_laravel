@php
    $currentUrl = url()->current();
    $siteName = 'Golam Rahman Sagor';
    $siteDescription = 'Professional Web Developer & Software Engineer specializing in Laravel, PHP, and modern web technologies. Building scalable, high-performance web applications.';
    $siteImage = asset('assets/images/intro-bg.jpg');
    $siteUrl = config('app.url', 'https://grsagor.com');
    
    // Dynamic meta based on current page
    // Get pageTitle from view variable, or use default
    $pageTitle = isset($pageTitle) ? $pageTitle : 'Home';
    $pageDescription = isset($pageDescription) ? $pageDescription : $siteDescription;
    $pageImage = isset($pageImage) ? $pageImage : $siteImage;
    $pageType = isset($pageType) ? $pageType : 'website';
    
    $fullTitle = $pageTitle . ' | ' . $siteName . ' - Professional Web Developer & Software Engineer';
@endphp

<!-- Primary Meta Tags -->
<meta name="title" content="{{ $fullTitle }}" />
<meta name="description" content="{{ $pageDescription }}" />
<meta name="keywords" content="web developer, software engineer, Laravel developer, PHP developer, full stack developer, web development, custom web applications, responsive design, SEO optimization" />
<meta name="author" content="{{ $siteName }}" />
<meta name="robots" content="index, follow" />
<meta name="language" content="English" />
<meta name="revisit-after" content="7 days" />
<meta name="theme-color" content="#ff5722" />

<!-- Canonical URL -->
<link rel="canonical" href="{{ $currentUrl }}" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $pageType }}" />
<meta property="og:url" content="{{ $currentUrl }}" />
<meta property="og:title" content="{{ $fullTitle }}" />
<meta property="og:description" content="{{ $pageDescription }}" />
<meta property="og:image" content="{{ $pageImage }}" />
<meta property="og:site_name" content="{{ $siteName }}" />
<meta property="og:locale" content="en_US" />

<!-- X (Twitter) -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ $currentUrl }}" />
<meta name="twitter:title" content="{{ $fullTitle }}" />
<meta name="twitter:description" content="{{ $pageDescription }}" />
<meta name="twitter:image" content="{{ $pageImage }}" />
<meta name="twitter:creator" content="@iamgrsagor" />
<meta name="twitter:site" content="@iamgrsagor" />

<!-- Additional SEO Meta Tags -->
<meta name="geo.region" content="BD" />
<meta name="geo.placename" content="Bangladesh" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />

<!-- Structured Data (JSON-LD) -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "{{ $siteName }}",
    "url": "{{ $siteUrl }}",
    "image": "{{ $siteImage }}",
    "jobTitle": "Software Engineer & Web Developer",
    "worksFor": {
        "@type": "Organization",
        "name": "Freelance Developer"
    },
    "sameAs": [
        "https://www.linkedin.com/in/iamgrsagor",
        "https://github.com/grsagor",
        "https://medium.com/@iamgrsagor",
        "https://dev.to/iamgrsagor",
        "https://x.com/iamgrsagor"
    ],
    "email": "grsagor08@gmail.com",
    "telephone": "+8801710384479",
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "BD"
    }
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{ $siteName }}",
    "url": "{{ $siteUrl }}",
    "description": "{{ $siteDescription }}",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ $siteUrl }}/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
