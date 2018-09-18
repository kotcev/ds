<?php

require 'vendor/autoload.php';

$linkedList = new \DS\LinkedList\LinkedList();

for ($i = 0; $i < 10; $i++) {
    $linkedList->push($i);
}

$linkedList->delete(5);

echo '<pre>';
print_r($linkedList);