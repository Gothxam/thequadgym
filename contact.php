<?php
declare(strict_types=1);

require __DIR__ . '/inc/enquiry.php';   // may redirect, so it runs first

$page  = 'contact.php';
$title = 'Contact &amp; Location — The Quads Gym, Manimajra, Chandigarh';
$desc  = 'Visit The Quads Gym near Shivalik Garden, Police Station Shubhash Nagar, Manimajra, Chandigarh. Open Mon to Sat, 5 AM to 10 PM. Call +91 75088 64945.';

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';

const DETAILS = [
    ['pin',   'Address',  null],
    ['phone', 'Phone',    null],
    ['clock', 'Open',     null],
    ['park',  'Parking',  'Free, right outside'],
];
?>

<main>

<?= page_head('turf', 'Contact', 'Walk in. We are open.',
    'No appointment needed. Come any day except Sunday between 5 AM and 10 PM, look at the floor and ask whatever you want.',
    '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-brand">' . icon('phone') . ' ' . SITE['tel_h'] . '</a>'
  . '<a href="' . e(SITE['wa']) . '" target="_blank" rel="noopener" class="btn btn-ghost">WhatsApp us</a>') ?>

<?= fact_bar() ?>

<section class="sec">
  <div class="wrap grid lg:grid-cols-12 gap-10 lg:gap-14 items-start">

    <!-- details -->
    <div class="lg:col-span-5">
      <?= kicker('Details') ?>
      <h2 class="h-lg mt-4" data-up data-d="1">How to find us.</h2>

      <dl class="grid border-t hair mt-7" data-up data-d="1">
        <div class="grid sm:grid-cols-[auto_1fr] gap-x-4 gap-y-1 py-4 border-b hair">
          <dt class="text-brand pt-0.5"><?= icon('pin') ?></dt>
          <dd class="text-[0.96rem] leading-relaxed"><?= SITE['addr_br'] ?></dd>
        </div>
        <div class="grid sm:grid-cols-[auto_1fr] gap-x-4 gap-y-1 py-4 border-b hair">
          <dt class="text-brand pt-0.5"><?= icon('phone') ?></dt>
          <dd class="text-[0.96rem]"><a href="tel:<?= e(SITE['tel']) ?>" class="border-b-2 border-brand pb-0.5 hover:text-brand transition-colors"><?= SITE['tel_h'] ?></a></dd>
        </div>
        <div class="grid sm:grid-cols-[auto_1fr] gap-x-4 gap-y-1 py-4 border-b hair">
          <dt class="text-brand pt-0.5"><?= icon('clock') ?></dt>
          <dd class="text-[0.96rem] leading-relaxed"><?= SITE['hours'] ?><br><span class="text-white/40"><?= SITE['closed'] ?></span></dd>
        </div>
        <div class="grid sm:grid-cols-[auto_1fr] gap-x-4 gap-y-1 py-4 border-b hair">
          <dt class="text-brand pt-0.5"><?= icon('park') ?></dt>
          <dd class="text-[0.96rem]">Free parking, right outside</dd>
        </div>
      </dl>

      <div class="flex flex-wrap gap-3 mt-7" data-up data-d="2">
        <a href="<?= e(SITE['map_link']) ?>" target="_blank" rel="noopener" class="btn btn-brand">Get directions <?= icon('arrow') ?></a>
        <a href="<?= e(SITE['wa']) ?>" target="_blank" rel="noopener" class="btn btn-ghost">WhatsApp</a>
      </div>
    </div>

    <!-- enquiry form -->
    <div class="lg:col-span-7" id="enquiry">
      <div class="float-card p-6 sm:p-8" data-up data-d="1">
        <?= kicker('Send a message') ?>
        <h2 class="h-md mt-3">Tell us what you want to work on.</h2>

        <?php if ($sent): ?>
          <div class="mt-6 rounded-2xl border border-brand/40 bg-brand/10 p-5">
            <p class="font-display font-bold text-lg">Thanks, we have it.</p>
            <p class="body mt-2">Someone will call you back on the number you gave. If it is urgent, ring us on
              <a href="tel:<?= e(SITE['tel']) ?>" class="text-brand font-semibold"><?= SITE['tel_h'] ?></a>.</p>
          </div>
        <?php else: ?>

          <p class="body mt-3">
            <?php if (SITE['email'] === ''): ?>
              Fill this in and we will open WhatsApp with your details ready to send. Nothing is stored on this website.
            <?php else: ?>
              Fill this in and it reaches the front desk. We usually reply the same day.
            <?php endif; ?>
          </p>

          <?php if ($errors): ?>
            <div class="mt-5 rounded-xl border border-brand/50 bg-brand/10 px-4 py-3">
              <p class="text-sm font-semibold">Please check the form:</p>
              <ul class="text-sm text-white/70 mt-1 list-disc pl-5">
                <?php foreach ($errors as $msg): ?><li><?= e($msg) ?></li><?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <form class="grid gap-5 mt-7" method="post" action="contact.php#enquiry" novalidate>
            <p class="hidden" aria-hidden="true">
              <label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </p>

            <div class="grid sm:grid-cols-2 gap-4">
              <div class="field">
                <label for="name">Your name</label>
                <input type="text" id="name" name="name" autocomplete="name" placeholder="Full name"
                       value="<?= e($old['name']) ?>" required
                       <?= isset($errors['name']) ? 'aria-invalid="true"' : '' ?>>
              </div>
              <div class="field">
                <label for="phone">Phone number</label>
                <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+91"
                       value="<?= e($old['phone']) ?>" required
                       <?= isset($errors['phone']) ? 'aria-invalid="true"' : '' ?>>
              </div>
            </div>

            <div class="field">
              <label for="goal">What are you looking for?</label>
              <select id="goal" name="goal">
                <?php foreach (ENQUIRY_GOALS as $g): ?>
                  <option<?= $old['goal'] === $g ? ' selected' : '' ?>><?= e($g) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="field">
              <label for="message">Anything else</label>
              <textarea id="message" name="message" placeholder="Injuries, your schedule, questions — anything useful for us to know."><?= e($old['message']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-brand w-full">Send <?= icon('arrow') ?></button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="sec-sm">
  <div class="wrap">
    <div class="map-dark rounded-3xl overflow-hidden border hair h-[320px] md:h-[460px]" data-up>
      <iframe title="Map showing The Quads Gym, Manimajra, Chandigarh" src="<?= e(SITE['map_embed']) ?>" class="w-full h-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

<section class="sec bg-bone text-ink on-bone">
  <div class="wrap">
    <?= sec_head('Before you call', 'Quick answers.') ?>
    <?= faq_block(FAQ_CONTACT) ?>
  </div>
</section>

<?= offer_block() ?>

</main>

<?php require __DIR__ . '/inc/footer.php'; ?>
