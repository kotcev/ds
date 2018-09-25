<?php

namespace DS\Queue;


class Queue
{

    /**
     * @var \SplFixedArray
     */
    private $queue;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var int
     */
    private $count = 0;

    public function __construct($capacity = 1024)
    {
        $this->capacity = $capacity;

        $this->queue = new \SplFixedArray($capacity);
    }

    /**
     * Sets a waiting element.
     *
     * @param $data
     */
    public function enqueue($data)
    {
        $this->queue->offsetSet($this->count, $data);
        $this->count++;
    }

    /**
     * Returns the element at the front.
     *
     * @return mixed
     */
    public function dequeue()
    {
        $item = $this->queue->offsetGet(0);
        $this->queue->offsetUnset(0);

        for ($i = 1; $i <= $this->count; $i++) {
            $v = $this->queue->offsetGet($i);
            $this->queue->offsetSet($i - 1, $v);
            $this->queue->offsetUnset($i);
        }

        $this->count--;

        return $item;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @return int
     */
    public function length()
    {
        return $this->count;
    }

}