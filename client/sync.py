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


def sync():
    jsonfile = getjson()
    jsonf = json.loads(jsonfile)
    finishlist = {
        'info': {
            'elements': jsonf['ElementsOK'],
            'lamp1': format(jsonf['Lamp1val']),
            'lamp2': format(jsonf['Lamp2val']),
            'tree': format(jsonf['TreeOK']),
            'wind': format(jsonf['Windval'])
        },
        'lines': {
            'generatedpower': format(jsonf['RootNode']['GeneratedPower']),
            'requiredpower': format(jsonf['RootNode']['RequiredPower']),
        }
    }

    print(finishlist)


while True:
    sync()
    time.sleep(timesleep)
