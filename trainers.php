<?php
declare(strict_types=1);

$page  = 'trainers.php';
$title = 'Trainers — The Quads Gym, Manimajra, Chandigarh';
$desc  = 'The trainers at The Quads Gym, Manimajra. Who is on the floor, what they are good at and how to train with them.';

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';
?>

<main>

<?= page_head('floor', 'Trainers', 'The people on the floor.',
    'Twelve trainers between the weights floor, the studio, the cardio deck and the turf. Someone is on the floor from 5 AM to 10 PM, every day except Sunday.',
    '<a href="contact.php" class="btn btn-brand">Come in and meet them ' . icon('arrow') . '</a>'
  . '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-ghost">Call the gym</a>') ?>

<?= ticker() ?>

<section class="sec">
  <div class="wrap">
    <?= sec_head('The team', 'Who you will be training with.',
        'Six of the twelve. Ask for any of them at the desk, or just say what you want to work on and we will point you at the right one.') ?>
    <?= trainers_block() ?>
  </div>
</section>

<!-- how the trainers work -->
<section class="sec bg-ink-2">
  <div class="wrap">
    <div class="grid lg:grid-cols-12 gap-9 lg:gap-14 items-center">
      <div class="lg:col-span-6" data-up>
        <?= kicker('How it works') ?>
        <h2 class="h-lg mt-4 text-balance">Trainers stay on the floor.</h2>
        <p class="body mt-5 max-w-[52ch]">Not in an office. If your form slips, someone fixes it
          that set, whether or not you pay for personal training.</p>
      </div>
      <div class="lg:col-span-5 lg:col-start-8" data-up data-d="1">
        <?= tick_list([
            'A tour and a starting plan on day one',
            'Check-ins along the way at no extra cost',
            'Form corrected on the floor, free',
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
