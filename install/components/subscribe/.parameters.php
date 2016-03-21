<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$module_id = 'unisender.integration';
$API_KEY = COption::GetOptionString($module_id, 'UNISENDER_API_KEY');
if (empty($API_KEY) || !CModule::IncludeModule($module_id)) {
    return ShowError(GetMessage('UNISENDER_MODULE_NOT_AVAILABLE'));
}

$API = new UniAPI($API_KEY);
$lists = $API->getLists();
$preparedLists = array();
foreach ($lists as $list) {
    $preparedLists[$list['id']] = $list['title'] . '(' . $list['id'] . ')';
}

CModule::IncludeModule('form');
$rsForms = CForm::GetList($by = 's_id', $order = 'desc', array(), $is_filtered);
$preparedForms = array();
while ($arForm = $rsForms->Fetch()) {
    $preparedForms[$arForm['ID']] = $arForm['NAME'] . '(' . $arForm['SID'] . ')';
}

$arComponentParameters = array(
    'GROUPS' => array(),
    'PARAMETERS' => array(
        'AJAX_MODE' => array(
            'PARENT' => 'AJAX_SETTINGS',
            'NAME' => GetMessage('UNISENDER_AJAX_MODE'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y'
        ),
        'USE_CACHE' => array(
            'PARENT' => 'CACHE_SETTINGS',
            'NAME' => GetMessage('UNISENDER_USE_CACHE'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y'
        ),
        'LIST_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('UNISENDER_LIST'),
            'TYPE' => 'LIST',
            'VALUES' => $preparedLists
        ),
        'WEB_FORM_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('UNISENDER_FORM'),
            'TYPE' => 'LIST',
            'VALUES' => $preparedForms
        )
    )
);

?>
