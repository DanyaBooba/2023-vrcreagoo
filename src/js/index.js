// обновление интерфейса локации

// 12.01.2023

let interval = 200;
let objCount = 16;

let jsonFile = '/php/json/jsonfile.txt';
let idName = 't';

let main_array = [];

$(function() {
  setInterval(function() {

    $.ajax({
      url: jsonFile,
      dataType: 'json'
    }).done(function(data) {

      if (data === null) {
        console.log('index.js: file json is empty');
      }
      else if (data !== null) {

        GetBuildsToArray(data);
        for(let i = 0; i < main_array.length; i++){
          GetUpdateInterface(i);
        }

      }
    });
  }, interval);

  function GetBuildsToArray(data) {

    // Указываем переменные
    substation = data["substation"];
    solarBattery1 = data["solarBattery1"];
    solarBattery2 = data["solarBattery2"];
    miniSubstation1 = data["miniSubstation1"];
    miniSubstation2 = data["miniSubstation2"];
    hospital1 = data["hospital1"];
    hospital2 = data["hospital2"];
    factory1 = data["factory1"];
    factory2 = data["factory2"];
    house1 = data["house1"];
    house2 = data["house2"];
    house3 = data["house3"];
    house4 = data["house4"];
    house5 = data["house5"];
    house6 = data["house6"];
    windGenerator = data["windGenerator"];


    // Формируем массив
    main_array = [];

    main_array.push(substation);
    main_array.push(solarBattery1);
    main_array.push(miniSubstation1);
    main_array.push(miniSubstation2);
    main_array.push(hospital2);
    main_array.push(factory2);
    main_array.push(house1);
    main_array.push(house2);
    main_array.push(house3);
    main_array.push(house4);
    main_array.push(house5);
    main_array.push(house6);
    main_array.push(factory1);
    main_array.push(hospital1);
    main_array.push(solarBattery2);
    main_array.push(windGenerator);
  }

  function GetUpdateInterface(i){

    let item = main_array[i];
    let activeName = '#' + idName + i;

    let id = $(activeName + '__id');
    let ison = $(activeName + '__ison');
    let genpow = $(activeName + '__genpow');
    let power = $(activeName + '__power');
    let reqpower = $(activeName + '__reqpower');
    let image = $('#im' + i);

    if (id.length) {
      id[0].setAttribute('text', { value: HumansNamesBuilds(item["ID"]) });
    }

    if (ison.length) {

      ison[0].setAttribute('text', {
        value: InterfaceStateBuild(item["IsON"]),
      });

      if (item["IsON"] === true) { ison[0].setAttribute('text', { color: '#2BFF3B' }); }

      if (item["IsON"] === false) { ison[0].setAttribute('text', { color: '#FF2B2B' }); }
    }

    if (genpow.length) {
      genpow[0].setAttribute('text', { value: Math.round(item["GeneratedPower"]) + ' kWt' });
    }

    if (power.length) {
      power[0].setAttribute('text', { value: Math.round(item["Power"]) + ' kWt' });
    }

    if (reqpower.length) {
      reqpower[0].setAttribute('text', {value: Math.round(item["RequiredPower"]) + ' kWt' });
    }

    if(image.length){

      if (GetStaticBoolInformation(i) === true) {

        let state = "_active";
        if (item["IsON"] === false) {
          state = "_disable";
        }

        image[0].setAttribute('src', '/img/' + GetNameBuildByIndex(i) + state + '.jpg');
      }
      else {
        image[0].setAttribute('src', '/img/' + GetNameBuildByIndex(i) + '.jpg');
      }
    }

  }

  function GetNameBuildByIndex(i) {
    if (i === 1) { return "solarbattery1" }

    if (i === 2) { return "minisubstation1" }

    if (i === 3) { return "minisubstation2" }

    if (i === 4) { return "hospital2" }

    if (i === 5) { return "factory2" }

    if (i === 6) { return "md1" }

    if (i === 7) { return "md2" }

    if (i === 8) { return "md3" }

    if (i === 9) { return "md4" }

    if (i === 10) { return "md5" }

    if (i === 11) { return "md6" }

    if (i === 12) { return "factory1" }

    if (i === 13) { return "hospital1" }

    if (i === 14) { return "solarbattery2" }

    if(i === 15) { return "windgenerator" }
  }

  function GetStaticBoolInformation(i) {
    if(i === 1 || i === 2 || i === 3 || i === 14 || i === 15) {
      return false;
    }
    return true;
  }

  function HumansNamesBuilds(key){

    if (key === "Microdistrict 1") { return "MD No. 1" }

    if (key === "Microdistrict 2") { return "MD No. 2" }

    if (key === "Microdistrict 3") { return "MD No. 3" }

    if (key === "Microdistrict 4") { return "MD No. 4" }

    if (key === "Microdistrict 5") { return "MD No. 5" }

    if (key === "Microdistrict 6") { return "MD No. 6" }

    if (key === "Hospital 1") { return "Hospital No. 1" }

    if (key === "Hospital 2") { return "Hospital No. 2" }

    if (key === "Wind Generator") { return "Wind Generator" }

    if (key === "Factory 1") { return "Factory No. 1" }

    if (key === "Factory 2") { return "Factory No. 2" }

    if (key === "Solar Battery 1") { return "Solar Battery" }

    if (key === "Solar Battery 2") { return "Solar Battery" }

    if (key === "Substation") { return "Substation" }

    if (key === "Mini Substation 1") { return "Mini Substation" }

    if (key === "Mini Substation 2") { return "Mini Substation" }

    return "null";
  }

  function InterfaceStateBuild(value){

    if(value === null) { return ReplacementIsOn(false); }

    if (value === false) { return "Disabled"; }

    if (value === true) { return "Working"; }
  }

});
