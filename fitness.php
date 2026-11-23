<?php
declare(strict_types=1);

$page  = 'fitness.php';
$title = 'Fitness Tools &amp; Guides — BMI, Calories, Workout Plans | The Quads Gym';
$desc  = 'Free BMI calculator, daily calorie and protein calculator, one-rep-max calculator, beginner workout plans and simple Indian diet guidance from The Quads Gym, Manimajra.';

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';

const SPLITS = [
    ['3 days a week', 'Full body', [
        ['Day 1', 'Squat, bench press, row, plank'],
        ['Day 2', 'Deadlift, shoulder press, lat pulldown, curls'],
        ['Day 3', 'Leg press, incline press, cable row, core'],
        ['Best for', 'Beginners and anyone short on time'],
    ]],
    ['4 days a week', 'Upper and lower', [
        ['Day 1', 'Bench, shoulder press, triceps'],
        ['Day 2', 'Squat, leg curl, calves'],
        ['Day 3', 'Rows, pulldowns, biceps'],
        ['Day 4', 'Deadlift, lunges, core'],
    ]],
    ['5 days a week', 'One body part a day', [
        ['Day 1', 'Chest'], ['Day 2', 'Back'], ['Day 3', 'Legs'],
        ['Day 4', 'Shoulders'], ['Day 5', 'Arms and core'],
    ]],
];
?>

<main>

<?= page_head('cardio', 'Fitness tools', 'Work out your numbers.',
    'Three free calculators and a few plain guides. Nothing is saved and you do not need an account.') ?>

<!-- BMI -->
<section id="bmi" class="sec scroll-mt-16">
  <div class="wrap">
    <?= sec_head('Tool 01', 'BMI', 'Checks your weight against your height, and tells you what to do next.') ?>
    <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">
      <div class="float-card p-6 sm:p-8" data-up>
        <form class="grid gap-5" id="bmi-form">
          <div class="grid sm:grid-cols-2 gap-4">
            <div class="field"><label for="bmi-h">Height (cm)</label><input type="number" id="bmi-h" inputmode="decimal" step="0.1" placeholder="170" required></div>
            <div class="field"><label for="bmi-w">Weight (kg)</label><input type="number" id="bmi-w" inputmode="decimal" step="0.1" placeholder="72" required></div>
          </div>
          <button type="submit" class="btn btn-brand w-full sm:w-auto sm:justify-self-start">Calculate</button>
        </form>
        <div class="result" id="bmi-out" aria-live="polite"></div>
      </div>
      <div data-up data-d="1">
        <h3 class="h-sm">What BMI does and does not tell you</h3>
        <p class="body mt-3">BMI compares your weight to your height. It is a quick check, nothing more. It cannot tell muscle from fat, so someone who lifts can show as &ldquo;overweight&rdquo; while being perfectly healthy.</p>
        <p class="body mt-3">Use it as a starting point. Your waist measurement, how your clothes fit and your blood work all say more. If your BMI is above 30 or below 18.5, talk to a doctor as well as a trainer.</p>
        <figure class="media media-zoom aspect-[16/9] mt-6"><img src="assets/img/cardio-2.jpg" alt="Cardio area" loading="lazy"></figure>
      </div>
    </div>
  </div>
</section>

<!-- calories -->
<section id="calories" class="sec bg-bone text-ink on-bone scroll-mt-16">
  <div class="wrap">
    <?= sec_head('Tool 02', 'Calories and protein', 'How much to eat a day to lose fat, stay the same, or gain muscle.') ?>
    <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-start">
      <div class="lg:col-span-7 rounded-2xl border border-ink/10 bg-white p-6 sm:p-8" data-up>
        <form class="grid gap-5" id="cal-form">
          <div class="grid sm:grid-cols-3 gap-4">
            <div class="field"><label for="cal-sex">Sex</label><select id="cal-sex"><option value="m">Male</option><option value="f">Female</option></select></div>
            <div class="field"><label for="cal-age">Age</label><input type="number" id="cal-age" inputmode="numeric" placeholder="26" required></div>
            <div class="field"><label for="cal-h">Height (cm)</label><input type="number" id="cal-h" inputmode="decimal" step="0.1" placeholder="170" required></div>
          </div>
          <div class="grid sm:grid-cols-3 gap-4">
            <div class="field"><label for="cal-w">Weight (kg)</label><input type="number" id="cal-w" inputmode="decimal" step="0.1" placeholder="72" required></div>
            <div class="field"><label for="cal-act">Activity</label><select id="cal-act">
              <option value="1.2">Desk job, no exercise</option>
              <option value="1.375">Light, 1&ndash;2 days a week</option>
              <option value="1.55" selected>Moderate, 3&ndash;4 days</option>
              <option value="1.725">Hard, 5&ndash;6 days</option>
              <option value="1.9">Very hard or physical job</option>
            </select></div>
            <div class="field"><label for="cal-goal">Goal</label><select id="cal-goal">
              <option value="lose">Lose fat</option><option value="keep">Stay the same</option><option value="gain">Gain muscle</option>
            </select></div>
          </div>
          <button type="submit" class="btn btn-brand w-full sm:w-auto sm:justify-self-start">Calculate</button>
        </form>
        <div class="result" id="cal-out" aria-live="polite"></div>
      </div>
      <div class="lg:col-span-5" data-up data-d="1">
        <h3 class="h-sm">Eating on normal home food</h3>
        <p class="body mt-3">You do not need imported powders or a separate kitchen. Most people get where they want on the food already at home, in different amounts.</p>
        <div class="mt-5"><?= tick_list([
            'Put a protein in every meal: dal, curd, paneer, eggs, chicken or soya.',
            'Keep the roti and rice. Just measure them instead of guessing.',
            'Add a vegetable or salad to lunch and dinner so you feel full.',
            'Drink water, not sweet drinks. Most extra calories are liquid.',
            'Eat the same way six days out of seven. The seventh does not matter.',
        ], 'light') ?></div>
        <p class="text-sm text-ink/45 mt-5">General guidance, not medical advice. If you are pregnant, diabetic, on medication or managing a health condition, check with your doctor first.</p>
      </div>
    </div>
  </div>
</section>

<!-- one rep max -->
<section id="onerm" class="sec scroll-mt-16">
  <div class="wrap">
    <?= sec_head('Tool 03', 'One-rep max', 'Works out your max lift from a set you already did, and the weights to train with.') ?>
    <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">
      <div class="float-card p-6 sm:p-8" data-up>
        <form class="grid gap-5" id="rm-form">
          <div class="grid sm:grid-cols-2 gap-4">
            <div class="field"><label for="rm-w">Weight lifted (kg)</label><input type="number" id="rm-w" inputmode="decimal" step="0.5" placeholder="60" required></div>
            <div class="field"><label for="rm-r">Reps done</label><input type="number" id="rm-r" inputmode="numeric" min="1" max="12" placeholder="8" required></div>
          </div>
          <button type="submit" class="btn btn-brand w-full sm:w-auto sm:justify-self-start">Calculate</button>
        </form>
        <div class="result" id="rm-out" aria-live="polite"></div>
      </div>
      <div data-up data-d="1">
        <h3 class="h-sm">How to use these numbers</h3>
        <p class="body mt-3">Most of your training should sit between 70% and 85% of your max. Heavy enough to build muscle, light enough that your form holds for every rep.</p>
        <p class="body mt-3">Add weight when you can finish all your sets with a rep or two left. Two and a half kilos on a big lift is real progress and adds up over a few months.</p>
        <p class="text-sm text-white/35 mt-5">Never try a true one-rep max alone. Ask a trainer and use a spotter.</p>
      </div>
    </div>
  </div>
</section>

<!-- splits -->
<section class="sec bg-ink-2">
  <div class="wrap">
    <?= sec_head('Guides', 'Pick a weekly plan.', 'Three plans depending on how many days you can come in. Ask a trainer to fill in the sets and weights.') ?>
    <div class="grid md:grid-cols-3 gap-4 md:gap-5">
      <?php foreach (SPLITS as $i => [$d, $name, $rows]): ?>
        <div class="card overflow-hidden" data-up data-d="<?= $i + 1 ?>">
          <div class="bg-brand text-white px-5 py-3.5">
            <p class="font-display font-bold text-[1.05rem] leading-tight"><?= $d ?></p>
            <p class="text-xs text-white/80"><?= $name ?></p>
          </div>
          <?php foreach ($rows as [$k, $v]): ?>
            <div class="grid grid-cols-[76px_1fr] gap-3 px-5 py-3.5 border-t border-white/[0.07]">
              <span class="font-mono text-2xs uppercase tracking-label text-brand pt-0.5"><?= $k ?></span>
              <span class="text-[0.9rem] text-white/60"><?= $v ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- first week -->
<section class="sec">
  <div class="wrap grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
    <div class="lg:col-span-6" data-up>
      <figure class="media media-zoom aspect-[4/3]"><img src="assets/img/benches.jpg" alt="Bench area" loading="lazy"></figure>
    </div>
    <div class="lg:col-span-6">
      <?= kicker('First week') ?>
      <h2 class="h-lg mt-4 text-balance" data-up data-d="1">What happens on day one.</h2>
      <div class="mt-6" data-up data-d="2"><?= tick_list([
          'Bring shoes, a towel and a water bottle. That is all.',
          'A trainer shows you round and explains each machine.',
          'You get a starting routine, about 45 minutes.',
          'Expect to be sore for two or three days. That is normal.',
          'Come back the next day even if you are sore. Turning up matters more than going hard.',
      ]) ?></div>
      <p class="body mt-5" data-up data-d="3">The first month is about turning up. Three sessions a week for four weeks does more than one hard week followed by nothing.</p>
    </div>
  </div>
</section>

<!-- faq -->
<section class="sec bg-bone text-ink on-bone">
  <div class="wrap">
    <?= sec_head('Common questions', 'Straight answers.') ?>
    <?= faq_block(FAQ_FITNESS) ?>
    <p class="text-sm text-ink/45 mt-10 max-w-[68ch]" data-up>Everything on this page is general fitness information, not medical advice. If you have a health condition, are pregnant, or take medication, speak to your doctor before starting a new training or diet plan.</p>
  </div>
</section>

<?= cta_band('mural-deadlift-2.jpg', 'Put it into practice', 'The numbers are the easy part.',
    'Come in and a trainer will turn them into a plan you can follow. Free with your membership.',
    '<a href="index.php#offer" class="btn btn-brand">&#8377;' . OFFER['price'] . ' for 6 months ' . icon('arrow') . '</a>'
  . '<a href="tel:' . e(SITE['tel']) . '" class="btn btn-ghost">Call ' . SITE['tel_h'] . '</a>') ?>

</main>

<?php require __DIR__ . '/inc/footer.php'; ?>
