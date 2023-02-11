def getjson():
    with open('files/localjson.txt', 'r', encoding='utf-8') as f:
        text = f.read()
    return text


def logs(val):
    with open('logs/logs.txt', 'a') as f:
        f.write(val+"\n")


def datetimeformat(dt):
    return str(dt.day) + "." + str(dt.month) + "." + \
        str(dt.year) + " " + str(dt.hour) + ":" + str(dt.minute)


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
