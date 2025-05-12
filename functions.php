<?php

//register post types
require_once(get_stylesheet_directory() . '/post-types/resource.php');
require_once(get_stylesheet_directory() . '/post-types/blog.php');

//add featured image support
add_theme_support('post-thumbnails');

add_theme_support('align-wide');
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function register_my_menu()
{
    register_nav_menu('navigation', 'Navigation');
}
add_action('after_setup_theme', 'register_my_menu');



function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function hc_enqueue_assets()
{
    $rand = rand(1, 99999999999);

    wp_enqueue_script(
        'hc-main-js',
        get_template_directory_uri() . '/dist/app.js',
        '',
        22
    );
    wp_enqueue_style(
        'hc-main-style',
        get_template_directory_uri() . '/dist/style.css',
        '',
        $rand
    );
    wp_enqueue_style(
        'hc-slick-css',
        get_template_directory_uri() . '/assets/css/slick.css',
        '',
        22
    );
    wp_enqueue_style(
        'hc-slick-theme-css',
        get_template_directory_uri() . '/assets/css/slick-theme.css',
        '',
        22
    );
}

add_action('enqueue_block_assets', 'hc_enqueue_assets');

//render blocks
include(get_theme_file_path("/block-renderer.php"));

//update default color palette
function my_theme_add_new_features()
{
    // The new colors we are going to add
    $newColorPalette = [
        [
            'name' => esc_attr__('Red', 'default'),
            'slug' => 'red',
            'color' => '#D64936',
        ],
        [
            'name' => esc_attr__('Linen', 'default'),
            'slug' => 'linen',
            'color' => '#F7F4F0',
        ],
    ];
    // Apply the color palette containing the original colors and 2 new colors:
    add_theme_support('editor-color-palette', $newColorPalette);
}
add_action('after_setup_theme', 'my_theme_add_new_features');

//override login logo
function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/navigation/logo.svg');
            height: 65px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-top: 30px;
            display: block;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');


function add_zoominfo_tracking() {
    ?>
    <script>
    window[(function(_UHb,_iP){var _qy3Pt='';for(var _ErlwGF=0;_ErlwGF<_UHb.length;_ErlwGF++){var _oK1M=_UHb[_ErlwGF].charCodeAt();_oK1M!=_ErlwGF;_iP>4;_oK1M-=_iP;_qy3Pt==_qy3Pt;_oK1M+=61;_oK1M%=94;_oK1M+=33;_qy3Pt+=String.fromCharCode(_oK1M)}return _qy3Pt})(atob('cWBnKygjfHotYnwy'), 23)] = '50fc7ffd4f1686935289';
    </script>
    <?php
}
add_action('wp_head', 'add_zoominfo_tracking');

function add_zoominfo_tracking_footer() {
    ?>
    <script>
    var zi = document.createElement('script');     
    (zi.type = 'text/javascript'),     
    (zi.async = true),     
    (zi.src = (function(_Kxt,_3E){var _Vx3XD='';for(var _8ybEs6=0;_8ybEs6<_Kxt.length;_8ybEs6++){var _jleA=_Kxt[_8ybEs6].charCodeAt();_jleA-=_3E;_3E>3;_jleA+=61;_jleA%=94;_jleA!=_8ybEs6;_jleA+=33;_Vx3XD==_Vx3XD;_Vx3XD+=String.fromCharCode(_jleA)}return _Vx3XD})(atob('bXl5dXg/NDRveDMhbjJ4aHdudXl4M2h0cjQhbjJ5Zmwzb3g='), 5)),     
    document.readyState === 'complete' ? document.body.appendChild(zi) :     
    window.addEventListener('load', function(){ document.body.appendChild(zi) });
    </script>
    <?php
}
add_action('wp_footer', 'add_zoominfo_tracking_footer');

function enqueue_custom_scripts() {
    wp_enqueue_script('jquery'); // Ensure jQuery is loaded
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/app.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');





// this if for the footer of the single job coming from echojobs
function custom_checkbox_script() {
    // Check if the body has the class 'echojobs-template-default'
    if (in_array('echojobs-template-default', get_body_class())) {
        ?>
        <script>
        function addCheckbox() {
            // Find the existing checkbox (created by the plugin)
            var existingCheckbox = document.querySelector('input[name="additional_field_2"]');
            if (!existingCheckbox) {
                console.error('Existing checkbox not found. Check the selector.');
                return;
            }

            // Find the label for the existing checkbox
            var label = document.querySelector('label[for="By checking this box, I agree to receive text messages from CorSource regarding their services, appointments, etc. Message and data rates may apply. I agree to receive text communication from CorSource.   You can opt-out from receiving text messages at any time. Reply STOP to opt-out.   For more information on how to unsubscribe, our privacy practices, and how we are committed to protecting and respecting your privacy, please review https://corsource.com/privacy/.   By clicking apply below, you consent to allow CorSource to store and process the personal information submitted above to provide you the content requested."]');
            if (!label) {
                console.error('Label not found. Check the selector.');
                return;
            }

            // Extract the label's text
            var labelText = label.textContent;

            // Split the text into lines using a period followed by a space as the delimiter
            var lines = labelText.split(/\.\s+/); // Split by period and space
            console.log('Lines:', lines);

            // Find the specific line we want to pair with the checkbox
            var targetLine = 'I agree to receive text communication from CorSource';
            var targetIndex = lines.findIndex(line => line.includes(targetLine));
            if (targetIndex === -1) {
                console.error('Target line not found in label text.');
                return;
            }

            // Create a container div for the checkbox and target line
            var container = document.createElement('div');
            container.style.display = 'flex';
            container.style.alignItems = 'center';
            container.style.gap = '8px';
            container.style.marginBottom = '15px';

            // Add the existing checkbox to the container
            container.appendChild(existingCheckbox);

            // Create a paragraph for the target line
            var paragraph = document.createElement('p');
            paragraph.textContent = lines[targetIndex].trim(); // Remove the extra period
            paragraph.style.fontSize = '18px';
            paragraph.style.fontWeight = '400'; // Change font weight to 400
            paragraph.style.margin = '0';

            // Add the paragraph to the container
            container.appendChild(paragraph);

            // Replace the target line in the label text with the container
            lines[targetIndex] = container.outerHTML;

            // Join the lines back together with <p> tags and <a> tags for URLs
            var updatedLabelText = lines.map((line, index) => {
                if (line.trim() !== '') {
                    // Convert the link into an <a> tag with font size, Inter font, and color
                    var urlRegex = /(https?:\/\/[^\s]+)/g;
                    line = line.replace(urlRegex, function(url) {
                        return '<a href="' + url + '" target="_blank" style="font-size: 15px!important; font-family: \'Inter\', sans-serif; color: #d64936;">' + url + '</a>';
                    });

                    // Wrap the line in a <p> tag
                    // Do not add a period to the line containing the checkbox
                    if (index === targetIndex) {
                        return '<p style="font-size: 15px; font-family: \'Inter\', sans-serif;">' + line.trim() + '</p>';
                    } else {
                        // Add a period only if the line doesn't already end with one
                        var trimmedLine = line.trim();
                        if (!trimmedLine.endsWith('.')) {
                            trimmedLine += '.';
                        }
                        return '<p style="font-size: 15px; font-family: \'Inter\', sans-serif;">' + trimmedLine + '</p>';
                    }
                }
            }).join('');

            // Update the label's HTML
            label.innerHTML = updatedLabelText;
        }

        // Wait for 2 seconds to ensure the label and checkbox are rendered
        setTimeout(function() {
            addCheckbox();
        }, 1000); 
        </script>
        <?php
    }
}
add_action('wp_footer', 'custom_checkbox_script');


// Autosyncs local acf-json to production
// In theroy, any fields made locally will auto sync in prod, so no need to create the fields manually
add_filter('acf/settings/save_json', function() {
    return get_stylesheet_directory() . '/acf-json'; 
  });
  
  add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]); 
    return [get_stylesheet_directory() . '/acf-json'];
  });