<?php

if ($_SERVER['argc'] <= 1) {
    fwrite(STDERR, "Usgae: {$_SERVER['argv'][0]} filename.php\n");
    exit(1);
}

foreach (token_get_all(file_get_contents($_SERVER['argv'][1])) as $idx => $token) {
    if (is_string($token)) {
        printf("% 4d: '%s'\n", $idx, $token);
        continue;
    }
    if (!getenv('WS') && ($token[0] === T_WHITESPACE)) continue;
    printf("% 4d: %s: %s\n", $idx, token_name($token[0]), $token[1]);
}

