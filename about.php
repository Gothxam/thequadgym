<?php
declare(strict_types=1);

$page  = 'about.php';
$title = 'About — The Quads Gym, Manimajra';
$desc  = 'Ten years in Manimajra, rebuilt in 2026. How The Quads Gym is run, what is on the floor and how the trainers work.';

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';

const RULES = [
    ['Trainers stay on the floor',  'Not in an office. If your form slips, someone fixes it that set, whether or not you pay for personal training.'],
    ['Machines get fixed fast',     'We check the equipment every week. A jammed pin is a machine nobody can use.'],
    ['No pushy selling',            'Nobody will corner you about supplements or an upgrade. Ask us and we will tell you if it is worth the money.'],
    ['Beginners come first',        'Day one you get a tour, a routine and someone to ask. You should not have to pretend you know how a cable machine works.'],
    ['The floor stays clean',       'Weights go back on the rack, benches get wiped, washrooms are checked through the day.'],
    ['Everyone trains together',    'Seventeen-year-olds and sixty-year-olds, first-timers and serious lifters. Nobody gets priority.'],
];

const ADDED = [
    ['Weights floor', 'dumbbells-3.jpg',  'Dumbbell wall, Olympic bars, benches and squat racks with room to move.'],
    ['Machines',      'machines-2.jpg',   'Pin-loaded and plate-loaded stations for every muscle group.'],
    ['Cardio deck',   'cardio-4.jpg',     'Treadmills, cross trainers and cycles, all serviced.'],
    ['Class studio',  'studio-2.jpg',     'A separate mirrored room with its own sound system.'],
    ['Turf lane',     'turf-lane-2.jpg',  'Artificial grass for sled work, carries and circuits.'],
    ['Reception',     'reception-2.jpg',  'A desk to ask at, plus lockers and clean changing rooms.'],
];
?>

<main>

<?= page_head('floor', 'About', 'Ten years in Manimajra.',
    'We have run this gym long enough to know what people here want: machines that work, enough space, honest help and a fair price.') ?>

<?= fact_bar() ?>

<!-- story -->
<section class="sec">
  <div class="wrap grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
    <div class="lg:col-span-6" data-up>
      <figure class="media media-zoom aspect-[4/3]"><img src="assets/img/floor-wide.jpg" alt="The main floor" loading="lazy"></figure>
    </div>
    <div class="lg:col-span-6">
      <?= kicker('Our story') ?>
      <h2 class="h-lg mt-4 text-balance" data-up data-d="1">We built the gym we wanted to train in.</h2>
      <p class="body mt-5" data-up data-d="2">Plenty of places will sell you a membership. Fewer will notice when your back rounds on the third set. That is the difference we aim for.</p>
      <p class="body mt-4" data-up data-d="3">More than five thousand people have trained here: students, people on shifts, mothers coming back after a break, men in their fifties told by a doctor to start moving. Everyone gets the same floor and the same help.</p>
      <p class="body mt-4" data-up data-d="3">In 2026 we shut the gym and rebuilt it. New floor, better lighting and ventilation, new machines, a proper class studio and clean changing rooms.</p>
      <div class="mt-9"><?= stat_strip(HERO_STATS) ?></div>
    </div>
  </div>
</section>

<!-- rules -->
<section class="sec bg-bone text-ink on-bone">
  <div class="wrap">
    <?= sec_head('How we run it', 'Six rules we stick to.') ?>
    <div class="grid md:grid-cols-2 gap-x-12 gap-y-10">
      <?php foreach (RULES as $i => [$t, $d]): ?>
        <article class="flex gap-5 border-t-2 border-ink/15 pt-6" data-up data-d="<?= ($i % 2) + 1 ?>">
          <p class="ghost flex-none -mt-2 w-[2ch]"><?= $i + 1 ?></p>
          <div><h3 class="h-sm"><?= $t ?></h3><p class="body mt-2"><?= $d ?></p></div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- trainers -->
<section id="trainers" class="sec bg-ink-2 scroll-mt-16">
  <div class="wrap grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
    <div class="lg:col-span-6 order-2 lg:order-1">
      <?= kicker('Trainers') ?>
      <h2 class="h-lg mt-4 text-balance" data-up data-d="1">Twelve trainers on the floor.</h2>
      <p class="lead mt-5" data-up data-d="2">Certified, experienced, and interested in whether you actually improve.</p>
      <p class="body mt-4" data-up data-d="3">Between them they cover weight training, fat loss, coming back from an injury, sport conditioning and the studio classes.</p>
      <div class="mt-6" data-up data-d="3">
        <?= tick_list([
            'A tour and a starting plan on day one',
            'Check-ins along the way at no extra cost',
            'Form corrected on the floor, free',
            'Personal training in one and three month packages',
        ]) ?>
      </div>
      <div class="flex flex-wrap gap-3 mt-8" data-up data-d="3">
        <a href="programs.php" class="btn btn-brand">See the programs <?= icon('arrow') ?></a>
        <a href="contact.php" class="btn btn-ghost">Ask a question</a>
      </div>
    </div>
    <div class="lg:col-span-6 order-1 lg:order-2" data-up>
      <figure class="media media-zoom aspect-[4/3]"><img src="assets/img/machine-floor-2.jpg" alt="Trainer on the machine floor" loading="lazy"></figure>
    </div>
  </div>
</section>

<!-- who they are -->
<section class="sec">
  <div class="wrap">
    <?= sec_head('The team', 'Who you will be training with.',
        'Six of the twelve. Between them they cover the weights floor, the studio, the cardio deck and the turf.') ?>
    <?= trainers_block() ?>
    <div class="mt-12" data-up>
      <a href="contact.php" class="btn btn-ghost">Come in and meet them <?= icon('arrow') ?></a>
    </div>
  </div>
</section>

<!-- what the rebuild added -->
<section class="sec">
  <div class="wrap">
    <?= sec_head('On the floor', 'What the rebuild added.') ?>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
      <?php foreach (ADDED as $i => [$t, $img, $d]): ?>
        <article class="card" data-up data-d="<?= ($i % 3) + 1 ?>">
          <figure class="media media-zoom aspect-[4/3] rounded-none"><img src="assets/img/<?= $img ?>" alt="<?= e($t) ?>" loading="lazy"></figure>
          <div class="p-5"><h3 class="h-sm"><?= $t ?></h3><p class="body mt-2"><?= $d ?></p></div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?= offer_block() ?>

<?= cta_band('rack-turf.jpg', 'Come and see it', 'The floor speaks for itself.',
    'Walk in any day between 5 AM and 10 PM and have a look before you decide.',
    '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-brand">' . icon('phone') . ' Call ' . SITE['tel_h'] . '</a>'
  . '<a href="gallery.php" class="btn btn-ghost">See photos</a>') ?>

</main>

<?php require __DIR__ . '/inc/footer.php'; ?>
