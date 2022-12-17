import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import re
import sys


def find_shift_val(curr, shift):
    # print(str(curr) + ' --> ' + str(shift))
    return shift - curr


def ret_grade(x):
    url = 'https://strengthclimbing.com/finger-strength-analyzer/'
    driver = webdriver.Chrome()
    driver.get(url)
    driver.minimize_window()

    pu_off = driver.find_element(By.ID, 'id_poff')
    height_in = driver.find_element(By.ID, 'id_HI')
    bw_in = driver.find_element(By.ID, 'id_BM')
    h_load = driver.find_element(By.ID, 'id_TOT')
    ht_slide = driver.find_element(By.ID, 'slideHT')
    id_grade = driver.find_element(By.ID, 'id_V_grade')

    pu_off.click()

    height_in.send_keys(x['height'])
    bw_in.send_keys(x['weight'])
    h_load.send_keys(x['hang_weight'])

    curr = 7
    shift = int(x['hang_time'])
    shift_val = find_shift_val(curr, shift)

    if shift_val < 0:
        for y in range(shift_val * -1):
            ht_slide.send_keys(Keys.LEFT)
    elif shift_val > 0:
        for y in range(shift_val):
            ht_slide.send_keys(Keys.RIGHT)

    res = id_grade.get_attribute("value")
    return res


def convert_grade(grade):
    rating_dict = {
    'VB': '4B',
    'V0': '4C',
    'V1': '5B',
    'V2': '5C',
    'V3': '6A+',
    'V4': '6B+',
    'V5': '6C+',
    'V6': '7A',
    'V7': '7A+',
    'V8': '7B+',
    'V9': '7C',
    'V10': '7C+',
    'V11': '8A',
    'V12': '8A+',
    'V13': '8B',
    'V14': '8B+',
    'V15': '8C',
    'V16': '8C+',
    'V17': '9A'
    }
    if grade not in rating_dict.keys():
        return "err"
    return rating_dict[grade]


def main():
    n = len(sys.argv)
    if n != 5:
        print('err')
        return

    climberDict = {
        'height': str(re.findall("\d+", sys.argv[1])[0]),
        'weight': str(re.findall("\d+", sys.argv[2])[0]),
        'hang_weight': str(re.findall("\d+", sys.argv[3])[0]),
        'hang_time': str(re.findall("\d+", sys.argv[4])[0])
    }

    temp = ret_grade(climberDict)
    l = temp.split(" ")
    for x in l:
        if x[0] == 'V':
            print(convert_grade(x))
            return


if __name__ == '__main__':
    main()


