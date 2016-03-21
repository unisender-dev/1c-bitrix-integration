<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$module_id = 'unisender.integration';
$API_KEY = COption::GetOptionString($module_id, 'UNISENDER_API_KEY');

if (!empty($API_KEY) && CModule::IncludeModule($module_id)) {
    $arComponentDescription = array(
        'NAME' => GetMessage('UNISENDER_SUBSCRIBE_FORM_TITLE'),
        'DESCRIPTION' => GetMessage('UNISENDER_SUBSCRIBE_FORM_DESCRIPTION'),
        'ICON' => '/images/icon.png',
        'PATH' => array(
            'ID' => 'service',
            'CHILD' => array(
                'ID' => 'unisender.integration',
                'NAME' => GetMessage('UNISENDER_SUBSCRIBE_TITLE'),
                'CHILD' => array(
                    'ID' => 'unisender.integration.subscribe',
                    'NAME' => GetMessage('UNISENDER_SUBSCRIBE_FORM_TITLE'),
                )
            )
        )
    );
}

?>

