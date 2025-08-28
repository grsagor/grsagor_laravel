<section id="contact" class="contact-section py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Contact Me</h2>
            <p>If you have any questions or opportunities, feel free to reach out.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="alert-box"></div>
                <form id="contactForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                    </div>

                    <!-- Captcha -->
                    <div class="mb-3">
                        <label for="captcha" class="form-label" id="captchaQuestion">Loading...</label>
                        <input type="text" name="captcha" id="captcha" class="form-control"
                            placeholder="Your Answer" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            const $captchaQuestion = $("#captchaQuestion");
            const $form = $("#contactForm");
            const $alertBox = $("#alert-box");

            // Fetch captcha on load
            function loadCaptcha() {
                // $.get("{{ route('front.generate.captcha') }}", function(data) {
                //     $captchaQuestion.text("Security Question: " + data.question);
                // });
                $.ajax({
                    url: "{{ route('front.generate.captcha') }}",
                    method: "GET",
                    success: function(data) {
                        $captchaQuestion.text("Security Question: " + data.question);
                    },
                    error: function() {
                        $alertBox.html(
                            `<div class="alert alert-danger">Something went wrong. Try again.</div>`
                            );
                        loadCaptcha();
                    }
                })
            }
            loadCaptcha();

            $form.on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('front.contact.send') }}",
                    method: "POST",
                    data: $form.serialize(),
                    headers: {
                        "X-CSRF-TOKEN": $("input[name=_token]").val()
                    },
                    success: function(data) {
                        $alertBox.html(`
                    <div class="alert alert-${data.status === 'success' ? 'success' : 'danger'}">
                        ${data.message}
                    </div>
                `);

                        if (data.status === "success") {
                            $form[0].reset();
                        }

                        loadCaptcha(); // refresh captcha after response
                    },
                    error: function() {
                        $alertBox.html(
                            `<div class="alert alert-danger">Something went wrong. Try again.</div>`
                            );
                        loadCaptcha();
                    }
                });
            });
        });
    </script>
@endpush
