<?php
/**
 * Block Name: PDX Two Column
 *
 * LEFT:
 * - top_section (group)
 *   - top_title (text)
 *   - top_bullets (repeater)
 *     - bold_text (text)
 *     - bullet_text (text)
 *
 * - bottom_section (group)
 *   - bottom_title (text)
 *   - bottom_bullets (repeater)
 *     - title (text)     // bold lead-in
 *     - subtitle (text)  // normal text
 *
 * RIGHT:
 * - right_image (image array | id | url)
 */

$id = 'pdx-two-column-' . (!empty($block['id']) ? $block['id'] : uniqid());

if (!empty($block['data']['preview_image'])) : ?>
  <img
    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/pdx-two-column.png'); ?>"
    alt=""
    style="width:100%;height:auto;display:block;"
  />
<?php return; endif;

// ---- Fields ----
$top_section    = get_field('top_section') ?: [];
$bottom_section = get_field('bottom_section') ?: [];

$top_title   = $top_section['top_title'] ?? '';
$top_bullets = $top_section['top_bullets'] ?? [];

$bottom_title   = $bottom_section['bottom_title'] ?? '';
$bottom_bullets = $bottom_section['bottom_bullets'] ?? [];

// Right image
$right_image = get_field('right_image');

$image_id  = 0;
$image_url = '';
$image_alt = '';

if (is_array($right_image)) {
  $image_id  = !empty($right_image['ID'])  ? (int) $right_image['ID']  : 0;
  $image_url = !empty($right_image['url']) ? $right_image['url']       : '';
  $image_alt = !empty($right_image['alt']) ? $right_image['alt']       : '';
} elseif (is_numeric($right_image)) {
  $image_id  = (int) $right_image;
  $image_url = wp_get_attachment_url($image_id) ?: '';
  $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: '';
} elseif (is_string($right_image)) {
  $image_url = $right_image;
}
?>

<section id="<?php echo esc_attr($id); ?>" class="pdx-two-column">
  <div class="pdx-two-column__container">

    <!-- LEFT -->
    <div class="pdx-two-column__left">

      <!-- TOP SECTION -->
      <div class="pdx-two-column__section pdx-two-column__section--top">
        <?php if (!empty($top_title)) : ?>
          <h3 class="pdx-two-column__title"><?php echo esc_html($top_title); ?></h3>
        <?php endif; ?>

        <?php if (!empty($top_bullets)) : ?>
          <ul class="pdx-two-column__bullets pdx-two-column__bullets--top">
            <?php foreach ($top_bullets as $b) :
              $bold = trim((string)($b['bold_text'] ?? ''));
              $text = trim((string)($b['bullet_text'] ?? ''));
              if ($bold === '' && $text === '') continue;
            ?>
              <li class="pdx-two-column__bullet">
                <p class="pdx-two-column__bullet-line">
                  <?php if ($bold !== '') : ?>
                    <strong><?php echo esc_html($bold); ?></strong>
                  <?php endif; ?>
                  <?php if ($text !== '') : ?>
                    <span><?php echo esc_html($text); ?></span>
                  <?php endif; ?>
                </p>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

      <!-- BOTTOM SECTION -->
      <div class="pdx-two-column__section pdx-two-column__section--bottom">
        <?php if (!empty($bottom_title)) : ?>
          <h3 class="pdx-two-column__title"><?php echo esc_html($bottom_title); ?></h3>
        <?php endif; ?>

        <?php if (!empty($bottom_bullets)) : ?>
          <ul class="pdx-two-column__bullets pdx-two-column__bullets--bottom">
            <?php foreach ($bottom_bullets as $b) :
              // IMPORTANT: match your ACF subfield names exactly
              $headline = trim((string)($b['title'] ?? ''));      // bold lead-in
              $desc     = trim((string)($b['subtitle'] ?? ''));   // normal text

              if ($headline === '' && $desc === '') continue;
            ?>
              <li class="pdx-two-column__bullet">
                <p class="pdx-two-column__bullet-line">
                  <?php if ($headline !== '') : ?>
                    <strong><?php echo esc_html($headline); ?></strong>
                  <?php endif; ?>
                  <?php if ($desc !== '') : ?>
                    <span><?php echo esc_html($desc); ?></span>
                  <?php endif; ?>
                </p>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>

    </div>

    <!-- RIGHT -->
    <div class="pdx-two-column__right">
      <?php
      if ($image_id) {
        echo wp_get_attachment_image(
          $image_id,
          'full',
          false,
          [
            'class' => 'pdx-two-column__image',
            'loading' => 'lazy',
            'decoding' => 'async',
          ]
        );
      } elseif (!empty($image_url)) { ?>
        <img
          class="pdx-two-column__image"
          src="<?php echo esc_url($image_url); ?>"
          alt="<?php echo esc_attr($image_alt); ?>"
          loading="lazy"
          decoding="async"
        />
      <?php } ?>
    </div>

  </div>
</section>
