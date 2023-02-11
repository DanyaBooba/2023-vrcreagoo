from datetime import datetime
from _sync import *
import requests
import json
import time
import c

url = c.IP_ENERGO
ip = c.IP

urlload = "https://vr.creagoo.ru/put/?q="
timesleep = 3


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

    dt_format = datetimeformat(datetime.now())

    logs(json.dumps({
        "count_lines": len(finishlist['lines']),
        "count_stations": len(finishlist['stations']),
        "elements": finishlist['info']['elements'],
        "generatedpower": 0,
        "datetime": dt_format
    }))
