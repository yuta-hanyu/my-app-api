<?php

declare(strict_types=1);

namespace Packages\Domain\Commons;

class SingleIntValueObject
{
    /**
     * @param int $value
     */
    public function __construct(private int $value)
    {
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
