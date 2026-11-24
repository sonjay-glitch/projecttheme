<?php
/**
 * Partial: Header
 * Felder: logo (image id), menu_items (repeater: label, link)
 */

$logo_id = get_sub_field('logo');
$items   = get_sub_field('menu_items');
$home_url = home_url('/');
$site_name = get_bloginfo('name');
?>
<div class="header-module">
  <div class="header-module__inner container-fluid">
    <a class="header-module__brand" href="<?php echo esc_url($home_url); ?>" aria-label="<?php echo esc_attr($site_name); ?>">
      <?php if ($logo_id): ?>
        <?php echo wp_get_attachment_image($logo_id, 'thumbnail', false, [
          'class' => 'header-module__brand-image',
          'alt' => esc_attr($site_name),
        ]); ?>
      <?php else: ?>
        <span class="header-module__brand-fallback" aria-hidden="true">W</span>
      <?php endif; ?>
    </a>

    <nav class="header-module__nav" aria-label="<?php esc_attr_e('Hauptnavigation', 'textdomaintomodify'); ?>">
      <?php if (is_array($items) && $items): ?>
        <ul class="header-module__menu">
          <?php foreach ($items as $item): ?>
            <?php
            $label = $item['label'] ?? '';
            $link = $item['link'] ?? null;
            $url = is_array($link) ? ($link['url'] ?? '') : '';
            $title = is_array($link) ? ($link['title'] ?? '') : '';
            $target = is_array($link) ? ($link['target'] ?: '_self') : '_self';
            $url = $url ?: '';
            $label = $label ?: $title;
            ?>
            <?php if ($url && $label): ?>
              <li>
                <a href="<?php echo esc_url($url); ?>"
                   target="<?php echo esc_attr($target); ?>"
                   <?php echo $target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
                  <?php echo esc_html($label); ?>
                </a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <?php
        wp_nav_menu([
          'theme_location' => 'menu-main',
          'menu_class' => 'header-module__menu',
          'menu_id' => '',
          'container' => false,
          'fallback_cb' => false,
        ]);
        ?>
      <?php endif; ?>
    </nav>
  </div>
</div>
