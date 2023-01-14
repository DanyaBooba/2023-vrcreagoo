<?php

function FormatJS($json)
{
    $array = json_decode($json);

    $root = $array->RootNode;
    $obj__1 = $root->Lines;
    $obj__2 = $root->Stations;

    // START LIST
    $elements = $array->ElementsOK;
    $tree = $array->TreeOK;

    $substation = [
        "GeneratedPower" => NullValue(round($root->GeneratedPower)),
        "ID" => "Substation",
        "IsON" => true,
        "RequiredPower" => NullValue(round($root->RequiredPower)),
    ];

    $solarBattery1 = [
        "GeneratedPower" => NullValue(round($obj__2[0]->GeneratedPower)),
        "ID" => "Solar Battery 1",
        "IsON" =>  NullValue($obj__2[0]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" =>  NullValue(round($obj__2[0]->RequiredPower)),
    ];

    $miniSubstation1 = [
        "GeneratedPower" => NullValue(round($obj__1[2]->Childs[0]->GeneratedPower)),
        "ID" => "Mini Substation 1",
        "IsON" => NullValue($obj__1[2]->Childs[0]->IsON, false),
        "Power" => NullValue($obj__1[2]->Childs[0]->Power),
        "RequiredPower" => NullValue(round($obj__1[2]->Childs[0]->RequiredPower)),
    ];

    $miniSubstation2 = [
        "GeneratedPower" => NullValue(round($obj__1[0]->Childs[0]->GeneratedPower)),
        "ID" => "Mini Substation 2",
        "IsON" => NullValue($obj__1[0]->Childs[0]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[0]->Childs[0]->RequiredPower)),
    ];

    $hospital2 = [
        "GeneratedPower" => NullValue(round($obj__1[1]->Childs[0]->GeneratedPower)),
        "ID" => "Hospital 2",
        "IsON" => NullValue($obj__1[1]->Childs[0]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[1]->Childs[0]->RequiredPower)),
    ];

    $factory2 = [
        "GeneratedPower" => NullValue(round($obj__1[1]->Childs[2]->GeneratedPower)),
        "ID" => "Factory 2",
        "IsON" => NullValue($obj__1[1]->Childs[2]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[1]->Childs[2]->RequiredPower)),
    ];

    $house1 = [
        "GeneratedPower" => NullValue(round($obj__1[0]->Childs[0]->Childs[1]->Childs[0]->GeneratedPower)),
        "ID" => "Microdistrict 1",
        "IsON" => NullValue($obj__1[0]->Childs[0]->Childs[1]->Childs[0]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[0]->Childs[0]->Childs[1]->Childs[0]->RequiredPower)),
    ];

    $house2 = [
        "GeneratedPower" => NullValue(round($obj__1[0]->Childs[0]->Childs[1]->Childs[1]->GeneratedPower)),
        "ID" => "Microdistrict 2",
        "IsON" => NullValue($obj__1[0]->Childs[0]->Childs[1]->Childs[1]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[0]->Childs[0]->Childs[1]->Childs[1]->RequiredPower)),
    ];

    $house3 = [
        "GeneratedPower" => NullValue(round($obj__1[1]->Childs[3]->GeneratedPower)),
        "ID" => "Microdistrict 3",
        "IsON" => NullValue($obj__1[1]->Childs[3]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[1]->Childs[3]->RequiredPower)),
    ];

    $house4 = [
        "GeneratedPower" => NullValue(round($obj__1[1]->Childs[4]->GeneratedPower)),
        "ID" => "Microdistrict 4",
        "IsON" => NullValue($obj__1[1]->Childs[4]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[1]->Childs[4]->RequiredPower)),
    ];

    $house5 = [
        "GeneratedPower" => NullValue(round($obj__1[1]->Childs[5]->GeneratedPower)),
        "ID" => "Microdistrict 5",
        "IsON" => NullValue($obj__1[1]->Childs[5]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[1]->Childs[5]->RequiredPower)),
    ];

    $house6 = [
        "GeneratedPower" => NullValue(round($obj__1[1]->Childs[1]->GeneratedPower)),
        "ID" => "Microdistrict 6",
        "IsON" => NullValue($obj__1[1]->Childs[1]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[1]->Childs[1]->RequiredPower)),
    ];

    $factory1 = [
        "GeneratedPower" => NullValue(round($obj__1[1]->Childs[1]->GeneratedPower)),
        "ID" => "Factory 1",
        "IsON" => NullValue($obj__1[1]->Childs[1]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[1]->Childs[1]->RequiredPower)),
    ];

    $hospital1 = [
        "GeneratedPower" => NullValue(round($obj__1[2]->Childs[0]->Childs[1]->Childs[0]->GeneratedPower)),
        "ID" => "Hospital 1",
        "IsON" => NullValue($obj__1[2]->Childs[0]->Childs[1]->Childs[0]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__1[2]->Childs[0]->Childs[1]->Childs[0]->RequiredPower)),
    ];

    $solarBattery2 = [
        "GeneratedPower" => NullValue(round($obj__2[4]->GeneratedPower)),
        "ID" => "Solar Battery 2",
        "IsON" => NullValue($obj__2[4]->IsON, false),
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__2[4]->RequiredPower)),
    ];

    $windGenerator = [
        "GeneratedPower" => NullValue(round($obj__2[2]->GeneratedPower)),
        "ID" => "Wind Generator",
        "IsON" => true,
        "Power" => NullValue(round($obj__2[0]->Power)),
        "RequiredPower" => NullValue(round($obj__2[2]->RequiredPower)),
    ];

    return json_encode([
        "substation" => $substation,
        "solarBattery1" => $solarBattery1,
        "miniSubstation1" => $miniSubstation1,
        "miniSubstation2" => $miniSubstation2,
        "hospital2" => $hospital2,
        "factory2" => $factory2,
        "house1" => $house1,
        "house2" => $house2,
        "house3" => $house3,
        "house4" => $house4,
        "house5" => $house5,
        "house6" => $house6,
        "factory1" => $factory1,
        "hospital1" => $hospital1,
        "solarBattery2" => $solarBattery2,
        "windGenerator" => $windGenerator,
        "_elements" => $elements,
        "_tree" => $tree,
    ]);
}

function NullValue($data)
{
    if (!isset($data)) return "null";
    return $data;
}
