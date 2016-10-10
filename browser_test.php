<?


    $user_agent = '';
    $cli = '';

    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )           { $user_agent = 'Yes';  $cli = 'Firefox';   }
    elseif( strpos($_SERVER['HTTP_USER_AGENT'], 'OPR'))             { $user_agent = 'Yes';  $cli = 'Opera';     }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') )         { $user_agent = 'Yes';  $cli = 'Opera';     }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') )        { $user_agent = 'Yes';  $cli = 'Chrome';    }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') )        { $user_agent = 'Yes';  $cli = 'Safari';    }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') )      { $user_agent = 'no';   $cli = 'MSIE6';     }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') )      { $user_agent = 'no';   $cli = 'MSIE7';     }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') )      { $user_agent = 'no';   $cli = 'MSIE8';     }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.0') )      { $user_agent = 'no';   $cli = 'MSIE9';     }
    elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.0') )     { $user_agent = 'Yes';  $cli = 'MSIE10';    }
    else{ $user_agent = 'Yes';   $cli = 'Others'; }

    if($user_agent == 'no'){ header( 'Location:http://Vuznauka2017.ru/IE.html' ); }

