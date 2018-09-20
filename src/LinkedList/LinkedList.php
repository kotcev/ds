<?php

namespace DS\LinkedList;


class LinkedList
{
    use LinkedListTrait;

    /**
     * Adds new element at the end of the list.
     * Complexity: O(1)
     *
     * @param $data
     */
    public function push($data)
    {
        $current = $this->createNode($data);

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
     * Inserts new element after the given index.
     * Complexity: O(n)
     *
     * @param $search
     * @param $data
     */
    public function insert($search, $data)
    {
        $current = $this->createNode($data);

        $found = $this->search($search);

        if ($found) {
            $current->next = $found->next;
            $found->next = $current;

            $this->length++;
        } else {
            $this->push($data);
        }
    }

}