from datetime import datetime
from sync import *

count = 1
while True:

    sync()
    gettime = datetimeformat(datetime.now())

    print("[" + str(count) + "] load success (" + str(gettime) + ")")
    count += 1

    time.sleep(timesleep)
