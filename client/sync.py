import requests
import json
import time
import c

url = c.IP_ENERGO
ip = c.IP

urlload = "https://vr.creagoo.ru/put/?q="
timesleep = 1.25


def getjson():
    with open('localjsonfile.txt', 'r', encoding='utf-8') as f:
        text = f.read()
    return text


def format(val):
    if (val == None):
        return "0"
    return round(val)


# additional substation
def id(val):
    if val == "Завод №1":
        return "Factory No.1"
    elif val == "Завод №2":
        return "Factory No.2"
    elif val == "Больница №1":
        return "Hospital No.1"
    elif val == "Больница №2":
        return "Hospital No.2"
    elif val == "Микро район №1":
        return "Housing No.1"
    elif val == "Микро район №2":
        return "Housing No.2"
    elif val == "Микро район №3":
        return "Housing No.3"
    elif val == "Микро район №4":
        return "Housing No.4"
    elif val == "Микро район №5":
        return "Housing No.5"
    elif val == "Микро район №6":
        return "Housing No.6"


def getbuild(val):
    returnarray = {
        "generatedpower": format(val['GeneratedPower']),
        "id": val['ID'],
        "active": val['IsON'],
        "type": val['ObjectType'],
        "power": format(val['Power']),
        "requiredpower": format(val['RequiredPower']),
    }

    return returnarray


def return_lines(j_):
    j_lines = j_['RootNode']['Lines']
    getfinal = {}

    getfinal[0] = getbuild(j_lines[0])
    getfinal[1] = getbuild(j_lines[0]['Childs'][0])
    getfinal[2] = getbuild(j_lines[0]['Childs'][0]['Childs'][0])
    getfinal[3] = getbuild(j_lines[0]['Childs'][0]['Childs'][1])
    getfinal[4] = getbuild(j_lines[0]['Childs'][0]['Childs'][0]['Childs'][0])
    getfinal[5] = getbuild(j_lines[0]['Childs'][0]['Childs'][1]['Childs'][0])
    getfinal[6] = getbuild(j_lines[0]['Childs'][0]['Childs'][1]['Childs'][1])

    getfinal[7] = getbuild(j_lines[1])
    getfinal[8] = getbuild(j_lines[1]['Childs'][0])
    getfinal[9] = getbuild(j_lines[1]['Childs'][1])
    getfinal[10] = getbuild(j_lines[1]['Childs'][2])
    getfinal[11] = getbuild(j_lines[1]['Childs'][3])
    getfinal[12] = getbuild(j_lines[1]['Childs'][4])
    getfinal[13] = getbuild(j_lines[1]['Childs'][5])
    getfinal[14] = getbuild(j_lines[1]['Childs'][6])

    getfinal[15] = getbuild(j_lines[2])
    getfinal[16] = getbuild(j_lines[2]['Childs'][0])
    getfinal[17] = getbuild(j_lines[2]['Childs'][0]['Childs'][0])
    getfinal[18] = getbuild(j_lines[2]['Childs'][0]['Childs'][1])
    getfinal[19] = getbuild(j_lines[2]['Childs'][0]['Childs'][0]['Childs'][0])
    getfinal[20] = getbuild(j_lines[2]['Childs'][0]['Childs'][1]['Childs'][0])
    getfinal[21] = getbuild(j_lines[2]['Childs'][0]['Childs'][1]['Childs'][1])

    return getfinal


def return_stations(j_):
    j_stations = j_['RootNode']['Stations']
    count = 0
    returndict = {}
    for i in j_stations:
        if i != None:
            returndict[count] = getbuild(i)
            count += 1

    return returndict


def sync():
    jsonfile = getjson()
    jsonf = json.loads(jsonfile)

    finishlist = {
        'info': {
            'elements': jsonf['ElementsOK'],
            'generatedpower': format(jsonf['RootNode']['GeneratedPower']),
            'requiredpower': format(jsonf['RootNode']['RequiredPower']),
            'lamp1': format(jsonf['Lamp1val']),
            'lamp2': format(jsonf['Lamp2val']),
            'tree': format(jsonf['TreeOK']),
            'wind': format(jsonf['Windval']),
        },
        'lines': return_lines(jsonf),
        'stations': return_stations(jsonf)
    }

    print(finishlist)
    file = open("itog.txt", "w", encoding='utf-8')
    file.write(str(finishlist))
    file.close()


sync()

# while True:
#     sync()
#     time.sleep(timesleep)
