<?php
// datetime
if (ini_get('date.timezone') == '') {
    date_default_timezone_set('Europe/Brussels');
}

// parse headers
header('content-type: text/html;charset=utf-8');

// credentials
//define('KEY', '76163fc774cb42246d9de37cadeece8a');
//define('SECRET', 'fff975c5a8c7ba19ce92969c1879b211');
//define('SERVER', 'http://test.uitid.be/culturefeed/rest');

define('KEY', '6cec6660cd195d0b5735c78c87113b45');
define('SECRET', '125e49ee04944c397254cb470adea950');
define('SERVER', 'http://www.uitid.be/uitid/rest');


//Authorization: OAuth realm="http://www.uitid.be/uitid/rest/searchv2/search",oauth_consumer_key="6cec6660cd195d0b5735c78c87113b45",oauth_signature_method="HMAC-SHA1",oauth_timestamp="1406553308",oauth_nonce="ViIPNA",oauth_version="1.0",oauth_signature="dDP9P%2BlfRL7GuVZoguwCySEnKCI%3D"
