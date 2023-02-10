# import json


# def format(val):
#     if (val == None):
#         return "0"
#     return round(val)


# def getjson():
#     with open('localjson_lines.txt', 'r', encoding='utf-8') as f:
#         text = f.read()
#     return text


# def getbuild(val):
#     returnarray = {
#         "generatedpower": format(val['GeneratedPower']),
#         "id": val['ID'],
#         "active": val['IsON'],
#         "type": val['ObjectType'],
#         "power": val['Power'],
#         "requiredpower": val['RequiredPower'],
#     }

#     return returnarray


getfinal = {}
j_lines = json.loads(getjson())
k1 = j_lines[0].copy()
k2 = j_lines[1].copy()
k3 = j_lines[2].copy()

getfinal[0] = getbuild(j_lines[0])
getfinal[1] = getbuild(j_lines[0]['Childs'][0])
getfinal[2] = getbuild(j_lines[0]['Childs'][0]['Childs'][0])
getfinal[3] = getbuild(j_lines[0]['Childs'][0]['Childs'][1])
getfinal[4] = getbuild(j_lines[0]['Childs'][0]['Childs'][0]['Childs'][0])
getfinal[5] = getbuild(j_lines[0]['Childs'][0]['Childs'][1]['Childs'][0])
getfinal[6] = getbuild(j_lines[0]['Childs'][0]['Childs'][1]['Childs'][1])

getfinal[7] = getbuild(j_lines[1])
getfinal[8] = getbuild(j_lines[1]['Childs'][0])
getfinal[9] = getbuild(j_lines[1]['Childs'][1])
getfinal[10] = getbuild(j_lines[1]['Childs'][2])
getfinal[11] = getbuild(j_lines[1]['Childs'][3])
getfinal[12] = getbuild(j_lines[1]['Childs'][4])
getfinal[13] = getbuild(j_lines[1]['Childs'][5])
getfinal[14] = getbuild(j_lines[1]['Childs'][6])

getfinal[15] = getbuild(j_lines[2])
getfinal[16] = getbuild(j_lines[2]['Childs'][0])
getfinal[17] = getbuild(j_lines[2]['Childs'][0]['Childs'][0])
getfinal[18] = getbuild(j_lines[2]['Childs'][0]['Childs'][1])
getfinal[19] = getbuild(j_lines[2]['Childs'][0]['Childs'][0]['Childs'][0])
getfinal[20] = getbuild(j_lines[2]['Childs'][0]['Childs'][1]['Childs'][0])
getfinal[21] = getbuild(j_lines[2]['Childs'][0]['Childs'][1]['Childs'][1])
