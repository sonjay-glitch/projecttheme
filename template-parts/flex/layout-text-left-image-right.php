<?php
/**
 * Text links – Bild rechts
 * Variante: Where to go
 */
$headline = get_sub_field('headline');
$text     = get_sub_field('text');
$image_id = get_sub_field('image');
$cta      = get_sub_field('cta');
$cta_url  = is_array($cta) ? ($cta['url'] ?? '') : '';
$cta_label = is_array($cta) ? ($cta['title'] ?? '') : '';
$cta_target = is_array($cta) ? ($cta['target'] ?: '_self') : '_self';
?>
<div class="text-image-section text-image-section--where-to-go">
  <div class="text-image-section__content">
    <?php if ($headline): ?>
      <h2 class="text-image-section__title"><?php echo esc_html($headline); ?></h2>
    <?php endif; ?>

    <?php if ($text): ?>
      <div class="text-image-section__text rte"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>

    <?php if ($cta_url): ?>
      <a class="text-image-section__cta"
         href="<?php echo esc_url($cta_url); ?>"
         target="<?php echo esc_attr($cta_target); ?>"
         <?php echo $cta_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
        <?php echo esc_html($cta_label ?: __('Mehr erfahren', 'textdomaintomodify')); ?>
      </a>
    <?php endif; ?>
  </div>

  <div class="text-image-section__image">
    <?php if ($image_id): ?>
      <?php echo wp_get_attachment_image($image_id, 'extra-large', false, [
        'class'    => 'text-image-section__image-element',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]); ?>
    <?php endif; ?>
  </div>
</div>