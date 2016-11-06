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
     'Moder' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Moder',
        'bizRule' => null,
        'data' => null
    ),
    'Moder1' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Moder1',
        'bizRule' => null,
        'data' => null
    ),

    'Admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Администратор',
        'children' => array(
            'director',         
           ),
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

