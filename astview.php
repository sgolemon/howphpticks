<?php

require __DIR__ . '/astkit-dump.php';

if ($_SERVER['argc'] <= 1) {
    fwrite(STDERR, "Usage: {$_SERVER['argv'][0]} filename.php\n");
    exit(1);
}

if (!extension_loaded('astkit')) {
    fwrite(STDERR, "AstKit is not installed\n");
    exit(1);
}

astkit_dump(AstKit::parseFile($_SERVER['argv'][1]));
