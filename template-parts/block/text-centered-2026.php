<?php

/**
 * Block Name: 2026 Text Centered
 */

$id = 'text-centered-2026-' . $block['id'];

$content = get_field('content');
?>

<?php if ($content) : ?>
    <section
        id="<?php echo esc_attr($id); ?>"
        class="text-centered-2026"
    >
        <div class="container">
            <div class="text-centered-2026-content">
                <p><?php echo esc_html($content); ?></p>
            </div>
        </div>
    </section>
<?php endif; ?>