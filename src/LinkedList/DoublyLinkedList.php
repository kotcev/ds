<?php

namespace DS\LinkedList;


class DoublyLinkedList
{
    use LinkedListTrait;

    /**
     * Pushes element at the end of the list.
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
            $current->prev = $this->lastNode;
            $this->lastNode->next = $current;
            $this->lastNode = $current;
        }

        $this->length++;
    }

}