<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$APPLICATION->IncludeComponent(
    'bitrix:form.result.new',
    '.default',
    array(
        'WEB_FORM_ID' => $arParams['WEB_FORM_ID'],
        'SHOW_ANSWER_VALUE' => 'Y',
        'SHOW_ADDITIONAL' => 'Y',
        'USE_EXTENDED_ERRORS' => 'Y',
        'LIST_URL' => '',
        'EDIT_URL' => '',
        'SUCCESS_URL' => '',
        'CACHE_TYPE' => $arParams['USE_CACHE'],
        'CACHE_TIME' => 3600,
        'VARIABLE_ALIASES' => array(
            'LIST_ID' => 'WEB_FORM_ID',
            'RESULT_ID' => 'RESULT_ID'
        )
    )
);

?>