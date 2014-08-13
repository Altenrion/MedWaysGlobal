<?php

return array(
    'Guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'guest',
        'bizRule' => null,
        'data' => null
    ),
    
    'User' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'guest',
        ),
        'bizRule' => null,
        'data' => null
    ),
    
    'Manager' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Manager',

        'bizRule' => null,
        'data' => null
    ),
    'Exp' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Manager',

        'bizRule' => null,
        'data' => null
    ),
    'Exp1' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Manager',

        'bizRule' => null,
        'data' => null
    ),
    'Exp2' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Manager',

        'bizRule' => null,
        'data' => null
    ),
    'Exp3' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Manager',

        'bizRule' => null,
        'data' => null
    ),
    
    'Dev' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Девелопер',
        'children' => array(
            'director',         
           ),
        'bizRule' => null,
        'data' => null
    ),
);

