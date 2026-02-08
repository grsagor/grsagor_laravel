@php
    $pageTitle = 'Privacy Policy';
    $pageDescription = 'Privacy Policy for Golam Rahman Sagor\'s portfolio website. Learn how we collect, use, and protect your personal information.';
@endphp

@extends('front.layout.app')

@section('title', 'Privacy Policy')

@section('content')
<section class="py-5" style="padding-top: 8rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="animate-on-scroll">
                    <h1 class="section-title fw-bold mb-4">Privacy Policy</h1>
                    <p class="text-muted mb-4">Last updated: {{ date('F j, Y') }}</p>
                </div>

                <div class="animate-on-scroll" style="animation-delay: 0.1s;">
                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">1. Introduction</h2>
                        <p class="text-muted">
                            Welcome to my portfolio website. I respect your privacy and are committed to protecting your personal data. 
                            This privacy policy explains how I collect, use, and safeguard your information when you visit my website.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">2. Information We Collect</h2>
                        <p class="text-muted mb-3">When you use my contact form, I may collect the following information:</p>
                        <ul class="text-muted">
                            <li>Name</li>
                            <li>Email address</li>
                            <li>Subject of inquiry</li>
                            <li>Message content</li>
                        </ul>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">3. How We Use Your Information</h2>
                        <p class="text-muted mb-3">I use the information you provide to:</p>
                        <ul class="text-muted">
                            <li>Respond to your inquiries and requests</li>
                            <li>Communicate with you about potential projects</li>
                            <li>Improve my website and services</li>
                            <li>Send you updates (only if you've opted in)</li>
                        </ul>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">4. Data Protection</h2>
                        <p class="text-muted">
                            I implement appropriate security measures to protect your personal information. However, 
                            no method of transmission over the internet is 100% secure, and I cannot guarantee absolute security.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">5. Cookies</h2>
                        <p class="text-muted">
                            This website may use cookies to enhance your browsing experience. You can choose to disable 
                            cookies through your browser settings, though this may affect website functionality.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">6. Third-Party Links</h2>
                        <p class="text-muted">
                            My website may contain links to third-party websites. I am not responsible for the privacy 
                            practices of these external sites. I encourage you to review their privacy policies.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">7. Your Rights</h2>
                        <p class="text-muted mb-3">You have the right to:</p>
                        <ul class="text-muted">
                            <li>Access your personal data</li>
                            <li>Request correction of inaccurate data</li>
                            <li>Request deletion of your data</li>
                            <li>Object to processing of your data</li>
                        </ul>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">8. Contact Me</h2>
                        <p class="text-muted">
                            If you have any questions about this Privacy Policy, please contact me at 
                            <a href="mailto:grsagor08@gmail.com" class="text-primary">grsagor08@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
