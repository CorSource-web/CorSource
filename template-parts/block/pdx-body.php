<?php
/**
 * Block Name: PDX Body
 *
 * Debug notes:
 * - This prints HTML comments you can see in View Source.
 * - Search for: PDX_BODY_DEBUG
 */

// Unique ID for anchor / styling
$id = 'pdx-body-' . (!empty($block['id']) ? $block['id'] : uniqid());

// Preview image in inserter
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
 *
 * Returns: [id:int, url:string, alt:string]
 */
function pdx_norm_image($img) : array {
  $id  = 0;
  $url = '';
  $alt = '';

  if (is_array($img)) {
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

  if ($id && $url === '') {
    $url = wp_get_attachment_url($id) ?: '';
  }

  return [$id, $url, $alt];
}

/**
 * Debug helper (prints a single-line HTML comment)
 */
function pdx_dbg($label, $value) {
  $out = is_string($value) ? $value : print_r($value, true);
  $out = preg_replace('/\s+/', ' ', $out); // compress whitespace
  $out = substr($out, 0, 800);             // keep it short-ish
  echo "\n<!-- PDX_BODY_DEBUG {$label}: " . esc_html($out) . " -->\n";
}

// --------------------
// Header (support both Header/header)
// --------------------
$header = get_field('Header');
if (!is_array($header)) $header = get_field('header');
if (!is_array($header)) $header = [];

$heading    = trim((string)($header['heading'] ?? ''));
$subheading = $header['subheading'] ?? '';
$subheading_str = is_string($subheading) ? trim($subheading) : '';

// --------------------
// Content group
// --------------------
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

// Desktop logos image (intended: inside content; fallback: top-level)
$logos_image = $content['logos'] ?? get_field('logos');
[$logos_id, $logos_url, $logos_alt] = pdx_norm_image($logos_image);

// Mobile logos image — drift-safe lookups
// IMPORTANT: if this is empty, PHP will NOT render a mobile tag unless we fallback.
$logos_mobile_raw =
  ($content['logos_mobile'] ?? null)
  ?? get_field('logos_mobile')
  ?? get_field('content_logos_mobile');

// As a last resort, try get_sub_field (usually unnecessary in block context, but harmless)
if (!$logos_mobile_raw && function_exists('get_sub_field')) {
  $maybe = get_sub_field('logos_mobile');
  if ($maybe) $logos_mobile_raw = $maybe;
}

[$logos_mobile_id, $logos_mobile_url, $logos_mobile_alt] = pdx_norm_image($logos_mobile_raw);

$has_mobile_logos = ($logos_mobile_id > 0 || $logos_mobile_url !== '');

// If mobile is missing, fallback to desktop so you never render "nothing" on mobile.
$mobile_fallback_id  = $logos_mobile_id ?: $logos_id;
$mobile_fallback_url = $logos_mobile_url ?: $logos_url;
$mobile_fallback_alt = $logos_mobile_alt ?: $logos_alt;

$mobile_will_render = ($mobile_fallback_id > 0 || $mobile_fallback_url !== '');

// --------------------
// Row Text group
// --------------------
$row_text = get_field('row_text');
if (!is_array($row_text)) $row_text = [];

$row_heading = trim((string)($row_text['row_heading'] ?? ''));
$row_sub     = $row_text['row_subheading'] ?? '';
$row_sub_str = is_string($row_sub) ? trim($row_sub) : '';

// True/False can come back as "1"/"0", 1/0, true/false depending on context.
$raw_toggle  = $row_text['enable_row'] ?? ($row_text['enable_row_'] ?? null);
$row_enabled = ((string)$raw_toggle === '1' || $raw_toggle === true || $raw_toggle === 1);

?>

<section id="<?php echo esc_attr($id); ?>" class="pdx-body">
  <?php
    // ===== DEBUG START =====
    pdx_dbg('id', $id);
    pdx_dbg('content_keys', array_keys($content));
    pdx_dbg('logos_desktop_id', $logos_id);
    pdx_dbg('logos_desktop_url', $logos_url);
    pdx_dbg('logos_mobile_raw', $logos_mobile_raw);
    pdx_dbg('logos_mobile_id', $logos_mobile_id);
    pdx_dbg('logos_mobile_url', $logos_mobile_url);
    pdx_dbg('has_mobile_logos', $has_mobile_logos ? 'true' : 'false');
    pdx_dbg('mobile_fallback_id', $mobile_fallback_id);
    pdx_dbg('mobile_fallback_url', $mobile_fallback_url);
    pdx_dbg('mobile_will_render', $mobile_will_render ? 'true' : 'false');
    // ===== DEBUG END =====
  ?>

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

      <?php if ($row_enabled && ($row_heading !== '' || $row_sub_str !== '')) : ?>
        <div class="pdx-body__row-text">
          <?php if ($row_heading !== '') : ?>
            <h3 class="pdx-body__row-heading"><?php echo esc_html($row_heading); ?></h3>
          <?php endif; ?>

          <?php if ($row_sub_str !== '') : ?>
            <div class="pdx-body__row-subheading">
              <?php echo wp_kses_post($row_sub_str); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($logos_id || $logos_url) : ?>
        <!-- PDX_BODY_LOGOS_SWAP_FINAL -->
        <div class="pdx-body__logos" aria-label="Client logos">

          <?php
          // DESKTOP TAG (always render desktop if we have it)
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
          // MOBILE TAG (always render something on mobile; falls back to desktop if mobile not set)
          if ($mobile_will_render) :
            if ($mobile_fallback_id) {
              echo wp_get_attachment_image(
                $mobile_fallback_id,
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
                src="<?php echo esc_url($mobile_fallback_url); ?>"
                alt="<?php echo esc_attr($mobile_fallback_alt); ?>"
                loading="lazy"
                decoding="async"
              />
            <?php }
          endif; ?>

        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
