<?php

namespace WebDollar\Client\Methods;

/**
 * Class NodeWaitList
 * @package WebDollar\Client\Methods
 */
class NodeWaitList extends AbstractMethod
{
    /**
     * @return array
     */
    public function getList()
    {
        return $this->getRawResult();
    }
}
