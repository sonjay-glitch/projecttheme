<?php
/**
 * Club event cards
 */
$club_events = get_sub_field('club_events');

if (!is_array($club_events) || !$club_events) {
  return;
}
?>
<div class="clubs-section">
  <div class="clubs-grid">
    <?php foreach ($club_events as $event): ?>
      <?php
      $venue = $event['venue'] ?? '';
      $date_time = $event['date_time'] ?? '';
      $artist = $event['artist'] ?? '';
      $genre = $event['genre'] ?? '';
      $location = $event['location'] ?? '';
      $image_id = $event['image'] ?? 0;
      ?>
      <article class="clubs-card">
        <?php if ($venue): ?>
          <p class="clubs-card__venue"><?php echo esc_html($venue); ?></p>
        <?php endif; ?>

        <?php if ($date_time): ?>
          <p class="clubs-card__date"><?php echo esc_html($date_time); ?></p>
        <?php endif; ?>

        <?php if ($artist): ?>
          <h2 class="clubs-card__artist"><?php echo esc_html($artist); ?></h2>
        <?php endif; ?>

        <?php if ($genre || $location): ?>
          <div class="clubs-card__details">
            <?php if ($genre): ?>
              <p class="clubs-card__genre"><?php echo esc_html($genre); ?></p>
            <?php endif; ?>
            <?php if ($location): ?>
              <p class="clubs-card__location"><?php echo esc_html($location); ?></p>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($image_id): ?>
          <?php echo wp_get_attachment_image($image_id, 'large', false, [
            'class' => 'clubs-card__image',
            'loading' => 'lazy',
            'decoding' => 'async',
          ]); ?>
        <?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div>
</div>
