<?php
declare(strict_types=1);

$page  = 'index.php';
$title = 'The Quads Gym — Gym in Manimajra, Chandigarh';
$desc  = 'Newly rebuilt gym in Manimajra, Chandigarh. Weights, cardio, Zumba, aerobics and personal training. Open 5 AM to 10 PM, Mon to Sat. ₹4,999 for 6 months.';

require __DIR__ . '/inc/head.php';

$ld = [
    '@context' => 'https://schema.org',
    '@type'    => 'HealthClub',
    'name'     => SITE['name'],
    'url'      => SITE['url'] . '/',
    'telephone'=> '+91-75088-64945',
    'image'    => SITE['url'] . '/assets/img/hero-wall.jpg',
    'address'  => [
        '@type'          => 'PostalAddress',
        'streetAddress'  => 'Near Shivalik Garden, Police Station Shubhash Nagar, Manimajra',
        'addressLocality'=> 'Chandigarh',
        'addressCountry' => 'IN',
    ],
    'openingHoursSpecification' => [[
        '@type'     => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
        'opens'     => '05:00', 'closes' => '22:00',
    ]],
];
?>
<script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_SLASHES) ?></script>

<?php require __DIR__ . '/inc/header.php'; ?>

<main>

<!-- ============ HERO ============ -->
<!-- 100svh minus the offer marquee under it (3.25rem), so the hero fills the
     first screen and the red bar sits flush along the bottom of it. -->
<section class="relative isolate overflow-hidden min-h-[calc(100svh-3.25rem)]
                flex flex-col justify-center pt-24 pb-8">

  <div class="hero-media">
    <div class="slides" data-slides="6000">
      <?php foreach (HERO_SLIDES as $i => [$img, $alt, $pos]): ?>
        <div class="slide<?= $i === 0 ? ' is-on' : '' ?>">
          <img class="<?= $pos ?>" src="assets/img/<?= $img ?>" alt="<?= e($alt) ?>"<?= $i === 0 ? ' fetchpriority="high"' : ' loading="lazy"' ?>>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="grain"></div>

  <div class="wrap relative z-20 w-full flex-1 flex items-center">
    <div class="w-full grid lg:grid-cols-12">
      <div class="lg:col-span-6 xl:col-span-5">

        <p class="flex items-center gap-3 font-mono text-2xs uppercase tracking-label text-white/70" data-up>
          <span class="text-brand"><?= icon('pin') ?></span><?= SITE['city'] ?>
          <span class="hidden sm:block h-px w-16 bg-white/20"></span>
        </p>

        <h1 class="h-hero mt-6" data-up data-d="1">
          <span class="block">Train. Build.</span>
          <span class="block text-brand">Transform.</span>
          <svg class="swoosh" viewBox="0 0 300 18" fill="currentColor" aria-hidden="true">
            <path d="M2 13.2C70 5.6 176 1.6 298 6.4c-78 1.2-176 4.6-252 9.4-16 1-30 .2-44-2.6z"/>
          </svg>
        </h1>

        <p class="lead mt-6 max-w-[44ch]" data-up data-d="2">
          A rebuilt gym in Manimajra with new machines, a full weights floor, a cardio deck
          and a separate class studio. Open 5 AM to 10 PM, Monday to Saturday.
        </p>

        <div class="flex flex-wrap gap-3 mt-8" data-up data-d="3">
          <a href="#offer" class="btn btn-brand">Join the gym <?= icon('arrow') ?></a>
          <a href="gallery.php" class="btn btn-ghost"><?= icon('play') ?> Take a tour</a>
        </div>

        <?= feat_row([['dumbbell','Gym &amp; weights'], ['tread','Cardio zone'], ['people2','Zumba &amp; aerobics']]) ?>

        <div class="dots mt-9" style="--slide-ms:6000ms" aria-label="Gym photos">
          <?php foreach (HERO_SLIDES as $i => $s): ?>
            <button class="dot<?= $i === 0 ? ' is-on' : '' ?>" aria-label="Show photo <?= $i + 1 ?>"><span></span></button>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="wrap relative z-20 w-full mt-8"><?= stat_strip(HERO_STATS) ?></div>
</section>

<?= ticker() ?>
<?= fact_bar() ?>
<?= offer_block() ?>

<!-- ============ PROGRAMS ============ -->
<section class="sec overflow-hidden">
  <div class="wrap">
    <?= sec_head('What you can do here', 'Six ways to train.',
        'All of these come with your membership. Only personal training costs extra.',
        ['All programs', 'programs.php']) ?>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
      <?php $i = 0; foreach (PROGRAMS as $id => $p): ?>
        <a href="programs.php#<?= $id ?>" class="tallcard" data-up data-d="<?= ($i % 4) + 1 ?>">
          <img src="assets/img/<?= $p['img'] ?>" alt="<?= e($p['title']) ?> at The Quads Gym" loading="lazy">
          <div class="tallcard__body">
            <h3 class="h-sm"><?= $p['title'] ?></h3>
            <p class="text-[0.86rem] text-white/65 mt-1.5 leading-snug"><?= $p['short'] ?></p>
            <div class="tallcard__meta">
              <span class="tallcard__tag"><?= $p['n'] ?> &middot; Included</span>
              <span class="tallcard__go"><?= icon('arrow') ?></span>
            </div>
          </div>
        </a>
      <?php $i++; endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ ABOUT ============ -->
<section class="sec bg-ink-2 overflow-hidden">
  <div class="wrap credo">

    <figure class="credo__plate credo__plate--a" data-up>
      <div class="credo__shot">
        <img src="assets/img/brand-wall-tall.jpg" alt="The painted wall at The Quads Gym" loading="lazy">
      </div>
      <figcaption>The wall, repainted 2026</figcaption>
    </figure>

    <div class="credo__in">
      <span class="credo__rule" data-up></span>
      <h2 class="font-display font-bold tracking-[-0.025em] leading-[1.05]
                 text-[clamp(1.9rem,3.5vw,3.05rem)] text-balance" data-up data-d="1">
        Ten years here. Rebuilt this year.</h2>

      <div class="credo__cols" data-up data-d="2">
        <p class="body">We closed the gym in 2026 and rebuilt it: new floor, new lighting,
          new machines, a separate class studio and clean changing rooms.</p>
        <p class="body">The way we run it has not changed. No lock-in contracts, no pushy
          selling, and broken machines get fixed in days, not weeks. Trainers stay on the
          floor, so there is always someone to ask.</p>
      </div>

      <p class="mt-9" data-up data-d="3"><a href="about.php" class="tlink">More about the gym <?= icon('arrow') ?></a></p>
    </div>

    <figure class="credo__plate credo__plate--b" data-up data-d="2">
      <div class="credo__shot">
        <img src="assets/img/reception.jpg" alt="The front desk at The Quads Gym" loading="lazy">
      </div>
      <figcaption>The front desk</figcaption>
    </figure>

  </div>
</section>

<!-- ============ FACILITY ============ -->
<section class="sec bg-bone text-ink on-bone">
  <div class="wrap">
    <?= sec_head('Inside', "What's in the gym.", 'Everything below is new as of 2026.') ?>
    <div class="grid md:grid-cols-2 gap-x-12 gap-y-10">
      <?php foreach (FACILITY as $i => [$t, $d]): ?>
        <article class="flex gap-5 border-t-2 border-ink/15 pt-6" data-up data-d="<?= ($i % 2) + 1 ?>">
          <p class="ghost flex-none -mt-2 w-[2ch]"><?= $i + 1 ?></p>
          <div>
            <h3 class="h-sm"><?= $t ?></h3>
            <p class="body mt-2"><?= $d ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ PHOTOS ============ -->
<section class="sec">
  <div class="wrap">
    <?= sec_head('Photos', 'The gym, as it is.',
        'All taken here after the rebuild. Nothing is stock.',
        ['All photos', 'gallery.php']) ?>

    <div class="grid grid-cols-2 lg:grid-cols-4 auto-rows-[clamp(140px,14vw,210px)] gap-3 md:gap-4" data-up>
      <?php foreach (HOME_TILES as $i => [$src, $cap, $span]): ?>
        <figure class="tile <?= $span ?>" data-full="assets/img/<?= $src ?>" data-cap="<?= e($cap) ?>">
          <img src="assets/img/<?= $src ?>" alt="<?= e($cap) ?> at The Quads Gym" loading="lazy">
          <figcaption class="tile__chip"><?= $cap ?></figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ TOOLS ============ -->
<section class="sec bg-ink-2">
  <div class="wrap">
    <?= sec_head('Free tools', 'Work out your numbers.',
        'Three calculators plus beginner guides. No sign-up, nothing saved.',
        ['All tools', 'fitness.php']) ?>
    <div class="grid sm:grid-cols-3 gap-4 md:gap-5">
      <?php foreach ([
        ['01','BMI','See where your weight sits for your height, and what to do next.','bmi'],
        ['02','Calories &amp; protein','How much to eat a day to lose fat, stay the same or gain.','calories'],
        ['03','One-rep max','Work out your max lift and the weights to train with.','onerm'],
      ] as $i => [$n, $t, $d, $id]): ?>
        <a href="fitness.php#<?= $id ?>" class="card p-6 pt-5 block relative overflow-hidden group" data-up data-d="<?= $i + 1 ?>">
          <span class="ghost absolute -right-2 -top-3 opacity-70"><?= $n ?></span>
          <h3 class="h-sm relative"><?= $t ?></h3>
          <p class="body mt-2 relative"><?= $d ?></p>
          <span class="tlink mt-5 relative">Open <?= icon('arrow') ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ FIND US ============ -->
<section class="sec">
  <div class="wrap">
    <?= sec_head('Find us', 'Manimajra, near Shivalik Garden.', 'Walk in any day during opening hours. Parking is right outside.') ?>
  </div>
  <div class="wrap lg:grid lg:grid-cols-12 lg:items-center">
    <div class="map-dark rounded-3xl overflow-hidden border hair h-[360px] md:h-[560px] lg:col-start-1 lg:col-span-12 lg:row-start-1" data-up>
      <iframe title="Map showing The Quads Gym, Manimajra" src="<?= e(SITE['map_embed']) ?>" class="w-full h-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="float-card p-6 sm:p-7 -mt-12 mx-4 lg:mt-0 lg:mx-0 lg:col-start-8 lg:col-span-4 lg:row-start-1 lg:mr-8" data-up data-d="1">
      <p class="font-display font-bold text-xl"><?= SITE['name'] ?></p>
      <dl class="grid mt-4 border-t border-white/10">
        <div class="py-3 border-b border-white/10">
          <dt class="font-mono text-2xs uppercase tracking-label text-white/35">Address</dt>
          <dd class="text-[0.93rem] leading-relaxed mt-1"><?= SITE['addr_br'] ?></dd>
        </div>
        <div class="py-3 border-b border-white/10">
          <dt class="font-mono text-2xs uppercase tracking-label text-white/35">Phone</dt>
          <dd class="text-[0.93rem] mt-1"><a href="tel:<?= e(SITE['tel']) ?>" class="border-b-2 border-brand pb-0.5 hover:text-brand transition-colors"><?= SITE['tel_h'] ?></a></dd>
        </div>
        <div class="py-3 border-b border-white/10">
          <dt class="font-mono text-2xs uppercase tracking-label text-white/35">Open</dt>
          <dd class="text-[0.93rem] leading-relaxed mt-1"><?= SITE['hours'] ?><br><span class="text-white/40"><?= SITE['closed'] ?></span></dd>
        </div>
      </dl>
      <a href="<?= e(SITE['map_link']) ?>" target="_blank" rel="noopener" class="btn btn-brand btn-sm w-full mt-5">Get directions <?= icon('arrow') ?></a>
    </div>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="sec bg-bone text-ink on-bone">
  <div class="wrap">
    <?= sec_head('Questions', 'Things people ask.') ?>
    <?= faq_block(FAQ_HOME) ?>
  </div>
</section>

<?= cta_band('floor-wide.jpg', 'Come and see it', 'Walk in and look around.',
    'No appointment, no pressure. Someone will show you the floor and answer your questions.',
    '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-brand">' . icon('phone') . ' Call ' . SITE['tel_h'] . '</a>'
  . '<a href="contact.php" class="btn btn-ghost">Plan a visit</a>') ?>

</main>

<?php require __DIR__ . '/inc/footer.php'; ?>
