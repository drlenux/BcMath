# BcMath Factory

```php
<?php

use DrLenux\BcMath\BcMathFactory;

BcMathFactory::instance()->bcscale(2);

echo BcMathFactory::instance()->bcadd(1.234, 1.234);
// return 2.46
```