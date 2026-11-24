<?php
/**
 * Bild links – Text rechts
 * Felder: image (ID), headline (text), text (wysiwyg), cta (link array)
 */
$img_id   = get_sub_field('image');
$headline = get_sub_field('headline');
$body     = get_sub_field('text');
$cta      = get_sub_field('cta');
$cta_url  = is_array($cta) ? ($cta['url'] ?? '') : '';
$cta_label = is_array($cta) ? ($cta['title'] ?? '') : '';
$cta_target = is_array($cta) ? ($cta['target'] ?: '_self') : '_self';
?>
<div class="about-section">
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
</div>
