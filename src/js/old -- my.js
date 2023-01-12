// Основной файл

let interval = 200;
let objCount = 16;

let jsonFile = '/php/json/jsonfile.txt';
let idName = 't';

let main_array = [];

$(function() {
    var scene = document.querySelector('a-scene');

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

    function SetImageOnce() {

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
            //Image
            if($('#im' + i).length){

              bool = main_array[i]["IsON"];

              nameofbuild = ReplaceForImage(i);
              info = GetInfoActiveImage(i);

              if(info === true) {
                if(bool === true) {
                  $('#im' + i)[0].setAttribute('src', '/img/' + nameofbuild + '_active.jpg');
                }
                else {
                  $('#im' + i)[0].setAttribute('src', '/img/' + nameofbuild + '_disable.jpg');
                }
              }
              else {
                $('#im' + i)[0].setAttribute('src', '/img/' + nameofbuild + '.jpg');
              }

            }
          }

        }
      });

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
          value: ReplacementIsOn(item["IsON"]),
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

      //Image
      if($('#im' + i).length){

        bool = main_array[i]["IsON"];

        nameofbuild = ReplaceForImage(i);
        info = GetInfoActiveImage(i);

        if(info === true) {
          if(bool === true) {
            $('#im' + i)[0].setAttribute('src', '/img/' + nameofbuild + '_active.jpg');
          }
          else {
            $('#im' + i)[0].setAttribute('src', '/img/' + nameofbuild + '_disable.jpg');
          }
        }
        else {
          $('#im' + i)[0].setAttribute('src', '/img/' + nameofbuild + '.jpg');
        }

      }

      console.log(i + ": " + main_array[i]["IsON"]);

    }

    function ReplaceForImage(i) {
      if(i === 1) {
        return "solarbattery1";
      }
      else if(i === 2) {
        return "minisubstation1";
      }
      else if(i === 3) {
        return "minisubstation2";
      }
      else if(i === 4) {
        return "hospital2";
      }
      else if(i === 5) {
        return "factory2";
      }
      else if(i === 6) {
        return "md1";
      }
      else if(i === 7) {
        return "md2";
      }
      else if(i === 8) {
        return "md3";
      }
      else if(i === 9) {
        return "md4";
      }
      else if(i === 10) {
        return "md5";
      }
      else if(i === 11) {
        return "md6";
      }
      else if(i === 12) {
        return "factory1";
      }
      else if(i === 13) {
        return "hospital1";
      }
      else if(i === 14) {
        return "solarbattery2";
      }
      else if(i === 15) {
        return "windgenerator";
      }
    }

    function GetInfoActiveImage(i) {
      if(i === 1 || i === 2 || i === 3 || i === 14 || i === 15) {
        return false;
      }
      else {
        return true;
      }
    }

    function ReplacementOfKeys(key){
      if(key === null){
        return "null";
      }

      if(key === "Microdistrict 1"){
        return "MD No. 1";
      }
      else if(key === "Microdistrict 2"){
        return "MD No. 2";
      }
      else if(key === "Microdistrict 3"){
        return "MD No. 3";
      }
      else if(key === "Microdistrict 4"){
        return "MD No. 4";
      }
      else if(key === "Microdistrict 5"){
        return "MD No. 5";
      }
      else if(key === "Microdistrict 6"){
        return "MD No. 6";
      }
      else if(key === "Hospital 1"){
        return "Hospital No. 1";
      }
      else if(key === "Hospital 2"){
        return "Hospital No. 2";
      }
      else if(key === "Wind Generator"){
        return "Wind Generator";
      }
      else if(key === "Factory 1"){
        return "Factory No. 1";
      }
      else if(key === "Factory 2"){
        return "Factory No. 2";
      }
      else if(key === "Solar Battery 1"){
        return "Solar Battery";
      }
      else if(key === "Solar Battery 2"){
        return "Solar Battery";
      }
      else if(key === "Substation"){
        return "Substation";
      }
      else if(key === "Mini Substation 1"){
        return "Mini Substation";
      }
      else if(key === "Mini Substation 2"){
        return "Mini Substation";
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
        return "Disabled";
      }
      else if(value === true){
        return "Active";
      }
      else{
        return ReplacementIsOn(false);
      }
    }

    // function CreateElement(id, x, y, z) {
    //   var textA = document.createElement('a-text');
    //   textA.setAttribute('text', {
    //     value: 'id=' + id + ' (' + x + ',' + y + ',' + z + ')',
    //     color: 'black'
    //   });
    //   textA.setAttribute('position', {
    //     x: 3,
    //     y: 3 - id,
    //     z: 75
    //   });
    //   textA.setAttribute('id', 'idt' + id);
    //   scene.appendChild(textA);
    // }

    // function SetID(){

    //   for (var i = 0; i < objCount; i++) {

    //     if ($('#' + idName + i + "__id").length) {
    //       console.log("#" + idName + i + "__id");
    //       $('#' + idName + i + "__id")[0].setAttribute('text', {
    //         value: '[' + i + ']',
    //       });
    //     }
    //   }

    // }

  });
