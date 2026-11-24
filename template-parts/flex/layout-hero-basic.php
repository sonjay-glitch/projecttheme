<?php
/**
 * Partial: Hero Basic
 * Felder: title (text), second_headline (text), text (wysiwyg)
 */

$title = get_sub_field('title');
$second_headline = get_sub_field('second_headline');
$text = get_sub_field('text');
$heading_tag = apply_filters('theme_hero_basic_heading_tag', 'h1');
?>
<div class="hero-basic">
  <div class="hero-basic__content">
    <div class="hero-basic__headlines">
      <?php if ($title): ?>
        <<?php echo tag_escape($heading_tag); ?> class="hero-basic__title">
          <?php echo esc_html($title); ?>
        </<?php echo tag_escape($heading_tag); ?>>
      <?php endif; ?>

      <?php if ($second_headline): ?>
        <h2 class="hero-basic__second-title">
          <?php echo esc_html($second_headline); ?>
        </h2>
      <?php endif; ?>
    </div>

    <?php if ($text): ?>
      <div class="hero-basic__text rte"><?php echo wp_kses_post($text); ?></div>
    <?php endif; ?>
  </div>
</div>
