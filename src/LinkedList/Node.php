<?php

namespace DS\LinkedList;


class Node
{

    private $data;

    public $next;

    public function __construct($data, $next)
    {
        $this->data = $data;
        $this->next = $next;
    }

    public function getData()
    {
        return $this->data;
    }

}