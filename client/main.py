# Main script of sync
# IoT with server
#
# Author: Daniil Dybka
# daniil@dybka.ru

from datetime import datetime
from sync import *
import time

count = 1
while True:

    sync()
    gettime = datetimeformat(datetime.now())

    print("[" + str(count) + "] load success (" + str(gettime) + ")")
    count += 1

    time.sleep(timesleep)
