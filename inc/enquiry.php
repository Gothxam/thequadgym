<?php
declare(strict_types=1);

/* ============================================================
   Contact form handling.
   Runs before any HTML is sent so it can redirect.

   If SITE['email'] is set the enquiry is emailed there.
   If it is blank the visitor is forwarded to WhatsApp with the
   message already written out — so the form works either way.
   ============================================================ */

require_once __DIR__ . '/config.php';

/** @var array<string,string> filled in on error so the form can be redrawn */
$old    = ['name' => '', 'phone' => '', 'goal' => '', 'message' => ''];
$errors = [];
$sent   = isset($_GET['sent']);

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {

    // Bots fill hidden fields in; people do not.
    if (trim((string) ($_POST['website'] ?? '')) !== '') {
        header('Location: contact.php?sent=1');
        exit;
    }

    $old['name']    = trim((string) ($_POST['name'] ?? ''));
    $old['phone']   = trim((string) ($_POST['phone'] ?? ''));
    $old['goal']    = trim((string) ($_POST['goal'] ?? ''));
    $old['message'] = trim((string) ($_POST['message'] ?? ''));

    if (mb_strlen($old['name']) < 2 || mb_strlen($old['name']) > 80) {
        $errors['name'] = 'Please tell us your name.';
    }
    $digits = preg_replace('/\D+/', '', $old['phone']) ?? '';
    if (strlen($digits) < 7 || strlen($digits) > 15) {
        $errors['phone'] = 'Please enter a phone number we can call back on.';
    }
    if (!in_array($old['goal'], ENQUIRY_GOALS, true)) {
        $old['goal'] = ENQUIRY_GOALS[0];
    }
    if (mb_strlen($old['message']) > 2000) {
        $errors['message'] = 'That message is a bit long — 2000 characters maximum.';
    }

    if (!$errors) {
        $lines = [
            'Name: '          . $old['name'],
            'Phone: '         . $old['phone'],
            'Interested in: ' . $old['goal'],
        ];
        if ($old['message'] !== '') {
            $lines[] = 'Message: ' . $old['message'];
        }

        if (SITE['email'] !== '') {
            $body = "New enquiry from the website\n\n" . implode("\n", $lines)
                  . "\n\nSent " . date('d M Y, g:i a');
            // Keep the From header on our own domain; reply-to is useless
            // here because we collect a phone number, not an email.
            $headers = 'From: ' . SITE['name'] . ' <no-reply@' . parse_url(SITE['url'], PHP_URL_HOST) . ">\r\n"
                     . "Content-Type: text/plain; charset=UTF-8\r\n";
            @mail(SITE['email'], 'Website enquiry — ' . $old['name'], $body, $headers);
            header('Location: contact.php?sent=1#enquiry');
            exit;
        }

        // No mailbox configured: hand the whole thing to WhatsApp.
        $text = "Hi The Quads Gym!\n\n" . implode("\n", $lines);
        header('Location: ' . SITE['wa'] . '?text=' . rawurlencode($text));
        exit;
    }
}
