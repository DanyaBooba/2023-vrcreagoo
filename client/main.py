import requests as req
import json
import time
import c

ip_energo = c.IP_ENERGO
ip = c.IP

truenames = [
    ''
]

mynames = [
    'substation',
    'solarBattery1',
    'miniSubstation1',
    'miniSubstation2',
    'hospital2',
    'factory2',
    'house1',
    'house2',
    'house3',
    'house4',
    'house5',
    'house6',
    'factory1',
    'hospital1',
    'solarBattery2',
    'windGenerator'
]

link = "http://" + ip_energo + ":" + ip + "/JSONGreenCity/ModelTree"
link_load = "https://vr.creagoo.ru/put/?q="
timesleep = 3

def main():
    res = req.get(link)
    rtxt = res.text
    print(rtxt)

    myjs = json.loads(rtxt)
    req.get(link_load + rtxt)

while 1:
    main()
    time.sleep(timesleep)