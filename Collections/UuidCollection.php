<?php

declare(strict_types = 1);

namespace Workshop\Collections;

use Workshop\ValueObjects\Uuid;

class UuidCollection implements \IteratorAggregate, \Countable
{
    private
        $uuids;

    public function __construct(iterable $uuids = [])
    {
        $this->uuids = [];

        foreach($uuids as $uuid)
        {
            if($uuid instanceof Uuid)
            {
                $this->add($uuid);
            }
        }
    }

    public function add(Uuid $uuid): self
    {
        $this->uuids[] = $uuid;

        return $this;
    }

    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->uuids);
    }

    public function count(): int
    {
        return count($this->uuids);
    }

    public function contains(Uuid $needle): bool
    {
        foreach($this->uuids as $uuid)
        {
            if($uuid->equals($needle))
            {
                return true;
            }
        }

        return false;
    }
}