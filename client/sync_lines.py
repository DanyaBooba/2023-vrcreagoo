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

i1 = len(k1['Childs'])
print(getbuild(k1))

# print(k1)
# print(k2)
# print(k3)
