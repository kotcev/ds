<?php

namespace DS\LinkedList;


trait LinkedListTrait
{

    /**
     * @var Node
     */
    private $firstNode;

    /**
     * @var Node
     */
    private $lastNode;

    /**
     * @var int
     */
    private $length;

    public function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->length = 0;
    }

}