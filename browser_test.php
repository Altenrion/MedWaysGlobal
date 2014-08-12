<?

//var_dump(__DIR__);


$user_agent = '';

    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') ) $user_agent = 'Yes';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) $user_agent = 'Yes';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') ) $user_agent = 'Yes';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') ) $user_agent = 'Yes';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') ) $user_agent = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') ) $user_agent = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') ) $user_agent = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.0') ) $user_agent = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.0') ) $user_agent = 'Yes';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7') ) $user_agent = 'no';


switch ($user_agent){
    case 'no' :
        header( 'Location:http://medways.altenrion.ru/IE.html' );
        break;
    case 'Yes':
        continue;
        break;


}

?>