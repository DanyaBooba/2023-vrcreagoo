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


def sync():
    jsonfile = getjson()
    jsonf = json.loads(jsonfile)
    print(type(jsonf))


while True:
    sync()
    time.sleep(timesleep)
