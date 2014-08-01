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

