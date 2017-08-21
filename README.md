# Basic tools for exploring PHP compilation

## token\_get\_all.php

Displays the token stream from parsing a file:

```
$ php token_get_all.php somefile.php
```

```
  0: T_OPEN_TAG: <?php
  2: T_ECHO: echo
  4: T_CONSTANT_ENCAPSED_STRING: 'Hello world!\n'
  5: ';'
```

Note that whitespace is omitted by default, to include whitespace, set `WS=1` in the local env.

```
$ WS=1 php token_get_all.php somefile.php
```

```
  0: T_OPEN_TAG: <?php
  1: T_WHITESPACE:
  2: T_ECHO: echo
  3: T_WHITESPACE:
  4: T_CONSTANT_ENCAPSED_STRING: 'Hello world!\n'
  5: ';'
```

## astview.php

Dump an AST tree:

```
$ php astview.php somefile.php
```

```
ZEND_AST_STMT_LIST
  ZEND_AST_ECHO
    ZEND_AST_ZVAL string(12) "Hello+World!"
```

## phpdbg -p\*

To dump opcodes, use phpdbg provided with PHP:

```
$ phpdbg -p* somefile.php
```

```
function name: (null)
L1-1 {main}() howphpticks/hello.php - 0x7d279984e000 + 2 ops
L3  #0  ECHO          "Hello world!"
L3  #1  RETURN
```
