<?php
$title   = get_sub_field('title');
$image_id = get_sub_field('image');
$intro   = get_sub_field('intro');
$tagline = get_sub_field('tagline');
$text    = get_sub_field('text');
?>
<div class="about-punk">
  <?php if ($title): ?>
    <h2 class="about-punk__title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>

  <?php if ($image_id): ?>
    <div class="about-punk__image">
      <?php
      echo wp_get_attachment_image($image_id, 'large', false, [
        'class'    => 'img-fluid',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]);
      ?>
    </div>
  <?php endif; ?>

  <?php if ($intro): ?>
    <div class="about-punk__intro rte"><?php echo wp_kses_post($intro); ?></div>
  <?php endif; ?>

  <?php if ($tagline): ?>
    <p class="about-punk__tagline"><?php echo esc_html($tagline); ?></p>
  <?php endif; ?>

  <?php if ($text): ?>
    <div class="about-punk__text rte"><?php echo wp_kses_post($text); ?></div>
  <?php endif; ?>
</div>
