<?php

use PHPUnit\Framework\TestCase;
use DS\LinkedList\LinkedList;

class LinkedListTest extends TestCase
{

    /**
     * @test
     */
    public function testPush()
    {
        $linkedList = new LinkedList();

        $this->assertSame(0, $linkedList->getLength());

        for ($i = 0; $i < 10; $i++) {
            $linkedList->push($i);
        }

        $this->assertSame(10, $linkedList->getLength());
    }

    /**
     * @test
     */
    public function testSearch()
    {
        $linkedList = new LinkedList();
        for ($i = 0; $i < 10; $i++) {
            $linkedList->push($i);
        }

        $this->assertNotNull($linkedList->search(6));
    }

    /**
     * @test
     */
    public function testInsert()
    {
        $linkedList = new LinkedList();
        $linkedList->push(1);
        $linkedList->push(5);

        $this->assertSame(2, $linkedList->getLength());

        $linkedList->insert(1, 2);

        $this->assertSame(3, $linkedList->getLength());
        $this->assertNotNull($linkedList->search(2));
    }

    /**
     * @test
     */
    public function testRemove()
    {
        $linkedList = new LinkedList();
        $linkedList->push(1);
        $linkedList->push(5);

        $this->assertSame(2, $linkedList->getLength());

        $linkedList->remove(5);

        $this->assertSame(1, $linkedList->getLength());
        $this->assertSame(1, $linkedList->getLastNode()->getData());
    }

    /**
     * @test
     */
    public function testDisplay()
    {
        $linkedList = new LinkedList();
        $linkedList->push(1);
        $linkedList->push(5);
        $linkedList->push(3);
        $linkedList->push(15);

        $list = $linkedList->display();

        $this->assertSame([1,5,3,15], $list);
    }

}