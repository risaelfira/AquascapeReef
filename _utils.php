<?php

// Kunci enkripsi (jangan hardcode di produksi)
define('ENCRYPTION_KEY', 'your-32-char-secret-key-1234567890'); // 32 karakter
define('ENCRYPTION_IV', '1234567890123456'); // 16 karakter

function encrypt($data) {
    return openssl_encrypt($data, 'AES-256-CBC', ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}

function decrypt($data) {
    return openssl_decrypt($data, 'AES-256-CBC', ENCRYPTION_KEY, 0, ENCRYPTION_IV);
}
