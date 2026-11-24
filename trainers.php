<?php
declare(strict_types=1);

$page  = 'trainers.php';
$title = 'Trainers — The Quads Gym, Manimajra, Chandigarh';
$desc  = 'The trainers at The Quads Gym, Manimajra. Who they are, what they are good at, when they are on the floor and how to train with them.';

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';
?>

<main>

<?= page_head('floor', 'Trainers', 'The people on the floor.',
    'Twelve trainers between the weights floor, the studio, the cardio deck and the turf. Here are six of them, what they are good at and when you will find them in.',
    '<a href="contact.php" class="btn btn-brand">Come in and meet them ' . icon('arrow') . '</a>'
  . '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-ghost">Call the gym</a>') ?>

<?= ticker() ?>

<!-- jump to a profile -->
<div class="bg-ink-2 border-b border-white/[0.07]">
  <div class="wrap py-6">
    <?= roster() ?>
  </div>
</div>

<?php if (TRAINERS_ARE_SAMPLES): ?>
<div class="wrap pt-12 md:pt-16">
  <?= sample_note('Sample people, so the page has something to show. Replace the names, '
    . 'years, certifications and bios in <code class="font-mono text-2xs">inc/config.php</code> '
    . '&mdash; add a <code class="font-mono text-2xs">photo</code> to an entry and the initials '
    . 'give way to it.') ?>
</div>
<?php endif; ?>

<?php foreach (TRAINERS as $i => $t): ?>
<?= profile_block($t, $i) ?>
<?php endforeach; ?>

<!-- the other six -->
<section class="sec bg-ink-2">
  <div class="wrap">
    <div class="grid lg:grid-cols-12 gap-9 lg:gap-14 items-center">
      <div class="lg:col-span-6" data-up>
        <?= kicker('And the rest') ?>
        <h2 class="h-lg mt-4 text-balance">Six more on the floor.</h2>
        <p class="body mt-5">The other half of the team covers the early morning
          and late evening shifts. You will meet them on your tour &mdash; ask whoever
          is on the floor and they will point you at the right person for what you want to do.</p>
      </div>
      <div class="lg:col-span-5 lg:col-start-8" data-up data-d="1">
        <?= tick_list([
            'Someone on the floor from 5 AM to 10 PM',
            'A trainer walks you round on day one',
            'Form corrected free, whether or not you pay for personal training',
            'Personal training in one and three month blocks',
        ]) ?>
      </div>
    </div>
  </div>
</section>

<?= offer_block('machine-floor-3.jpg') ?>

<?= cta_band('rack-turf-2.jpg', 'Still deciding', 'Come and talk to one of them.',
    'Ten minutes on the floor tells you more than any website can. No appointment, no charge.',
    '<a href="contact.php" class="btn btn-brand">Ask a question ' . icon('arrow') . '</a>'
  . '<a href="index.php#plans" class="btn btn-ghost">See the plans</a>') ?>

</main>

<?php require __DIR__ . '/inc/footer.php'; ?>
