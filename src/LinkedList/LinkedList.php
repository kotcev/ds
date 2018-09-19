<?php

namespace DS\LinkedList;


class LinkedList
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

    /**
     * @return Node|null
     */
    public function getFirstNode()
    {
        return $this->firstNode;
    }

    /**
     * @return Node|null
     */
    public function getLastNode()
    {
        return $this->lastNode;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Complexity: O(1)
     *
     * @param $data
     */
    public function push($data)
    {
        $current = new Node($data, NULL);

        if ( ! $this->length) {
            $this->firstNode = $current;
            $this->lastNode = $current;
        } else {
            $this->lastNode->next = $current;
            $this->lastNode = $current;
        }

        $this->length++;
    }

    /**
     * Big O notation: O(n)
     *
     * @param $search
     * @param $data
     */
    public function insert($search, $data)
    {
        $current = new Node($data, NULL);
        $found = $this->search($search);

        if ($found) {
            $current->next = &$found->next;
            $found->next = &$current;
            $this->length++;
        } else {
            $this->push($data);
        }
    }

    /**
     * Big O notation: O(n)
     *
     * @param $search
     * @return bool
     */
    public function remove($search)
    {
        $current = $this->firstNode;
        $lastIterationNode = $this->firstNode;
        $found = NULL;

        for ($i = 0; $i < $this->length; $i++) {

            if ($current->getData() == $search) {
                $found = $current;
                break;
            } else {
                $lastIterationNode = $current;
            }

            $current = $current->next;
        }

        if ($found) {
            if ($found === $this->lastNode) {
                $this->lastNode = $lastIterationNode;
            }

            $lastIterationNode->next = $found->next;
            $this->length--;
            return true;
        }

        return false;
    }

    /**
     * Big O notation: O(n)
     *
     * @param $search
     * @return Node|null
     */
    public function search($search)
    {
        $current = $this->firstNode;

        for ($i = 0; $i < $this->length; $i++) {
            if ($current->getData() == $search) {
                return $current;
            }

            $current = $current->next;
        }

        return NULL;
    }

    /**
     * Basically converts the list to php-array.
     *
     * @return array
     */
    public function display()
    {
        $list = array();
        $current = $this->firstNode;

        for ($i = 0; $i < $this->length; $i++) {
            $list[] = $current->getData();
            $current = $current->next;
        }

        return $list;
    }

}