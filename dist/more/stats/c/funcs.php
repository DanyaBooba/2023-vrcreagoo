<?php
function TextView($value)
{
    if ($value == "1") return "Выключить";
    return "Включить";
}

function CSSView($value)
{
    if ($value == "1") return "btn-danger";
    return "btn-primary";
}

function TextEdit($value)
{
    $list = [
        "system" => "Энергостенд",
        "substation" => "Подстанция",
        "minisubstation_1" => "Мини подстанция 1",
        "minisubstation_2" => "Мини подстанция 2",
        "solarbattery_1" => "Солнечная Батарея 1",
        "solarbattery_2" => "Солнечная Батарея 2",
        "factory_1" => "Завод 1",
        "factory_2" => "Завод 2",
        "hospital_1" => "Больница 1",
        "hospital_2" => "Больница 2",
        "md_1" => "Микрорайон 1",
        "md_2" => "Микрорайон 2",
        "md_3" => "Микрорайон 3",
        "md_4" => "Микрорайон 4",
        "md_5" => "Микрорайон 5",
        "md_6" => "Микрорайон 6",
    ];

    return !empty($list[$value]) ? $list[$value] : "null";
}

function CheckValue($value)
{
    $list = [
        "system" => "Распределение ресурсов по источникам",
        "minisubstation_1" => "Помощь в распределении в качестве создания многопоточности",
        "minisubstation_2" => "Помощь в распределении в качестве создания многопоточности",
        "solarbattery_1" => "Выработка электроэнергии за счет симуляции солнечной панели, которая
        получает свет солнца от искусственных источников",
    ];

    return !empty($list[$value]) ? $list[$value] : "null";
}
