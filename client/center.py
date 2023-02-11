# Control for builds
# from server
#
# Author: Daniil Dybka
# daniil@dybka.ru

import c
import time
import requests

import random

changename = {
    "hospital_1": "Больница №1",
    "hospital_2": "Больница №2",
    "factory_1": "Завод №1",
    "factory_2": "Завод №2",
    "md_1": "Микро район №1",
    "md_2": "Микро район №2",
    "md_3": "Микро район №3",
    "md_4": "Микро район №4",
    "md_5": "Микро район №5",
    "md_6": "Микро район №6",
    "minisub_1": "МП1",
    "minisub_2": "МП2",
    "substation": "П",
}


def changestate(build):
    print(build['name'], build['state'])


def getstate(buildname):
    return random.randint(0, 1)  # local


def center():
    for i in changename:
        changestate({
            "name": str(i),
            "state": getstate(i),
        })


center()
