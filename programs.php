<?php
declare(strict_types=1);

$page  = 'programs.php';
$title = 'Programs — Weights, Cardio, Zumba &amp; Aerobics | The Quads Gym';
$desc  = 'Weight training, cardio and fat loss, Zumba, aerobics, functional training and personal training at The Quads Gym, Manimajra, Chandigarh.';

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';
?>

<main>

<?= page_head('train', 'Programs', 'Six ways to train.',
    'Weights, cardio, Zumba, aerobics and functional training all come with the same membership. Only personal training is charged separately.',
    '<a href="index.php#offer" class="btn btn-brand">&#8377;' . OFFER['price'] . ' for 6 months ' . icon('arrow') . '</a>'
  . '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-ghost">Ask about timings</a>') ?>

<?= ticker() ?>

<!-- quick jump -->
<div class="bg-ink-2 border-b border-white/[0.07]">
  <div class="wrap flex gap-2 overflow-x-auto no-scrollbar py-4">
    <?php foreach (PROGRAMS as $id => $p): ?>
      <a href="#<?= $id ?>" class="flex-none inline-flex items-center gap-2 rounded-full border border-white/10 px-4 py-2 text-[0.84rem] text-white/70 hover:border-brand hover:text-white transition-colors">
        <span class="text-brand"><?= icon($p['icon']) ?></span><?= $p['title'] ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>

<?php $i = 0; foreach (PROGRAMS as $id => $p): $light = $i % 2 === 1; ?>
<section id="<?= $id ?>" class="sec scroll-mt-16 <?= $light ? 'bg-bone text-ink on-bone' : 'bg-ink-2' ?>">
  <div class="wrap">

    <div class="flex flex-wrap items-end justify-between gap-x-10 gap-y-6" data-up>
      <div class="flex items-start gap-5 sm:gap-7">
        <p class="ghost flex-none mt-1"><?= $p['n'] ?></p>
        <div>
          <p class="flex items-center gap-3 font-mono text-2xs uppercase tracking-label text-brand">
            <span class="text-brand"><?= icon($p['icon']) ?></span><?= $p['lead'] ?>
          </p>
          <h2 class="h-lg mt-3 text-balance"><?= $p['title'] ?></h2>
        </div>
      </div>
      <div class="flex flex-wrap gap-2">
        <?php foreach ($p['tags'] as $t): ?><span class="chip"><?= $t ?></span><?php endforeach; ?>
      </div>
    </div>

    <figure class="media media-zoom aspect-[16/9] lg:aspect-[21/9] mt-9 md:mt-12" data-up data-d="1">
      <img src="assets/img/<?= $p['img'] ?>" alt="<?= e($p['title']) ?> at The Quads Gym" loading="lazy">
    </figure>

    <div class="grid lg:grid-cols-12 gap-8 lg:gap-14 mt-9 md:mt-12">
      <p class="body lg:col-span-6 text-[1.02rem]" data-up data-d="2"><?= $p['body'] ?></p>
      <div class="lg:col-span-5 lg:col-start-8" data-up data-d="3">
        <?= tick_list($p['list'], $light ? 'light' : 'dark') ?>
      </div>
    </div>

  </div>
</section>
<?php $i++; endforeach; ?>

<!-- class timings -->
<section class="sec">
  <div class="wrap grid lg:grid-cols-12 gap-10 items-center">
    <div class="lg:col-span-6" data-up>
      <figure class="media media-zoom aspect-[16/9]"><img src="assets/img/studio-2.jpg" alt="The class studio" loading="lazy"></figure>
    </div>
    <div class="lg:col-span-6">
      <?= kicker('Class timings') ?>
      <h2 class="h-md mt-4" data-up data-d="1">Batch timings change through the year.</h2>
      <p class="body mt-4" data-up data-d="2">Zumba and aerobics batches are set around demand and we move them with the seasons. Rather than print a timetable that goes out of date, call or WhatsApp us and we will send this week&rsquo;s timings.</p>
      <div class="flex flex-wrap gap-3 mt-7" data-up data-d="3">
        <a href="tel:<?= e(SITE['tel']) ?>" class="btn btn-brand">Call for timings</a>
        <a href="<?= e(SITE['wa']) ?>?text=<?= rawurlencode("Hi, please share this week's Zumba and aerobics class timings.") ?>" target="_blank" rel="noopener" class="btn btn-ghost">WhatsApp us</a>
      </div>
    </div>
  </div>
</section>

<?= offer_block() ?>

<?= cta_band('cardio-3.jpg', 'Not sure what suits you', 'Tell us your goal.',
    'Talk to a trainer for ten minutes. It costs nothing and you will leave knowing where to start.',
    '<a href="contact.php" class="btn btn-brand">Ask a trainer ' . icon('arrow') . '</a>'
  . '<a href="fitness.php" class="btn btn-ghost">Free tools</a>') ?>

</main>

<?php require __DIR__ . '/inc/footer.php'; ?>
