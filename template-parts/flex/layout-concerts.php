<?php
/**
 * Concert cards
 */
$concerts = get_sub_field('concerts');

if (!is_array($concerts) || !$concerts) {
  return;
}
?>
<div class="concerts-section">
  <div class="concerts-grid">
    <?php foreach ($concerts as $concert): ?>
      <?php
      $venue = $concert['venue'] ?? '';
      $date_time = $concert['date_time'] ?? '';
      $artist = $concert['artist'] ?? '';
      $genre = $concert['genre'] ?? '';
      $location = $concert['location'] ?? '';
      $image_id = $concert['image'] ?? 0;
      ?>
      <article class="concert-card">
        <?php if ($venue): ?>
          <p class="concert-card__venue"><?php echo esc_html($venue); ?></p>
        <?php endif; ?>

        <?php if ($date_time): ?>
          <p class="concert-card__date"><?php echo esc_html($date_time); ?></p>
        <?php endif; ?>

        <?php if ($artist): ?>
          <h2 class="concert-card__artist"><?php echo esc_html($artist); ?></h2>
        <?php endif; ?>

        <?php if ($genre || $location): ?>
          <div class="concert-card__details">
            <?php if ($genre): ?>
              <p class="concert-card__genre"><?php echo esc_html($genre); ?></p>
            <?php endif; ?>
            <?php if ($location): ?>
              <p class="concert-card__location"><?php echo esc_html($location); ?></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($image_id): ?>
          <?php echo wp_get_attachment_image($image_id, 'large', false, [
            'class' => 'concert-card__image',
            'loading' => 'lazy',
            'decoding' => 'async',
          ]); ?>
        <?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div>
</div>
