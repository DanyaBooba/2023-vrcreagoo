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


finishlist = {}


def return_lines(j_):
    j_lines = j_['RootNode']['Lines']
    k1 = j_lines.copy()
    k1.pop(1)
    k1.pop(1)
    # k2 = j_lines[1].copy()
    # k3 = j_lines[2].copy()
    count = 0
    returndict = {}

    # print(k1[0]['Childs'][0])

    # k = k1
    # while k != None:
    #     for i in range(len(k)):
    #         returndict[count] = {
    #             "generatedpower": k[i]['GeneratedPower'],
    #             "id": k[i]['ID'],
    #             "active": k[i]['IsON'],
    #             "type": k[i]['ObjectType'],
    #             "power": k[i]['Power'],
    #             "requiredpower": k[i]['RequiredPower']
    #         }
    #         print(i)
    #         count += 1
    #     k = k['Childs']

    # print(returndict)

    return returndict


def return_stations(j_):
    j_stations = j_['RootNode']['Stations']
    count = 0
    returndict = {}
    for i in j_stations:
        if i != None:
            returndict[count] = {
                "generatedpower": format(i['GeneratedPower']),
                "id": i['ID'],
                "active": i['IsON'],
                "type": i['ObjectType'],
                "power": i['Power'],
                "requiredpower": i['RequiredPower'],
            }
            count += 1

    # return returndict


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

    # print(finishlist)


while True:
    sync()
    time.sleep(timesleep)
