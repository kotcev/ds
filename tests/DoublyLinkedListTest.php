<?php

namespace Tests;


use DS\LinkedList\DoublyLinkedList;
use PHPUnit\Framework\TestCase;

class DoublyLinkedListTest extends TestCase
{

    public function testPush()
    {
        $list = new DoublyLinkedList();
        $list->push(1);
        $list->push(2);
        $list->push(3);

        $this->assertSame(3, $list->getLength());
    }

}