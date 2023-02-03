// Основной файл

let interval = 200;

let objCount = 16;

let jsonFile = '/json/index.txt';
let idName = 't';

let main_array = [];

$(function() {
    var scene = document.querySelector('a-scene');

    SetID();
    ReData();

    setInterval(function() {
      ReData();
  }, interval);

    function ReData() {
      var data = null;
      $.ajax({
        url: jsonFile,
        dataType: 'json'
      }).done(function(mainFile) {

        data = mainFile;
        if (data === null) {
          console.log('File is empty');
        }
        else if(data !== null){

          SetArray(data);
          for(var i = 0; i < main_array.length; i++){
            UpdateUI(i);
          }

        }
      });

    }

    function SetID(){

      for (var i = 0; i < objCount; i++) {

        if ($('#' + idName + i + "__id").length) {
          console.log("#" + idName + i + "__id");
          $('#' + idName + i + "__id")[0].setAttribute('text', {
            value: '[' + i + ']',
          });
        }
      }

    }

    function ReplacementOfKeys(key){
      if(key === null){
        return "";
      }

      if(key === "Микрорайон 1"){
        return "Microdistrict 1";
      }
      else if(key === "Микрорайон 2"){
        return "Microdistrict 2";
      }
      else if(key === "Микрорайон 3"){
        return "Microdistrict 3";
      }
      else if(key === "Микрорайон 4"){
        return "Microdistrict 4";
      }
      else if(key === "Микрорайон 5"){
        return "Microdistrict 5";
      }
      else if(key === "Микрорайон 6"){
        return "Microdistrict 6";
      }
      else if(key === "Больница 1"){
        return "Hospital 1";
      }
      else if(key === "Больница 2"){
        return "Hospital 2";
      }
      else if(key === "Ветрогенератор"){
        return "Wind Generator";
      }
      else if(key === "Завод 1"){
        return "Factory 1";
      }
      else if(key === "Завод 2"){
        return "Factory 2";
      }
      else if(key === "Солнечная Батарея 1"){
        return "Solar Battery 1";
      }
      else if(key === "Солнечная Батарея 2"){
        return "Solar Battery 2";
      }
      else if(key === "Подстанция"){
        return "Substation";
      }
      else if(key === "Мини Подстанция 1"){
        return "Mini Substation 1";
      }
      else if(key === "Мини Подстанция 2"){
        return "Mini Substation 2";
      }
      else{
        return key;
      }
    }

    function ReplacementIsOn(value){

      if(value === null){
        return ReplacementIsOn(false);
      }

      if(value === false){
        return "OFF";
      }
      else if(value === true){
        return "ON";
      }
      else{
        return ReplacementIsOn(false);
      }
    }

    function CreateElement(id, x, y, z) {
      var textA = document.createElement('a-text');
      textA.setAttribute('text', {
        value: 'id=' + id + ' (' + x + ',' + y + ',' + z + ')',
        color: 'black'
      });
      textA.setAttribute('position', {
        x: 3,
        y: 3 - id,
        z: 75
      });
      textA.setAttribute('id', 'idt' + id);
      scene.appendChild(textA);
    }

    function SetArray(data){
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

    function UpdateUI(i){

      var item = main_array[i];

      //Name
      if($('#' + idName + i + '__id').length){
        $('#' + idName + i + '__id')[0].setAttribute('text', {
          value: ReplacementOfKeys(item["ID"]),
        });
      }

      //IsOn
      if($('#' + idName + i + '__ison').length){

        bool = item["IsON"];

        $('#' + idName + i + '__ison')[0].setAttribute('text', {
          value: '[' + ReplacementIsOn(item["IsON"]) + ']',
        });

        if(bool === true){
          $('#' + idName + i + '__ison')[0].setAttribute('text', {
            color: '#2BFF3B',
          });
        }
        else if(bool === false){
          $('#' + idName + i + '__ison')[0].setAttribute('text', {
            color: '#FF2B2B',
          });
        }

      }

      //GenPower
      if($('#' + idName + i + '__genpow').length){
        $('#' + idName + i + '__genpow')[0].setAttribute('text', {
          value: Math.round(item["GeneratedPower"]) + ' kWt',
        });
      }

      //Power
      if($('#' + idName + i + '__power').length){
        $('#' + idName + i + '__power')[0].setAttribute('text', {
          value: Math.round(item["Power"]) + ' kWt',
        });
      }

      //ReqPower
      if($('#' + idName + i + '__reqpower').length){
        $('#' + idName + i + '__reqpower')[0].setAttribute('text', {
          value: Math.round(item["RequiredPower"]) + ' kWt',
        });
      }

    }

  });
