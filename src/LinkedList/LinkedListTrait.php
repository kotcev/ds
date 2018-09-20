<?php

namespace DS\LinkedList;


trait LinkedListTrait
{
    /**
     * @var Node|DoublyLinkedListNode
     */
    private $firstNode;

    /**
     * @var Node|DoublyLinkedListNode
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
     * @return Node|DoublyLinkedListNode|null
     */
    public function getFirstNode()
    {
        return $this->firstNode;
    }

    /**
     * @return Node|DoublyLinkedListNode|null
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
     * Complexity: O(n)
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
     * Searches for a given value.
     * Complexity: O(n)
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
     * Deletes element from the list.
     * Complexity: O(n)
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
     * Creates a new node.
     *
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