<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $technologies = [
            (object)['name' => 'ReactJS', 'skill' => '90'],
            (object)['name' => 'Next.js', 'skill' => '85'],
            (object)['name' => 'Laravel', 'skill' => '70'],
            (object)['name' => 'PHP', 'skill' => '75'],
            (object)['name' => 'Wordpress', 'skill' => '60'],
            (object)['name' => 'WooCommerce & WordPress Development', 'skill' => '55'],
            (object)['name' => 'JavaScript (Vanilla JS, ES6+)', 'skill' => '90'],
            (object)['name' => 'jQuery', 'skill' => '90'],
            (object)['name' => 'Bootstrap & Tailwind CSS', 'skill' => '90'],
            (object)['name' => 'HTML5', 'skill' => '90'],
            (object)['name' => 'CSS3', 'skill' => '90'],
            (object)['name' => 'Node.js', 'skill' => '70'],
        ];

        $services = [
            (object) [
                'title' => 'Next.js Development',
                'description' => 'I specialize in developing high-performance, SEO-friendly web applications using Next.js. By leveraging its powerful features like server-side rendering, static site generation, and API routes, I create fast, scalable, and dynamic websites that provide an exceptional user experience and improve search engine rankings.',
                'icon' => 'fa fa-cogs',
            ],
            (object) [
                'title' => 'WordPress Customization',
                'description' => 'I offer complete WordPress website customization, including theme design, plugin development, and full site functionality enhancements. Whether you need a custom WordPress theme or modifications to existing ones, I ensure your site is tailored to your business needs, with a focus on performance, usability, and SEO.',
                'icon' => 'fa fa-wordpress',
            ],
            (object) [
                'title' => 'JavaScript Solutions',
                'description' => 'I provide expert JavaScript development, optimizing site performance and adding interactive features. From debugging issues to writing custom JavaScript for dynamic functionalities, I ensure smooth and responsive behavior for web applications, enhancing user engagement with modern JavaScript techniques and libraries.',
                'icon' => 'fa fa-code',
            ],
            (object) [
                'title' => 'Responsive Web Design',
                'description' => 'I design websites that are fully responsive, ensuring they look and work flawlessly on all devices. By using a mobile-first approach, I create websites that automatically adjust to different screen sizes, offering users a consistent and engaging experience whether they’re on smartphones, tablets, or desktops.',
                'icon' => 'fa fa-mobile',
            ],
            (object) [
                'title' => 'API Integration',
                'description' => 'I integrate third-party APIs into websites to extend their functionality. From payment gateways to social media services, I ensure that external services are seamlessly incorporated into your web applications. My expertise in API integration allows your website to offer dynamic and real-time features, enhancing its value and usability.',
                'icon' => 'fa fa-plug',
            ],
        ];

        $data = [
            'technologies' => $technologies,
            'services' => $services,
        ];
        return view('front.pages.home.index', $data);
    }
}
