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
    
    'Moderator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Moderator',
        'children' => array(
            'ProjectManager',
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

