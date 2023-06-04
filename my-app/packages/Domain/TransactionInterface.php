<?php

declare(strict_types=1);

namespace Packages\Domain;

use Closure;

interface TransactionInterface
{
    /**
     * @param Closure $transactionScope
     * @return mixed
     */
    public function scope(Closure $transactionScope): mixed;
}
