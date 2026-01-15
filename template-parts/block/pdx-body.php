<?php
/**
 * Block Name: PDX Body
 */

$id = 'pdx-body-' . (!empty($block['id']) ? $block['id'] : uniqid());

if (!empty($block['data']['preview_image'])) : ?>
  <img
    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/pdx-body.png'); ?>"
    alt=""
    style="width:100%;height:auto;display:block;"
  />
<?php return; endif;

/**
 * Normalize an ACF "Image" field that might be:
 * - array (with keys ID/id, url, alt)
 * - numeric (attachment ID)
 * - string (URL)
 */
function pdx_norm_image($img) : array {
  $id  = 0;
  $url = '';
  $alt = '';

  if (is_array($img)) {
    // ACF can return ID or id depending on context.
    $raw_id = $img['ID'] ?? ($img['id'] ?? 0);
    $id  = !empty($raw_id) ? (int) $raw_id : 0;
    $url = !empty($img['url']) ? (string) $img['url'] : '';
    $alt = !empty($img['alt']) ? (string) $img['alt'] : '';
  } elseif (is_numeric($img)) {
    $id  = (int) $img;
    $url = wp_get_attachment_url($id) ?: '';
    $alt = get_post_meta($id, '_wp_attachment_image_alt', true) ?: '';
  } elseif (is_string($img)) {
    $url = trim($img);
  }

  // If we got an ID but not a URL (rare), backfill the URL.
  if ($id && $url === '') {
    $url = wp_get_attachment_url($id) ?: '';
  }

  return [$id, $url, $alt];
}

// --- Header (support both Header/header) ---
$header = get_field('Header');
if (!is_array($header)) $header = get_field('header');
if (!is_array($header)) $header = [];

$heading    = trim((string)($header['heading'] ?? ''));
$subheading = $header['subheading'] ?? '';
$subheading_str = is_string($subheading) ? trim($subheading) : '';

// --- Content group ---
$content = get_field('content');
if (!is_array($content)) $content = [];

// Left / Right groups
$left_col  = is_array($content['left_column'] ?? null) ? $content['left_column'] : [];
$right_col = is_array($content['right_column'] ?? null) ? $content['right_column'] : [];

// Left blurbs repeater
$left_blurbs = $left_col['left_blurbs'] ?? [];
if (!is_array($left_blurbs)) $left_blurbs = [];

// Right image normalize
$right_image = $right_col['right_image'] ?? null;
[$right_image_id, $right_image_url, $right_image_alt] = pdx_norm_image($right_image);

// Logos image (desktop): inside content, fallback to top-level just in case
$logos_image = $content['logos'] ?? get_field('logos');
[$logos_id, $logos_url, $logos_alt] = pdx_norm_image($logos_image);

// Logos image (mobile - OPTIONAL)
$logos_mobile_image = $content['logos_mobile'] ?? get_field('logos_mobile');
[$logos_mobile_id, $logos_mobile_url, $logos_mobile_alt] = pdx_norm_image($logos_mobile_image);

$has_mobile_logos = ($logos_mobile_id > 0 || $logos_mobile_url !== '');

// --- Row Text group (matches your ACF names) ---
$row_text = get_field('row_text');
if (!is_array($row_text)) $row_text = [];

$row_heading = trim((string)($row_text['row_heading'] ?? ''));
$row_sub     = trim((string)($row_text['row_subheading'] ?? ''));

// True/False can come back as "1"/"0", 1/0, true/false depending on context.
$raw_toggle  = $row_text['enable_row'] ?? ($row_text['enable_row_'] ?? null);
$row_enabled = ((string)$raw_toggle === '1' || $raw_toggle === true || $raw_toggle === 1);
?>

<section id="<?php echo esc_attr($id); ?>" class="pdx-body">
  <div class="pdx-body__outer">
    <div class="pdx-body__card">

      <?php if ($heading !== '' || $subheading_str !== '') : ?>
        <div class="pdx-body__header">

          <?php if ($heading !== '') : ?>
            <div class="pdx-body__title-wrap">
              <h2 class="pdx-body__heading"><?php echo esc_html($heading); ?></h2>
            </div>
          <?php endif; ?>

          <?php if ($subheading_str !== '') : ?>
            <div class="pdx-body__subheading">
              <?php echo wp_kses_post($subheading_str); ?>
            </div>
          <?php endif; ?>

        </div>
      <?php endif; ?>

      <div class="pdx-body__content">
        <div class="pdx-body__left">
          <?php if (!empty($left_blurbs)) : ?>
            <div class="pdx-body__blurbs">
              <?php foreach ($left_blurbs as $row) :
                $t = trim((string)($row['title'] ?? ''));
                $b = $row['body'] ?? '';
                $b_str = is_string($b) ? trim($b) : '';
                if ($t === '' && $b_str === '') continue;
              ?>
                <div class="pdx-body__blurb">
                  <?php if ($t !== '') : ?>
                    <h3 class="pdx-body__left-title"><?php echo esc_html($t); ?></h3>
                  <?php endif; ?>

                  <?php if ($b_str !== '') : ?>
                    <div class="pdx-body__left-body">
                      <?php echo wp_kses_post($b_str); ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="pdx-body__right">
          <?php
          if ($right_image_id) {
            echo wp_get_attachment_image(
              $right_image_id,
              'large',
              false,
              [
                'class' => 'pdx-body__image',
                'loading' => 'lazy',
                'decoding' => 'async',
              ]
            );
          } elseif ($right_image_url !== '') { ?>
            <img
              class="pdx-body__image"
              src="<?php echo esc_url($right_image_url); ?>"
              alt="<?php echo esc_attr($right_image_alt); ?>"
              loading="lazy"
              decoding="async"
            />
          <?php } ?>
        </div>
      </div>

      <?php if ($row_enabled && ($row_heading !== '' || $row_sub !== '')) : ?>
        <div class="pdx-body__row-text">
          <?php if ($row_heading !== '') : ?>
            <h3 class="pdx-body__row-heading"><?php echo esc_html($row_heading); ?></h3>
          <?php endif; ?>

          <?php if ($row_sub !== '') : ?>
            <div class="pdx-body__row-subheading">
              <?php echo wp_kses_post($row_sub); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($logos_id || $logos_url) : ?>
        <!-- PDX_BODY_LOGOS_SWAP_V4 -->
        <div class="pdx-body__logos" aria-label="Client logos">

          <?php if ($has_mobile_logos) : ?>

            <?php
            // Desktop (hide on mobile via CSS)
            if ($logos_id) {
              echo wp_get_attachment_image(
                $logos_id,
                'full',
                false,
                [
                  'class' => 'pdx-body__logos-img pdx-body__logos-img--desktop',
                  'loading' => 'lazy',
                  'decoding' => 'async',
                ]
              );
            } else { ?>
              <img
                class="pdx-body__logos-img pdx-body__logos-img--desktop"
                src="<?php echo esc_url($logos_url); ?>"
                alt="<?php echo esc_attr($logos_alt); ?>"
                loading="lazy"
                decoding="async"
              />
            <?php } ?>

            <?php
            // Mobile (show on mobile via CSS)
            if ($logos_mobile_id) {
              echo wp_get_attachment_image(
                $logos_mobile_id,
                'full',
                false,
                [
                  'class' => 'pdx-body__logos-img pdx-body__logos-img--mobile',
                  'loading' => 'lazy',
                  'decoding' => 'async',
                ]
              );
            } else { ?>
              <img
                class="pdx-body__logos-img pdx-body__logos-img--mobile"
                src="<?php echo esc_url($logos_mobile_url); ?>"
                alt="<?php echo esc_attr($logos_mobile_alt); ?>"
                loading="lazy"
                decoding="async"
              />
            <?php } ?>

          <?php else : ?>

            <?php
            // Original single-image render (unchanged)
            if ($logos_id) {
              echo wp_get_attachment_image(
                $logos_id,
                'full',
                false,
                [
                  'class' => 'pdx-body__logos-img',
                  'loading' => 'lazy',
                  'decoding' => 'async',
                ]
              );
            } else { ?>
              <img
                class="pdx-body__logos-img"
                src="<?php echo esc_url($logos_url); ?>"
                alt="<?php echo esc_attr($logos_alt); ?>"
                loading="lazy"
                decoding="async"
              />
            <?php } ?>

          <?php endif; ?>

        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
