<?php

namespace Tests;


use DS\Queue\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    public function testEnqueue()
    {
        $queue = new Queue(10);
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);
        $queue->enqueue(4);

        $this->assertSame(4, $queue->length());
    }

    public function testDequeue()
    {
        $queue = new Queue(10);
        $queue->enqueue(1);
        $queue->enqueue(2);
        $queue->enqueue(3);
        $queue->enqueue(4);

        $item = $queue->dequeue();

        $this->assertSame(3, $queue->length());
        $this->assertSame(1, $item);
    }

}