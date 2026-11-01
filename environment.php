<?php
// Local .env uses PHP INI syntax: quote values containing punctuation.
function localConfig($name) {
    $value = getenv($name);
    if ($value === false) {
        static $fileValues = null;
        if ($fileValues === null) {
            $file = __DIR__ . '/.env';
            $fileValues = is_file($file) ? parse_ini_file($file, false, INI_SCANNER_RAW) : array();
            if ($fileValues === false) throw new RuntimeException('Invalid local configuration');
        }
        $value = isset($fileValues[$name]) ? $fileValues[$name] : null;
    }
    if (!is_string($value) || trim($value) === '') throw new RuntimeException('Missing configuration: ' . $name);
    return $value;
}

// Optional compatibility check for an existing local legacy database; disabled by default.
function legacyInitialPasswordHash() {
    try { return sha1(localConfig('LEGACY_INITIAL_PASSWORD')); }
    catch (RuntimeException $e) { return null; }
}
