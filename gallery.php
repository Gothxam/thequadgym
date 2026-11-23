<?php
declare(strict_types=1);

$page  = 'gallery.php';
$title = 'Photos — Inside The Quads Gym, Manimajra';
$desc  = 'Photos from inside The Quads Gym in Manimajra, Chandigarh: weights floor, machines, cardio deck, turf lane and the class studio.';

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';
?>

<main>

<?= page_head('weights', 'Photos', 'Have a look before you come.',
    'All taken inside our gym after the rebuild. Nothing is stock. Tap any photo to open it full size.',
    '<a href="index.php#offer" class="btn btn-brand">&#8377;' . OFFER['price'] . ' for 6 months ' . icon('arrow') . '</a>'
  . '<a href="contact.php" class="btn btn-ghost">Plan a visit</a>') ?>

<section class="sec-sm">
  <div class="wrap">
    <div class="grid grid-flow-row-dense grid-cols-2 sm:grid-cols-4 auto-rows-[44vw] sm:auto-rows-[21vw] lg:auto-rows-[15vw] gap-2.5 sm:gap-3" data-up>
      <?php foreach (GALLERY as [$src, $cap, $span]): ?>
        <figure class="media media-zoom <?= $span ?>" data-full="assets/img/<?= $src ?>" data-cap="<?= e($cap) ?>">
          <img src="assets/img/<?= $src ?>" alt="<?= e($cap) ?> at The Quads Gym" loading="lazy">
          <span class="media-tag"><?= $cap ?></span>
        </figure>
      <?php endforeach; ?>
    </div>
    <p class="text-center text-sm text-white/40 mt-8"><?= count(GALLERY) ?> photos, all shot at the gym.</p>
  </div>
</section>

<?= offer_block('hero-machines.jpg') ?>

<?= cta_band('hero-racks.jpg', 'Better in person', 'Photos only get you so far.',
    'Walk in any day between 5 AM and 10 PM and see the floor yourself.',
    '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-brand">' . icon('phone') . ' Call ' . SITE['tel_h'] . '</a>'
  . '<a href="contact.php" class="btn btn-ghost">Get directions</a>') ?>

</main>

<?php require __DIR__ . '/inc/footer.php'; ?>
