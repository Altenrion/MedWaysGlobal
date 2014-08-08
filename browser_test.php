<?




$body_browser_class = '';
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') ) $body_browser_class = 'firefox';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) $body_browser_class = 'chrome';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') ) $body_browser_class = 'safari';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') ) $body_browser_class = 'opera';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') ) $body_browser_class = 'ie6';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') ) $body_browser_class = 'ie7';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') ) $body_browser_class = 'ie8';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.0') ) $body_browser_class = 'ie9';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.0') ) $body_browser_class = 'ie10';
elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7') ) $body_browser_class = 'ie11';

echo $body_browser_class;
?>