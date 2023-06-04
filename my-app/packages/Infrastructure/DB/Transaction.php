<?php

declare(strict_types=1);

namespace Packages\Infrastructure\DB;

use Closure;
use Illuminate\Support\Facades\DB;
use Packages\Domain\TransactionInterface;

class Transaction implements TransactionInterface
{
    /**
     * @param Closure $transactionScope
     * @return mixed
     */
    public function scope(Closure $transactionScope): mixed
    {
        return DB::transaction($transactionScope);
    }
}
