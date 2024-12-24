<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>SagorTheNoob</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- script
   ================================================== -->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!-- favicons
 ================================================== -->
    <link rel="icon" type="image/png" href="favicon.png">

</head>

<body id="top">

    <!-- header
   ================================================== -->
    <header>
        <div class="row">

            <div class="top-bar">
                <a class="menu-toggle" href="#"><span>Menu</span></a>

                <div class="logo">
                    <a class="smoothscroll" href="#intro">SagorTheNoob</a>
                </div>

                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li class="current"><a class="smoothscroll" href="#intro" title="">Home</a></li>
                        <li><a class="smoothscroll" href="#about" title="">About</a></li>
                        <li><a class="smoothscroll" href="#resume" title="">Resume</a></li>
                        <li><a class="smoothscroll" href="#portfolio" title="">Portfolio</a></li>
                        <li><a class="smoothscroll" href="#services" title="">Services</a></li>
                        <li><a class="smoothscroll" href="#contact" title="">Contact</a></li>
                        {{-- <li><a href="styles.html" title="">Style Demo</a></li> --}}
                    </ul>
                </nav>
            </div> <!-- /top-bar -->

        </div> <!-- /row -->
    </header> <!-- /header -->

    <!-- intro section
   ================================================== -->
    <section id="intro">

        <div class="intro-overlay"></div>

        <div class="intro-content">
            <div class="row">

                <div class="col-twelve">

                    <h5>Hello, World.</h5>
                    <h1>I'm SagorTheNoob.</h1>

                    <p class="intro-position">
                        <span>Software Engineer</span>
                    </p>

                    <a class="button stroke smoothscroll" href="#about" title="">More About Me</a>

                </div>

            </div>
        </div> <!-- /intro-content -->

        <ul class="intro-social">
            <li><a target="_blank" href="https://facebook.com/iamgrsagor"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a target="_blank" href="https://github.com/grsagor"><i class="fa-brands fa-github"></i></a></li>
            <li><a target="_blank" href="https://www.linkedin.com/in/iamgrsagor/"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a target="_blank" href="https://medium.com/@iamgrsagor"><i class="fa-brands fa-medium"></i></a></li>
            <li><a target="_blank" href="https://dev.to/iamgrsagor"><i class="fa-brands fa-dev"></i></a></li>
            <li><a target="_blank" href="https://x.com/iamgrsagor"><i class="fa-brands fa-x-twitter"></i></a></li>
        </ul> <!-- /intro-social -->

    </section> <!-- /intro -->


    <!-- about section
   ================================================== -->
    <section id="about">

        <div class="row section-intro">
            <div class="col-twelve">

                <h5>About</h5>
                <h1>Let me introduce myself.</h1>

                <div class="intro-info">

                    <img src="{{ asset('assets/images/profile-pic.jpg') }}" alt="Profile Picture">

                    <p class="lead">I am deeply passionate about software engineering, thriving in the ever-evolving
                        world of technology. Debugging is one of my greatest joys; I approach every issue as a challenge
                        waiting to be unraveled, often finding solutions where others see dead ends.

                        My experience spans multiple frameworks and technologies, allowing me to adapt quickly to
                        diverse project requirements. Whether it's crafting dynamic web applications, optimizing backend
                        systems, or integrating innovative solutions, I take pride in delivering efficient and scalable
                        results.

                        Driven by a relentless curiosity, I enjoy exploring new tools and methodologies, constantly
                        honing my skills to stay ahead of the curve. For me, software engineering is more than a
                        profession—it's a craft that blends logic, creativity, and persistence into building impactful
                        solutions.</p>
                </div>

            </div>
        </div> <!-- /section-intro -->

        <div class="row about-content">

            <div class="col-six tab-full">

                <h3>Profile</h3>
                <p>I am a dedicated and passionate software engineer with a strong foundation in building efficient,
                    user-focused applications. I thrive on solving complex problems, continuously exploring innovative
                    solutions, and learning new technologies to enhance my expertise. My work reflects a commitment to
                    excellence and a keen eye for detail, ensuring every project is both functional and impactful.</p>

                <ul class="info-list">
                    <li>
                        <strong>Fullname:</strong>
                        <span>Golam Rahman Sagor</span>
                    </li>
                    <li>
                        <strong>Birth Date:</strong>
                        <span>23, August</span>
                    </li>
                    <li>
                        <strong>Job:</strong>
                        <span>Software Engineer</span>
                    </li>
                    <li>
                        <strong>Email:</strong>
                        <span>grsagor08@gmail.com</span>
                    </li>

                </ul> <!-- /info-list -->

            </div>

            <div class="col-six tab-full">

                <h3>Skills</h3>
                <p>I have a versatile skill set honed through years of experience in software development. My expertise
                    spans multiple frameworks, languages, and tools, enabling me to craft robust and scalable solutions.
                    From front-end development to backend engineering, I’m committed to writing clean, efficient, and
                    maintainable code. Here’s a breakdown of my core competencies:</p>

                <ul class="skill-bars">
                    @foreach ($technologies as $technology)
                        <li>
                            <strong>{{ $technology->name }}</strong>
                            <div class="position-relative"><div class="progress percent{{ $technology->skill }}"><span>{{ $technology->skill }}%</span></div></div>
                        </li>
                    @endforeach

                </ul> <!-- /skill-bars -->

            </div>

        </div>

        <div class="row button-section">
            <div class="col-twelve">
                <a href="#contact" title="Hire Me" class="button stroke smoothscroll">Hire Me</a>
                {{-- <a href="#" title="Download CV" class="button button-primary">Download CV</a> --}}
            </div>
        </div>

    </section> <!-- /process-->


    <!-- resume Section
   ================================================== -->
    <section id="resume" class="grey-section">

        <div class="row section-intro">
            <div class="col-twelve">

                <h5>Resume</h5>
                <h1>More of my credentials.</h1>

                <p class="lead">I am a dedicated and skilled professional with experience in various programming languages and frameworks. I specialize in creating efficient, high-quality web applications and collaborating effectively with teams to deliver exceptional results.</p>

            </div>
        </div> <!-- /section-intro-->

        <div class="row resume-timeline">

            <div class="col-twelve resume-header">

                <h2>Work Experience</h2>

            </div> <!-- /resume-header -->

            <div class="col-twelve">

                <div class="timeline-wrap">
                    <div class="timeline-block">
                        <div class="timeline-ico">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="timeline-header">
                            <h3>Software Engineer</h3>
                            <p>October 2024 - Present</p>
                        </div>
                        <div class="timeline-content">
                            <h4>TheDevGarden</h4>
                            <p>At TheDevGarden, I work as a software engineer. My responsibilities include creating Next.js templates, customizing WordPress websites, and assisting teammates with JavaScript-related problems. I focus on delivering efficient solutions while ensuring teamwork and code quality in all projects.</p>
                        </div>
                    </div>
                    <div class="timeline-block">
                        <div class="timeline-ico">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="timeline-header">
                            <h3>Associate Software Engineer</h3>
                            <p>February 2023 - September 2024</p>
                        </div>
                        <div class="timeline-content">
                            <h4>NexKraft Limited</h4>
                            <p>At NexKraft Limited, I worked on a diverse range of programming languages and frameworks, including Laravel, PHP, React, Next.js, and Angular. My role involved developing robust web applications, enhancing functionality, and ensuring code quality across projects while collaborating effectively with the team.</p>
                        </div>
                    </div>
                </div> <!-- /timeline-wrap -->

            </div> <!-- /col-twelve -->

        </div> <!-- /resume-timeline -->

        <div class="row resume-timeline">

            <div class="col-twelve resume-header">

                <h2>Education</h2>

            </div> <!-- /resume-header -->

            <div class="col-twelve">

                <div class="timeline-wrap">
                    <div class="timeline-block">

                        <div class="timeline-ico">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <div class="timeline-header">
                            <h3>Bachelor in Computer Science & Engineering</h3>
                            <p>January 2019 - December 2022</p>
                        </div>

                        <div class="timeline-content">
                            <h4>Stamford University Bangladesh</h4>
                            <p>I completed my Bachelor’s degree in Computer Science & Engineering from Stamford University Bangladesh. During this time, I gained comprehensive knowledge in programming, algorithms, and software development, which laid the foundation for my skills in building efficient and innovative web applications.</p>
                        </div>

                    </div> <!-- /timeline-block -->
                </div> <!-- /timeline-wrap -->

            </div> <!-- /col-twelve -->

        </div> <!-- /resume-timeline -->

    </section> <!-- /features -->


    <!-- Portfolio Section
   ================================================== -->
    <section id="portfolio">

        <div class="row section-intro">
            <div class="col-twelve">

                <h5>Portfolio</h5>
                <h1>Check Out Some of My Works.</h1>

                <p class="lead">Explore a selection of projects showcasing my expertise in web development, including custom Next.js templates, WordPress customizations, and dynamic web applications built with React, Laravel, and Angular. Each project reflects my commitment to quality and innovation.</p>

            </div>
        </div> <!-- /section-intro-->

        <div class="row portfolio-content">

            <div class="col-twelve">

                <!-- portfolio-wrapper -->
                <div id="folio-wrapper" class="block-1-2 block-mob-full stack">

                    <div class="bgrid folio-item">
                        <div class="item-wrap">
                            <img src="{{ asset('assets/images/portfolio/abmgsac.png') }}" alt="Liberty">
                            <a href="#modal-01" class="overlay">
                                <div class="folio-item-table">
                                    <div class="folio-item-cell">
                                        <h3 class="folio-title">AMB Graduate School and College</h3>
                                        <span class="folio-types">
                                            Backend Development
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- /folio-item -->
                    <div class="bgrid folio-item">
                        <div class="item-wrap">
                            <img src="{{ asset('assets/images/portfolio/unipuler.png') }}" alt="Liberty">
                            <a href="#modal-02" class="overlay">
                                <div class="folio-item-table">
                                    <div class="folio-item-cell">
                                        <h3 class="folio-title">Unipuler</h3>
                                        <span class="folio-types">
                                            Full-Stack Development
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- /folio-item -->

                    <!-- modal popups - begin
 ============================================================= -->
                    <div id="modal-01" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="{{ asset('assets/images/portfolio/modals/abmgsac.png') }}" alt="" />
                        </div>

                        <div class="description-box">
                            <h4>AMB Graduate School and College</h4>
                            <p>I transform static website content into fully dynamic, interactive, and user-friendly experiences tailored to meet your specific needs.</p>

                            <div class="categories">Backend Development</div>
                        </div>

                        <div class="link-box">
                            <a href="https://abmgsac.com">Visit</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div>
                    <div id="modal-02" class="popup-modal slider mfp-hide">

                        <div class="media">
                            <img src="{{ asset('assets/images/portfolio/modals/unipuler.png') }}" alt="" />
                        </div>

                        <div class="description-box">
                            <h4>Unipuler</h4>
                            <p>This was a Codecanyon project where I fully customized the website to meet the client's specific requirements. I revamped the features, including integrating a payment gateway and adding product variations, making it a dynamic and tailored solution for the client’s needs.</p>

                            <div class="categories">Full-Stack Development</div>
                        </div>

                        <div class="link-box">
                            <a href="https://unipuler.com">Visit</a>
                            <a href="#" class="popup-modal-dismiss">Close</a>
                        </div>

                    </div>


                    <!-- modal popups - end
 ============================================================= -->

                </div> <!-- /portfolio-wrapper -->

            </div> <!-- /twelve -->

        </div> <!-- /portfolio-content -->

    </section> <!-- /portfolio -->


    <!-- CTA Section
   ================================================== -->
    {{-- <section id="cta" class="grey-section">

        <div class="row cta-content">

            <div class="col-twelve section-ads">

                <h2 class="h01"><a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">Styleshout Recommends
                        Dreamhost.</a></h2>

                <p class="lead">
                    Looking for an awesome and reliable webhosting? Try <a
                        href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT"><span>DreamHost</span></a>.
                    Get <span>$50 off</span> when you sign up with the promocode <span>styleshout</span>.
                    <!-- Simply type	the promocode in the box labeled “Promo Code” when placing your order. -->
                </p>

                <div class="action">
                    <a class="button button-primary large"
                        href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">Sign Up Now</a>
                </div>

            </div>

        </div> <!-- /cta-content -->

    </section> <!-- /cta --> --}}


    <!-- services Section
   ================================================== -->
    <section id="services">

        <div class="overlay"></div>

        <div class="row section-intro">
            <div class="col-twelve">

                <h5>Services</h5>
                <h1>What Can I Do For You?</h1>

                <p class="lead">Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia
                    nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>

            </div>
        </div> <!-- /section-intro -->

        <div class="row services-content">

            <div id="owl-slider" class="owl-carousel services-list">

                @foreach ($services as $service)
                <div class="service">

                    <span class="icon"><i class="{{ $service->icon }}"></i></span>

                    <div class="service-content">

                        <h3>{{ $service->title }}</h3>

                        <p class="desc">{{ $service->description }}</p>
                    </div>
                </div>
                @endforeach
            </div> <!-- /services-list -->

        </div> <!-- /services-content -->

    </section> <!-- /services -->


    <!-- stats Section
   ================================================== -->
    <section id="stats" class="count-up">

        <div class="row">
            <div class="col-twelve">

                <div class="stats-list">

                    <div class="stat">

                        <div class="icon-part">
                            <i class="icon-pencil-ruler"></i>
                        </div>

                        <h3 class="stat-count">
                            10
                        </h3>

                        <h5 class="stat-title">
                            Projects Completed
                        </h5>

                    </div> <!-- /stat -->

                    <div class="stat">

                        <div class="icon-part">
                            <i class="icon-users"></i>
                        </div>

                        <h3 class="stat-count">
                            5
                        </h3>

                        <h5 class="stat-title">
                            Happy Clients
                        </h5>

                    </div> <!-- /stat -->

                    {{-- <div class="stat">

                        <div class="icon-part">
                            <i class="icon-badge"></i>
                        </div>

                        <h3 class="stat-count">
                            200
                        </h3>

                        <h5 class="stat-title">
                            Awards Received
                        </h5>

                    </div> <!-- /stat --> --}}

                    <div class="stat">

                        <div class="icon-part">
                            <i class="icon-light-bulb"></i>
                        </div>

                        <h3 class="stat-count">
                            2
                        </h3>

                        <h5 class="stat-title">
                            Crazy Ideas
                        </h5>

                    </div> <!-- /stat -->

                    <div class="stat">

                        <div class="icon-part">
                            <i class="icon-cup"></i>
                        </div>

                        <h3 class="stat-count">
                            1500
                        </h3>

                        <h5 class="stat-title">
                            Coffee Cups
                        </h5>

                    </div> <!-- /stat -->

                    <div class="stat">

                        <div class="icon-part">
                            <i class="icon-clock"></i>
                        </div>

                        <h3 class="stat-count">
                            7200
                        </h3>

                        <h5 class="stat-title">
                            Hours
                        </h5>

                    </div> <!-- /stat -->

                </div> <!-- /stats-list -->

            </div> <!-- /twelve -->
        </div> <!-- /row -->

    </section> <!-- /stats -->


    <!-- contact
   ================================================== -->
    <section id="contact">

        <div class="row section-intro">
            <div class="col-twelve">

                <h5>Contact</h5>
                <h1>I'd Love To Hear From You.</h1>

                <p class="lead">Feel free to reach out for collaborations, inquiries, or any web development needs. Let’s work together to bring your ideas to life and create something amazing!</p>

            </div>
        </div> <!-- /section-intro -->

        <div class="row contact-form">

            <div class="col-twelve">

                <!-- form -->
                <form name="contactForm" id="contactForm" method="post" action="">
                    <fieldset>

                        <div class="form-field">
                            <input name="contactName" type="text" id="contactName" placeholder="Name"
                                value="" minlength="2" required="">
                        </div>
                        <div class="form-field">
                            <input name="contactEmail" type="email" id="contactEmail" placeholder="Email"
                                value="" required="">
                        </div>
                        <div class="form-field">
                            <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject"
                                value="">
                        </div>
                        <div class="form-field">
                            <textarea name="contactMessage" id="contactMessage" placeholder="message" rows="10" cols="50"
                                required=""></textarea>
                        </div>
                        <div class="form-field">
                            <button class="submitform">Submit</button>
                            <div id="submit-loader">
                                <div class="text-loader">Sending...</div>
                                <div class="s-loader">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </form> <!-- Form End -->

                <!-- contact-warning -->
                <div id="message-warning">
                </div>
                <!-- contact-success -->
                <div id="message-success">
                    <i class="fa fa-check"></i>Your message was sent, thank you!<br>
                </div>

            </div> <!-- /col-twelve -->

        </div> <!-- /contact-form -->

        <div class="row contact-info">

            <div class="col-four tab-full">

                <div class="icon">
                    <i class="icon-pin"></i>
                </div>

                <h5>Where to find me</h5>

                <p>Dhaka, Bangladesh
                </p>

            </div>

            <div class="col-four tab-full collapse">

                <div class="icon">
                    <i class="icon-mail"></i>
                </div>

                <h5>Email Me At</h5>

                <p>grsagor08@gmail.com
                </p>

            </div>

            <div class="col-four tab-full">

                <div class="icon">
                    <i class="icon-phone"></i>
                </div>

                <h5>Call Me At</h5>

                <p>Phone: (+880) 1710 38 44 79
                </p>

            </div>

        </div> <!-- /contact-info -->

    </section> <!-- /contact -->


    <!-- footer
   ================================================== -->

    <footer>
        <div class="row">

            <div class="col-six tab-full pull-right social">

                <ul class="footer-social">
                    <li><a target="_blank" href="https://facebook.com/iamgrsagor"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a target="_blank" href="https://github.com/grsagor"><i class="fa-brands fa-github"></i></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/in/iamgrsagor/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a target="_blank" href="https://medium.com/@iamgrsagor"><i class="fa-brands fa-medium"></i></a></li>
                    <li><a target="_blank" href="https://dev.to/iamgrsagor"><i class="fa-brands fa-dev"></i></a></li>
                    <li><a target="_blank" href="https://x.com/iamgrsagor"><i class="fa-brands fa-x-twitter"></i></a></li>
                </ul>

            </div>

            <div class="col-eight tab-full">
                {{-- <div class="copyright">
		        	<span>© Copyright 2018 </span> 
		        	<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span> 
		        	<span>Distributed by <a href="https://themewagon.com/">themewagon</a></span>	         	
		         </div>		                  
	      	</div> --}}

                <div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i
                            class="fa fa-long-arrow-up"></i></a>
                </div>

            </div> <!-- /row -->
    </footer>

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- Java Script
   ================================================== -->
    <script src="{{ asset('assets/js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
