@php
    $pageTitle = 'Terms of Service';
    $pageDescription = 'Terms of Service for Golam Rahman Sagor\'s portfolio website. Read the terms and conditions for using this website.';
@endphp

@extends('front.layout.app')

@section('title', 'Terms of Service')

@section('content')
<section class="py-5" style="padding-top: 8rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="animate-on-scroll">
                    <h1 class="section-title fw-bold mb-4">Terms of Service</h1>
                    <p class="text-muted mb-4">Last updated: {{ date('F j, Y') }}</p>
                </div>

                <div class="animate-on-scroll" style="animation-delay: 0.1s;">
                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">1. Acceptance of Terms</h2>
                        <p class="text-muted">
                            By accessing and using this website, you accept and agree to be bound by the terms and 
                            provision of this agreement. If you do not agree to these terms, please do not use this website.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">2. Use License</h2>
                        <p class="text-muted mb-3">
                            Permission is granted to temporarily view and download materials from this website for personal, 
                            non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                        </p>
                        <ul class="text-muted">
                            <li>Modify or copy the materials</li>
                            <li>Use the materials for any commercial purpose</li>
                            <li>Attempt to decompile or reverse engineer any software</li>
                            <li>Remove any copyright or other proprietary notations</li>
                        </ul>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">3. Disclaimer</h2>
                        <p class="text-muted">
                            The materials on this website are provided on an 'as is' basis. I make no warranties, 
                            expressed or implied, and hereby disclaim and negate all other warranties including, without limitation, 
                            implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement 
                            of intellectual property or other violation of rights.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">4. Limitations</h2>
                        <p class="text-muted">
                            In no event shall I or my suppliers be liable for any damages (including, without limitation, 
                            damages for loss of data or profit, or due to business interruption) arising out of the use or 
                            inability to use the materials on this website.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">5. Accuracy of Materials</h2>
                        <p class="text-muted">
                            The materials appearing on this website could include technical, typographical, or photographic errors. 
                            I do not warrant that any of the materials on its website are accurate, complete, or current. 
                            I may make changes to the materials contained on its website at any time without notice.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">6. Links</h2>
                        <p class="text-muted">
                            I have not reviewed all of the sites linked to this website and am not responsible for the 
                            contents of any such linked site. The inclusion of any link does not imply endorsement by me. 
                            Use of any such linked website is at the user's own risk.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">7. Modifications</h2>
                        <p class="text-muted">
                            I may revise these terms of service at any time without notice. By using this website, 
                            you are agreeing to be bound by the then current version of these terms of service.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h2 class="h4 fw-bold mb-3">8. Contact Information</h2>
                        <p class="text-muted">
                            If you have any questions about these Terms of Service, please contact me at 
                            <a href="mailto:grsagor08@gmail.com" class="text-primary">grsagor08@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
