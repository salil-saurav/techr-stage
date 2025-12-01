<?php

/**
 * Asset Manager Class
 *
 * Handles registration and enqueuing of scripts and styles in WordPress
 */
class Theme_Asset_Manager
{

    private $css_assets = [];
    private $js_assets = [];
    private $version;
    private $css_path;
    private $js_path;

    public function __construct($version = null)
    {
        $this->version = $version ?? wp_get_theme()->get('Version');
        $this->register_hooks();
        $this->setup_assets();
    }

    /**
     * Register WordPress hooks
     */
    private function register_hooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    /**
     * Set up default assets
     */
    private function setup_assets()
    {
        // CSS Assets
        $this->add_css('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
        $this->add_css('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
        $this->add_css('slick_theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css');
        $this->add_css('font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css');
        $this->add_css('main_style', get_stylesheet_directory_uri() . '/assets/global/css/style.css');
        $this->add_css('global_media', get_stylesheet_directory_uri() . '/assets/global/css/media.css');

        // JavaScript Assets
        $this->add_js('jquery_js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
        $this->add_js('bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], false);
        $this->add_js('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js');
        // $this->add_js('dom_js', get_stylesheet_directory_uri() . '/assets/js/DOM.js');
        $this->add_js('main_js', get_stylesheet_directory_uri() . '/assets/global/scripts/custom.js');
    }

    public function add_css($handle, $url, $dependencies = [], $media = 'all')
    {
        $this->css_assets[$handle] = [
            'url' => $url,
            'dependencies' => $dependencies,
            'media' => $media
        ];

        return $this;
    }

    public function add_js($handle, $url, $dependencies = [], $in_footer = true)
    {
        $this->js_assets[$handle] = [
            'url' => $url,
            'dependencies' => $dependencies,
            'in_footer' => $in_footer
        ];

        return $this;
    }

    public function enqueue_assets()
    {
        $this->enqueue_styles();
        $this->enqueue_scripts();
    }

    /**
     * Enqueue CSS files
     */
    private function enqueue_styles()
    {
        foreach ($this->css_assets as $handle => $asset) {
            wp_register_style(
                $handle,
                $asset['url'],
                $asset['dependencies'],
                $this->version,
                $asset['media']
            );
            wp_enqueue_style($handle);
        }
    }

    /**
     * Enqueue JavaScript files
     */
    private function enqueue_scripts()
    {
        foreach ($this->js_assets as $handle => $asset) {
            wp_register_script(
                $handle,
                $asset['url'],
                $asset['dependencies'],
                $this->version,
                $asset['in_footer']
            );
            wp_enqueue_script($handle);
        }
    }
}

// Initialize the Asset Manager
new Theme_Asset_Manager();
