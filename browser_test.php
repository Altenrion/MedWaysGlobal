<?

//var_dump(__DIR__);


$body_browser_class = '';
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') ) $body_browser_class = 'firefox';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) $body_browser_class = 'chrome';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') ) $body_browser_class = 'safari';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') ) $body_browser_class = 'opera';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') ) $body_browser_class = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') ) $body_browser_class = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') ) $body_browser_class = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.0') ) $body_browser_class = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.0') ) $body_browser_class = 'no';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7') ) $body_browser_class = 'no';


switch ($body_browser_class){
    case 'no' :
        header( 'Location: http://google.ru/search?q=современные браузеры' );
        break;
    case 'chrome':
        header( 'Location: http://medways.altenrion.ru', true, 303 );
        break;


}

?>