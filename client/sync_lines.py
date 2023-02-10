import json


def format(val):
    if (val == None):
        return "0"
    return round(val)


def getjson():
    with open('localjson_lines.txt', 'r', encoding='utf-8') as f:
        text = f.read()
    return text


def getbuild(val):
    returnarray = {
        "generatedpower": format(val['GeneratedPower']),
        "id": val['ID'],
        "active": val['IsON'],
        "type": val['ObjectType'],
        "power": val['Power'],
        "requiredpower": val['RequiredPower'],
    }

    return returnarray


# parsed[0] = getbuild(j_[0])
# parsed[1] = getbuild(j_[0]['Childs'][0])
# parsed[2] = getbuild(j_[0]['Childs'][0]['Childs'][0])
# parsed[3] = getbuild(j_[0]['Childs'][0]['Childs'][1])
# parsed[4] = getbuild(j_[0]['Childs'][0]['Childs'][0]['Childs'][0])
# parsed[5] = getbuild(j_[0]['Childs'][0]['Childs'][1]['Childs'][0])
# parsed[6] = getbuild(j_[0]['Childs'][0]['Childs'][1]['Childs'][1])

# parsed[7] = getbuild(j_[1])
# parsed[8] = getbuild(j_[1]['Childs'][0])
# parsed[9] = getbuild(j_[1]['Childs'][1])
# parsed[10] = getbuild(j_[1]['Childs'][2])
# parsed[11] = getbuild(j_[1]['Childs'][3])
# parsed[12] = getbuild(j_[1]['Childs'][4])
# parsed[13] = getbuild(j_[1]['Childs'][5])
# parsed[14] = getbuild(j_[1]['Childs'][6])

parsed = {}
j_ = json.loads(getjson())
k1 = j_[0].copy()
k2 = j_[1].copy()
k3 = j_[2].copy()


print(parsed)

# file = open("itog.txt", "w", encoding='utf-8')
# file.write(str(parsed))
# file.close()

# print(k2)
# print(k3)
