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


parsed = {}
j_ = json.loads(getjson())
k1 = j_[0].copy()
k2 = j_[1].copy()
k3 = j_[2].copy()

parsed[0] = getbuild(k1)
parsed[1] = getbuild(k1['Childs'][0])
parsed[2] = getbuild(k1['Childs'][0]['Childs'][0])
parsed[4] = getbuild(k1['Childs'][0]['Childs'][1])
parsed[5] = getbuild(k1['Childs'][0]['Childs'][0]['Childs'][0])
parsed[6] = getbuild(k1['Childs'][0]['Childs'][1]['Childs'][0])
parsed[7] = getbuild(k1['Childs'][0]['Childs'][1]['Childs'][1])

print(str(parsed))

# file = open("itog.txt", "w", encoding='utf-8')
# file.write(str(parsed))
# file.close()

# print(k2)
# print(k3)
