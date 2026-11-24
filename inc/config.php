<?php
declare(strict_types=1);

/* ============================================================
   THE QUADS GYM — all site content lives here.
   Change something once in this file and it updates everywhere.
   ============================================================ */

const SITE = [
    'name'     => 'The Quads Gym',
    'url'      => 'https://thequadsfitness.com',
    'tel'      => '+917508864945',          // used in tel: links
    'tel_h'    => '+91 75088 64945',        // shown on screen
    'wa'       => 'https://wa.me/917508864945',
    // Leave blank to send enquiries straight to WhatsApp instead of email.
    'email'    => '',
    'addr'     => 'Ist Floor, 57-58C, near Shivalik Garden, Subhash Nagar, Manimajra, Chandigarh 160101',
    'addr_br'  => 'Ist Floor, 57-58C,<br>near Shivalik Garden, Subhash Nagar,<br>Manimajra, Chandigarh 160101',
    'city'     => 'Manimajra, Chandigarh',
    'hours'    => 'Mon to Sat, 5:00 AM &ndash; 10:00 PM',
    'closed'   => 'Closed Sunday',
    'instagram'=> 'https://www.instagram.com/',
    'facebook' => 'https://www.facebook.com/',
    'map_embed'=> 'https://www.google.com/maps?q=30.7203645,76.8381967&z=17&hl=en&output=embed',
    'map_link' => 'https://www.google.com/maps/dir/?api=1&destination=30.7203645%2C76.8381967',
];

/* The offer. Shown in the ticker, the offer block and the sticky phone bar. */
const OFFER = [
    'price'    => '4,999',
    'headline' => '6 months for &#8377;4,999.',
    'sub'      => 'That works out to about &#8377;833 a month, with everything included.',
    'terms'    => '6 months <span class="text-brand">+ 1 free month on hold</span>',
    'includes' => [
        'Gym and free weights',
        'Zumba and aerobics classes',
        'Cardio deck',
        'Turf and functional area',
        'A starting plan from a trainer',
        'No joining fee',
    ],
    'fine'     => 'Walk in any day, 5 AM to 10 PM. Limited period.',
];

/* ------------------------------------------------------------------
   MEMBERSHIP PLANS  —  PLACEHOLDER PRICES

   Only the 6-month figure is real: 4,999, the offer already running on
   the site. The other three prices, and every personal-training price
   below, are made up so the section has something to show.

   >>> Replace them with your real prices before the site goes live. <<<
   Nothing else needs touching — the section reads straight from here.
   ------------------------------------------------------------------ */

/* Shows the amber "sample prices" note on the plans section.
   Set to false once the real prices are in and the note disappears. */
const PLANS_ARE_SAMPLES = true;

const PLANS = [
    [
        'name'  => 'Monthly',
        'price' => '1,499',
        'per'   => 'per month',
        'rate'  => '',
        'note'  => 'Pay month to month. Stop whenever you like.',
        'badge' => '',
        'perks' => [
            'Gym, free weights and cardio',
            'Zumba and aerobics classes',
            'Turf and functional area',
            'A starting plan from a trainer',
        ],
    ],
    [
        'name'  => '3 months',
        'price' => '3,499',
        'per'   => 'for 3 months',
        'rate'  => '&#8377;1,166 a month',
        'note'  => 'The short commitment, for a season.',
        'badge' => '',
        'perks' => [
            'Everything in Monthly',
            'One body composition check',
            '15 days on hold if you travel',
        ],
    ],
    [
        'name'  => '6 months',
        'price' => '4,999',
        'per'   => 'for 6 months',
        'rate'  => '&#8377;833 a month',
        'note'  => 'The offer running now. No joining fee.',
        'badge' => 'Most popular',
        'perks' => [
            'Everything in 3 months',
            '1 free month on hold',
            'Diet guidance around home food',
            'Progress check every few weeks',
        ],
    ],
    [
        'name'  => '12 months',
        'price' => '8,999',
        'per'   => 'for 12 months',
        'rate'  => '&#8377;750 a month',
        'note'  => 'The cheapest way in, per month.',
        'badge' => 'Best rate',
        'perks' => [
            'Everything in 6 months',
            '2 free months on hold',
            'Two personal training sessions',
        ],
    ],
];

/* Personal training, charged on top of a membership. Sample prices. */
const PT_PLANS = [
    ['One session',        '600',    'to try it out'],
    ['12 sessions',        '6,000',  'about a month, 3 a week'],
    ['36 sessions',        '15,000', 'about three months'],
];

/* ------------------------------------------------------------------
   TRAINERS  —  PLACEHOLDER PEOPLE

   The gym has twelve trainers; these six are invented so the section
   has something to show. Swap in your real names, years and specialisms.

   'photo' is optional. Leave it '' and the card shows the initials in
   brand red; drop a file in assets/img/ and name it here to use a real
   photograph instead. Nothing else changes.
   ------------------------------------------------------------------ */
const TRAINERS_ARE_SAMPLES = true;

const TRAINERS = [
    [
        'name'  => 'Harman Singh',
        'role'  => 'Head coach',
        'years' => '11 years',
        'photo' => '',
        'tags'  => ['Strength', 'Powerlifting'],
        'line'  => 'Runs the weights floor. Good with beginners who are nervous about the squat rack.',
    ],
    [
        'name'  => 'Simran Kaur',
        'role'  => 'Studio lead',
        'years' => '7 years',
        'photo' => '',
        'tags'  => ['Zumba', 'Aerobics'],
        'line'  => 'Takes most of the evening classes. Keeps the room loud and the steps simple.',
    ],
    [
        'name'  => 'Vikas Rana',
        'role'  => 'Trainer',
        'years' => '9 years',
        'photo' => '',
        'tags'  => ['Fat loss', 'Cardio'],
        'line'  => 'Builds the circuits on the cardio deck and keeps an eye on the numbers.',
    ],
    [
        'name'  => 'Neha Bansal',
        'role'  => 'Trainer',
        'years' => '6 years',
        'photo' => '',
        'tags'  => ['Weight loss', 'Diet guidance'],
        'line'  => 'Plans around normal home food, not supplements and boiled chicken.',
    ],
    [
        'name'  => 'Amandeep Gill',
        'role'  => 'Trainer',
        'years' => '8 years',
        'photo' => '',
        'tags'  => ['Functional', 'Sport'],
        'line'  => 'Takes the turf lane. Works with players in for the off season.',
    ],
    [
        'name'  => 'Pooja Mehra',
        'role'  => 'Personal trainer',
        'years' => '10 years',
        'photo' => '',
        'tags'  => ['Personal training', 'Back from injury'],
        'line'  => 'Eases people back in after a knee or shoulder problem, at their pace.',
    ],
];

/* Navigation. Key = file, value = label. */
const NAV = [
    'index.php'    => 'Home',
    'about.php'    => 'About',
    'programs.php' => 'Programs',
    'fitness.php'  => 'Fitness',
    'gallery.php'  => 'Gallery',
    'contact.php'  => 'Contact',
];

/* Four things that are true about the gym, shown under the nav. */
const FACTS = [
    ['clock',  '5 AM &ndash; 10 PM, Mon&ndash;Sat'],
    ['music',  'Zumba &amp; aerobics included'],
    ['people', '12 trainers on the floor'],
    ['park',   'Free parking outside'],
];

/* Hero slideshow. ['image file', 'alt', 'crop position'] */
const HERO_SLIDES = [
    ['hero-machines.jpg', 'The machine floor',                    'object-[62%_center]'],
    ['hero-cardio.jpg',   'The cardio deck',                      'object-[72%_center]'],
    ['hero-wall.jpg',     'The bench press area at The Quads Gym','object-[78%_center]'],
    ['hero-racks.jpg',    'Squat racks and benches',              'object-[68%_center]'],
    ['hero-studio.jpg',   'The class studio',                     'object-[64%_center]'],
];

const HERO_STATS = [
    ['people2',  '5,000', '+',                                  'Members so far'],
    ['trophy',   '12',    '',                                   'Trainers'],
    ['clock2',   '17',    '<span class="text-[0.6em]">hrs</span>', 'Open a day'],
    ['calendar', '6',     '',                                   'Days a week'],
];

/* The six things you can do at the gym. */
const PROGRAMS = [
    'strength' => [
        'n' => '01', 'icon' => 'dumbbell',
        'title' => 'Weight training',
        'short' => 'Squat racks, Olympic bars, benches and a full dumbbell wall.',
        'lead'  => 'Build muscle and get stronger.',
        'img'   => 'orange-rack.jpg',
        'body'  => 'Squat racks, Olympic bars and plates, benches and a dumbbell wall. Your trainer writes down a plan with the weights and reps, then checks it every few weeks so you can see the numbers go up.',
        'list'  => ['Squat racks, Olympic bars and plates', 'Dumbbell wall plus machines', 'A written plan, checked regularly', 'Form corrected free of charge'],
        'tags'  => ['Beginners', 'Muscle', 'Powerlifting'],
    ],
    'cardio' => [
        'n' => '02', 'icon' => 'tread',
        'title' => 'Cardio and fat loss',
        'short' => 'Treadmills, cross trainers, cycles and a rowing machine.',
        'lead'  => 'Lose weight without a crash diet.',
        'img'   => 'cardio.jpg',
        'body'  => 'Treadmills, cross trainers, cycles and a rower, plus circuits on the floor. Your trainer sets targets around normal home food so the plan is one you can actually follow.',
        'list'  => ['Treadmills, cross trainers, cycles, rower', 'Circuit and interval training', 'Diet guidance around home food', 'Weight check every few weeks'],
        'tags'  => ['Weight loss', 'Stamina', 'Circuits'],
    ],
    'zumba' => [
        'n' => '03', 'icon' => 'music',
        'title' => 'Zumba',
        'short' => 'Dance classes in the studio with an instructor. No experience needed.',
        'lead'  => 'Dance cardio that does not feel like cardio.',
        'img'   => 'studio.jpg',
        'body'  => 'Instructor-led classes in the studio, with mirrors and a sound system. Most people walk in with no dance background. You pick up the steps in about a week.',
        'list'  => ['Instructor-led group classes', 'All levels, no experience needed', 'Separate studio, away from the weights', 'Included in your membership'],
        'tags'  => ['Group class', 'All levels', 'Included'],
    ],
    'aerobics' => [
        'n' => '04', 'icon' => 'heart',
        'title' => 'Aerobics',
        'short' => 'Low-impact classes. Easy on the knees, good for stamina.',
        'lead'  => 'Easy on the joints, good for stamina.',
        'img'   => 'aerobics-kit.jpg',
        'body'  => 'Low-impact classes that build endurance and keep you moving well. A good place to start if you are coming back after a break or want something kinder on the knees.',
        'list'  => ['Low impact and joint friendly', 'Builds stamina and mobility', 'Good after a long break', 'Included in your membership'],
        'tags'  => ['Low impact', 'Mobility', 'Included'],
    ],
    'functional' => [
        'n' => '05', 'icon' => 'bolt',
        'title' => 'Functional training',
        'short' => 'Turf lane, cables, kettlebells and ropes.',
        'lead'  => 'Training that helps outside the gym.',
        'img'   => 'turf-functional.jpg',
        'body'  => 'Turf lane, cables, kettlebells, ropes and bodyweight work, run as circuits. Built for athletes, for physical jobs, and for anyone who wants to be capable rather than just look it.',
        'list'  => ['Turf lane for sled work and carries', 'Cables, kettlebells and ropes', 'Circuit-style sessions', 'Sport conditioning on request'],
        'tags'  => ['Athletes', 'Power', 'Endurance'],
    ],
    'pt' => [
        'n' => '06', 'icon' => 'user',
        'title' => 'Personal training',
        'short' => 'One trainer, your own plan. Priced separately.',
        'lead'  => 'One trainer, your own plan.',
        'img'   => 'machine-floor-3.jpg',
        'body'  => 'The quickest route if you have a date to hit, or if you want to stop guessing. Your trainer builds the plan around your schedule, any injuries and your food, and changes it as you go.',
        'list'  => ['A plan built only for you', 'Diet plan around your routine', 'Every session supervised', 'One and three month packages'],
        'tags'  => ['One to one', 'Custom plan', 'Costs extra'],
    ],
];

/* What the 2026 rebuild added. */
const FACILITY = [
    ['Weights floor',  'Squat racks, Olympic bars and plates, benches, and a dumbbell wall going up to the heavy end. Enough space that you are not waiting at 7 PM.'],
    ['Machines',       'Pin-loaded and plate-loaded stations for every muscle group, grouped so you can finish a session without crossing the room.'],
    ['Cardio deck',    'Treadmills, cross trainers, cycles and a rower. All working, all serviced.'],
    ['Class studio',   'A separate mirrored room with its own sound system for Zumba and aerobics, so classes never spill into the weights area.'],
    ['Turf lane',      'An artificial grass lane for sled pushes, carries, ropes and circuits.'],
    ['Changing rooms', 'Lockers, clean washrooms and showers. Come straight from work.'],
];

/* Photo tiles on the home page. ['file', 'caption', 'extra grid classes'] */
const HOME_TILES = [
    ['dumbbells-2.jpg',    'Dumbbell wall', 'col-span-2 row-span-2'],
    ['benches.jpg',        'Benches',       ''],
    ['mural-deadlift.jpg', 'The mural',     ''],
    ['cardio-3.jpg',       'Cardio deck',   'col-span-2'],
    ['machines.jpg',       'Machines',      'col-span-2'],
    ['plates.jpg',         'Plates',        'col-span-2'],
];

/* Full gallery. ['file', 'caption', 'grid span'] */
const GALLERY = [
    ['brand-wall.jpg',      'The wall',        'col-span-2 row-span-2'],
    ['dumbbells.jpg',       'Dumbbell wall',   'row-span-2'],
    ['reception.jpg',       'Reception',       ''],
    ['machines.jpg',        'Machines',        ''],
    ['mural-deadlift.jpg',  'The mural',       'row-span-2'],
    ['studio.jpg',          'Class studio',    ''],
    ['cardio.jpg',          'Cardio deck',     ''],
    ['rack-turf.jpg',       'Racks and turf',  'col-span-2'],
    ['dumbbells-2.jpg',     'Free weights',    ''],
    ['benches.jpg',         'Benches',         ''],
    ['machine-floor.jpg',   'Machine floor',   'col-span-2'],
    ['aerobics-kit.jpg',    'Aerobics kit',    ''],
    ['cardio-3.jpg',        'Treadmills',      ''],
    ['orange-rack.jpg',     'Power racks',     'row-span-2'],
    ['plates.jpg',          'Plates',          ''],
    ['turf-lane.jpg',       'Turf lane',       ''],
    ['machines-2.jpg',      'Machines',        'col-span-2'],
    ['benches-2.jpg',       'Bench stations',  ''],
    ['floor-wide.jpg',      'Main floor',      ''],
    ['dumbbells-3.jpg',     'Dumbbells',       ''],
    ['rack-turf-2.jpg',     'Racks',           'col-span-2'],
    ['machines-3.jpg',      'Machines',        ''],
    ['turf-lane-2.jpg',     'Turf',            'col-span-2'],
    ['machine-floor-3.jpg', 'Machine floor',   ''],
    ['mural-deadlift-2.jpg','The mural',       ''],
    ['reception-2.jpg',     'Front desk',      'col-span-2'],
    ['brand-wall-tall.jpg', 'The Quads Gym',   'row-span-2'],
    ['dumbbell-row.jpg',    'Dumbbell row',    'col-span-2'],
    ['cardio-2.jpg',        'Cardio',          ''],
];

const FAQ_HOME = [
    ['What are the timings?', 'Open 5:00 AM to 10:00 PM, Monday to Saturday. Closed Sunday. Busiest before 8 AM and after 6 PM. Between 11 AM and 4 PM the floor is nearly empty.'],
    ['What does &#8377;4,999 cover?', 'Six months of membership, plus one month you can put on hold whenever you need it. It covers the gym, cardio, turf area and all classes including Zumba and aerobics. Personal training is the only thing charged separately.'],
    ['Can I pause my membership?', 'Yes, one month free. Tell us at the desk before you travel and we stop the clock.'],
    ['I have never trained before. Is that a problem?', 'No. On your first day a trainer shows you around, explains each machine and writes you a simple routine. Most of our members started with no experience.'],
    ['Do you have personal training?', 'Yes. One trainer, your own plan and diet, every session supervised. Sold in one and three month packages. Call for the current price.'],
    ['Is there a ladies batch?', 'Women train on the main floor through the day, and the studio runs separate Zumba and aerobics batches. Call us for this week&rsquo;s timings.'],
    ['What should I bring?', 'Training shoes, a towel and a water bottle. Lockers and changing rooms are there if you are coming from work.'],
];

const FAQ_FITNESS = [
    ['How long before I see results?', 'You will feel stronger and sleep better in two to three weeks. Visible change usually takes eight to twelve weeks of steady training and eating.'],
    ['Do I need supplements?', 'No. Food first. If you cannot hit your protein target from meals, a basic whey protein helps. Nothing else is needed.'],
    ['Cardio or weights for fat loss?', 'Both, with weights first. Weights keep your muscle while you lose fat, so you look better at the same weight. Cardio and daily walking burn the extra calories.'],
    ['Is it bad to train every day?', 'Muscles grow while you rest. Three to five sessions a week with rest days works better than seven. Walk on the off days if you want to move.'],
    ['I am over 50. Is weight training safe?', 'Yes, and it is one of the best things you can do for bone strength and balance. We start you on machines with light weight. Tell us about any medical condition and clear it with your doctor.'],
    ['Will lifting make women bulky?', 'No. Building a lot of muscle takes years of deliberate effort and a lot of food. Lifting will make you stronger and more toned.'],
];

const FAQ_CONTACT = [
    ['Do I need to book?', 'No. Walk in any time between 5 AM and 10 PM, Monday to Saturday. Someone will show you around.'],
    ['What should I bring on day one?', 'Training shoes, a towel and a water bottle. Lockers and changing rooms are available.'],
    ['Can I pay in instalments?', 'Talk to us at the desk and we will tell you what is possible for the plan you want. Nothing gets added later.'],
    ['What are the Zumba and aerobics timings?', 'They change through the year. Call or WhatsApp and we will send the current schedule.'],
    ['Do you offer a trial?', 'Come in, look around and talk to a trainer at no cost. Ask at the desk about trying a session.'],
];

/* Options in the contact form. */
const ENQUIRY_GOALS = [
    'Membership and the ₹4,999 offer',
    'Weight training',
    'Weight loss',
    'Zumba classes',
    'Aerobics classes',
    'Functional training',
    'Personal training',
    'Class timings',
];
