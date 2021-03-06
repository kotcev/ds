<?php

namespace DS\Stack;


class Stack
{
    /**
     * @var int
     */
    private $capacity;

    /**
     * @var \SplFixedArray
     */
    private $stack;

    /**
     * @var int
     */
    private $count = 0;

    public function __construct($capacity = 1024)
    {
        $this->capacity = $capacity;
        $this->stack = new \SplFixedArray($this->capacity);
    }

    /**
     * Push new element at the top of the stack.
     * Complexity: O(1)
     *
     * @param $data
     */
    public function push($data)
    {
        $this->stack->offsetSet($this->count, $data);

        $this->count++;
    }

    /**
     * Get and remove the last element.
     * Complexity: O(1)
     *
     * @return mixed
     */
    public function pop()
    {
        $idx = $this->count - 1;

        $popped = $this->stack->offsetGet($idx);

        $this->stack->offsetUnset($idx);

        $this->count--;

        return $popped;
    }

    /**
     * Get the last element without removing it.
     * Complexity: O(1)
     *
     * @return mixed
     */
    public function peek()
    {
        return $this->stack->offsetGet($this->count - 1);
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