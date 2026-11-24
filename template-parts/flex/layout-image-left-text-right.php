<?php
/**
 * Bild links – Text rechts
 * Varianten: About und What's on Today
 */
$img_id   = get_sub_field('image');
$headline = get_sub_field('headline');
$body     = get_sub_field('text');
$subheadline = get_sub_field('subheadline');
$secondary_headline = get_sub_field('secondary_headline');
$secondary_text = get_sub_field('secondary_text');
$variant  = get_sub_field('layout_variant') ?: 'about';
$cta      = get_sub_field('cta');
$cta_url  = is_array($cta) ? ($cta['url'] ?? '') : '';
$cta_label = is_array($cta) ? ($cta['title'] ?? '') : '';
$cta_target = is_array($cta) ? ($cta['target'] ?: '_self') : '_self';
?>
<div class="about-section <?php echo esc_attr($variant === 'whats_on_today' ? 'about-section--whats-on' : ''); ?>">
  <?php if ($variant === 'whats_on_today'): ?>
  <div class="about-section__content">
    <?php if ($headline): ?>
      <h2 class="about-section__title"><?php echo esc_html($headline); ?></h2>
    <?php endif; ?>

    <div class="about-section__events">
      <?php if ($subheadline || $body): ?>
        <div class="about-section__event">
          <?php if ($subheadline): ?>
            <h3 class="about-section__event-title"><?php echo esc_html($subheadline); ?></h3>
          <?php endif; ?>
          <?php if ($body): ?>
            <div class="about-section__text rte"><?php echo wp_kses_post($body); ?></div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if ($secondary_headline || $secondary_text): ?>
        <div class="about-section__event">
          <?php if ($secondary_headline): ?>
            <h3 class="about-section__event-title"><?php echo esc_html($secondary_headline); ?></h3>
          <?php endif; ?>
          <?php if ($secondary_text): ?>
            <div class="about-section__text rte"><?php echo wp_kses_post($secondary_text); ?></div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

    <?php if ($cta_url): ?>
      <a class="about-section__cta"
         href="<?php echo esc_url($cta_url); ?>"
         target="<?php echo esc_attr($cta_target); ?>"
         <?php echo $cta_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
        <?php echo esc_html($cta_label ?: __('Mehr erfahren', 'textdomaintomodify')); ?>
      </a>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <div class="about-section__image">
    <?php
    if ($img_id) {
      echo wp_get_attachment_image($img_id, 'extra-large', false, [
        'class'    => 'about-section__image-element',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]);
    }
    ?>
  </div>

  <?php if ($variant !== 'whats_on_today'): ?>
  <div class="about-section__content">
    <?php if ($headline): ?>
      <h2 class="about-section__title"><?php echo esc_html($headline); ?></h2>
    <?php endif; ?>

    <?php if ($body): ?>
      <div class="about-section__text rte"><?php echo wp_kses_post($body); ?></div>
    <?php endif; ?>

    <?php if ($cta_url): ?>
      <a class="about-section__cta"
         href="<?php echo esc_url($cta_url); ?>"
         target="<?php echo esc_attr($cta_target); ?>"
         <?php echo $cta_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
        <?php echo esc_html($cta_label ?: __('Mehr erfahren', 'textdomaintomodify')); ?>
      </a>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</div>
