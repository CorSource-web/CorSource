<?php
/**
 * Block Name: PDX Body
 */

$id = 'pdx-body-' . (!empty($block['id']) ? $block['id'] : uniqid());

if (!empty($block['data']['preview_image'])) :
?>
  <img
    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/block-previews/pdx-body.png'); ?>"
    alt=""
    style="width:100%;height:auto;display:block;"
  />
<?php
  return;
endif;

/**
 * Normalize ACF Image field (array | ID | URL)
 */
function pdx_norm_image($img): array {
  $id = 0;
  $url = '';
  $alt = '';

  if (is_array($img)) {
    $id  = (int)($img['ID'] ?? $img['id'] ?? 0);
    $url = (string)($img['url'] ?? '');
    $alt = (string)($img['alt'] ?? '');
  } elseif (is_numeric($img)) {
    $id  = (int)$img;
    $url = wp_get_attachment_url($id) ?: '';
    $alt = get_post_meta($id, '_wp_attachment_image_alt', true) ?: '';
  } elseif (is_string($img)) {
    $url = trim($img);
  }

  if ($id && !$url) {
    $url = wp_get_attachment_url($id) ?: '';
  }

  return [$id, $url, $alt];
}

/* -----------------------------
   Header
----------------------------- */
$header = get_field('header') ?: [];
$heading    = trim((string)($header['heading'] ?? ''));
$subheading = (string)($header['subheading'] ?? '');

/* -----------------------------
   Content
----------------------------- */
$content = get_field('content') ?: [];

$left_col  = $content['left_column']  ?? [];
$right_col = $content['right_column'] ?? [];

$left_blurbs = $left_col['left_blurbs'] ?? [];

[$right_image_id, $right_image_url, $right_image_alt] =
  pdx_norm_image($right_col['right_image'] ?? null);

/* -----------------------------
   Logos (THIS IS THE FIX)
----------------------------- */
[$logos_id, $logos_url, $logos_alt] =
  pdx_norm_image($content['logos'] ?? null);

[$logos_mobile_id, $logos_mobile_url, $logos_mobile_alt] =
  pdx_norm_image($content['logos_mobile'] ?? null);

/* -----------------------------
   Row Text
----------------------------- */
$row_text = get_field('row_text') ?: [];

$row_heading = trim((string)($row_text['row_heading'] ?? ''));
$row_sub     = (string)($row_text['row_subheading'] ?? '');

$raw_toggle = $row_text['enable_row'] ?? null;
$row_enabled = ($raw_toggle === true || $raw_toggle === 1 || $raw_toggle === '1');
?>

<section id="<?php echo esc_attr($id); ?>" class="pdx-body">
  <div class="pdx-body__outer">
    <div class="pdx-body__card">

      <?php if ($heading || $subheading) : ?>
        <div class="pdx-body__header">
          <?php if ($heading) : ?>
            <div class="pdx-body__title-wrap">
              <h2 class="pdx-body__heading"><?php echo esc_html($heading); ?></h2>
            </div>
          <?php endif; ?>

          <?php if ($subheading) : ?>
            <div class="pdx-body__subheading">
              <?php echo wp_kses_post($subheading); ?>
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
                $b = (string)($row['body'] ?? '');
                if (!$t && !$b) continue;
              ?>
                <div class="pdx-body__blurb">
                  <?php if ($t) : ?>
                    <h3 class="pdx-body__left-title"><?php echo esc_html($t); ?></h3>
                  <?php endif; ?>
                  <?php if ($b) : ?>
                    <div class="pdx-body__left-body">
                      <?php echo wp_kses_post($b); ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="pdx-body__right">
          <?php if ($right_image_id) :
            echo wp_get_attachment_image(
              $right_image_id,
              'large',
              false,
              ['class' => 'pdx-body__image', 'loading' => 'lazy']
            );
          elseif ($right_image_url) : ?>
            <img
              class="pdx-body__image"
              src="<?php echo esc_url($right_image_url); ?>"
              alt="<?php echo esc_attr($right_image_alt); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </div>
      </div>

      <?php if ($row_enabled && ($row_heading || $row_sub)) : ?>
        <div class="pdx-body__row-text">
          <?php if ($row_heading) : ?>
            <h3 class="pdx-body__row-heading"><?php echo esc_html($row_heading); ?></h3>
          <?php endif; ?>
          <?php if ($row_sub) : ?>
            <div class="pdx-body__row-subheading">
              <?php echo wp_kses_post($row_sub); ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($logos_id || $logos_url) : ?>
        <!-- PDX_BODY_LOGOS_SWAP_FINAL -->
        <div class="pdx-body__logos" aria-label="Client logos">

          <?php
          // Desktop logos (always output)
          if ($logos_id) {
            echo wp_get_attachment_image(
              $logos_id,
              'full',
              false,
              ['class' => 'pdx-body__logos-img pdx-body__logos-img--desktop', 'loading' => 'lazy']
            );
          } else {
          ?>
            <img
              class="pdx-body__logos-img pdx-body__logos-img--desktop"
              src="<?php echo esc_url($logos_url); ?>"
              alt="<?php echo esc_attr($logos_alt); ?>"
              loading="lazy"
            />
          <?php } ?>

          <?php if ($logos_mobile_id || $logos_mobile_url) : ?>
            <?php
            if ($logos_mobile_id) {
              echo wp_get_attachment_image(
                $logos_mobile_id,
                'full',
                false,
                ['class' => 'pdx-body__logos-img pdx-body__logos-img--mobile', 'loading' => 'lazy']
              );
            } else {
            ?>
              <img
                class="pdx-body__logos-img pdx-body__logos-img--mobile"
                src="<?php echo esc_url($logos_mobile_url); ?>"
                alt="<?php echo esc_attr($logos_mobile_alt); ?>"
                loading="lazy"
              />
            <?php } ?>
          <?php endif; ?>

        </div>
      <?php endif; ?>

    </div>
  </div>
</section>
