<?php
$array_request_uri = explode("/", $_SERVER['REQUEST_URI']);
define('NAME_PROJECT', $array_request_uri[1]);

define('_WEB_ROOT_PATH','http://' . $_SERVER['HTTP_HOST'] . '/' . NAME_PROJECT);
define('_PUBLIC_PATH', _WEB_ROOT_PATH . '/public');
define('_UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . NAME_PROJECT .'/upload');

define('_AVATAR_PATH', _WEB_ROOT_PATH . '/upload/avt/');
define('_IMG_PRODUCT_PATH', _WEB_ROOT_PATH . '/upload/product/');

define('CONTROLLER_PATH',__DIR__ . '/controllers/');
define('CORE_PATH',__DIR__ . '/core/');
define('MODEL_PATH',__DIR__ . '/models/');
define('VIEW_PATH', __DIR__ . '/views/');
define('HELPER_PATH', __DIR__ . '/helper/');
define('VIEW_PAGE_PATH', VIEW_PATH . 'pages/');

function getNameUserGroup($gr_id)
{
    $name = '';
    switch ($gr_id) {
        case 1:
            $name = 'Admin';
            break;

        default:
            $name = 'Client';
            break;
    }
    return $name;
}

// Process URL from browser
require_once CORE_PATH . "App.php";

// How controllers call Views & Models
require_once CORE_PATH . "Controller.php";

// Connect Database
require_once CORE_PATH . "DB.php";

require_once HELPER_PATH . "show_array.php";

require_once HELPER_PATH . "getNameCate.php";

require_once HELPER_PATH . "format_money.php";

require_once HELPER_PATH . "redirecTo.php";

require_once HELPER_PATH . "getStatusBill.php";

?>
