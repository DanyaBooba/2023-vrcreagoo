function readFile()
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", "/img/camera/ver.txt", false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var number = rawFile.responseText;
                $('#cameraview')[0].setAttribute('src', '/img/camera/camera_' + number + '.jpg');

                console.log('readfile: ' + number);
            }
        }
    }
    rawFile.send(null);
}

readFile();
