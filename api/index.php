<?php
declare(strict_types=1);

require_once __DIR__ . '/auth/session.php';

try {
    mulaiSesiAman();
    kirimJson([
        'berhasil' => true,
        'layanan' => 'StudyFlow API',
        'sesiAktif' => session_status() === PHP_SESSION_ACTIVE,
        'csrfToken' => tokenCsrf(),
    ]);
} catch (Throwable $kesalahan) {
    error_log('StudyFlow api/index.php: ' . $kesalahan->getMessage());
    kirimJson(['berhasil' => false, 'pesan' => 'Layanan API sedang bermasalah.'], 500);
}
