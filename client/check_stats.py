## CHECK THE BUILDS

import c
import time
import requests as r

timesleep = 0.3
timesleepstart = 0.3
list_stats = [1,1,1,1,1,1,1,1,1,1]

list_truenames = [
    'Больница №1',
    'Больница №2',
    'Завод №1',
    'Завод №2',
    'Микро район №1',
    'Микро район №2',
    'Микро район №3',
    'Микро район №4',
    'Микро район №5',
    'Микро район №6',
]

list_names = [
    'hospital_1',
    'hospital_2',
    'factory_1',
    'factory_2',
    'md_1',
    'md_2',
    'md_3',
    'md_4',
    'md_5',
    'md_6'
]

link_info = "https://vr.creagoo.ru/stats/return.php"
link_set = "https://vr.creagoo.ru/stats/set.php"

def setValue(id, v):
    idname = list_truenames[id]
    on = "TurnOn"
    off = "TurnOff"
    active_o = ""
    if v == 0:
        active_o = off
    elif v == 1:
        active_o = on

    link_energo = "http://" + c.IP_ENERGO + ":8004/JSONGreenCity/" + active_o + "?key=" + idname + "&soketnum=-1"
    r.get(link_energo)
    print(link_energo)

def start():
    for i in range(len(list_names)):
        let = r.get(link_info + "?b=" + list_names[i])
        num = int(let.content)

        list_stats[i] = num
        setValue(i, num)

        time.sleep(timesleep)

def main():
    for i in range(len(list_names)):
        let = r.get(link_info + "?b=" + list_names[i])
        num = int(let.content)

        list_stats[i] = num
        setValue(i, num)
        print(str(list_names[i]) + " now is " + str(num))
        time.sleep(timesleep)

start()
while 1:
    main()