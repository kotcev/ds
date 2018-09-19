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
     * Displays the list data as php-array.
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

    /**
     * Big O notation: O(n)
     *
     * @param $search
     * @return Node|DoublyLinkedListNode|null
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
     * @param $data
     * @param null $next
     * @return DoublyLinkedListNode|Node
     */
    private function createNode($data, $next = NULL)
    {
        if ($this instanceof LinkedList) {
            $current = new Node($data, $next);
        } else {
            $current = new DoublyLinkedListNode($data, $next);
        }

        return $current;
    }

}