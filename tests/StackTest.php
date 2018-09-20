<?php

namespace Tests;


use DS\Stack\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{

    public function testPush()
    {
        $stack = new Stack(10);
        $stack->push(1);
        $stack->push(2);

        $this->assertSame(2, $stack->length());

    }

    public function testPop()
    {
        $stack = new Stack(10);
        $stack->push(1);
        $stack->push(2);

        $this->assertSame(2, $stack->pop());
        $this->assertSame(1, $stack->length());
    }

    public function testPeek()
    {
        $stack = new Stack(10);
        $stack->push(1);
        $stack->push(2);

        $this->assertSame(2, $stack->peek());
        $this->assertSame(2, $stack->length());
    }

}