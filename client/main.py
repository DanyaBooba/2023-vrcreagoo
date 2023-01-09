##
## Скрипт клиента.
## Его задача: производить подключение к серверу и отправлять
## ему данные с энергостенда.
##
## Авторство: Дыбка Даниил Викторович
## Почта: daniil@dybka.ru
## Сайт: vr.creagoo.ru
##

#!/usr/bin/python3

import request as req
import json_local
import json
import time
import c

local_json = json_local.JSON
ip_energo = c.IP_ENERGO
ip = c.IP

timesleep = 3
load = True

link = "http://"+ip_energo+":"+ip+"/JSONGreenCity/ModelTree"
link_load = "https://vr.creagoo.ru/put/index.php?q="

def main():
    if load == False:
        print(local_json)
        return

    response = req.get(link)
    txt = response.txt
    print(txt)

    myjs = json.loads(txt)
    req.get(link_load + txt)

while 1:
    main()
    time.sleep(timesleep)
    