import random as r
import re
import pandas as pd


# Table Climbs, columns = [CRAG_ID, route_name, route_rating, route_type, route_height, route_stars]
# INSERT INTO Climbs(CRAG_ID, route_name, route_rating, route_type, route_height, route_stars)
def form_row(row, name):
    return "(" + find_crag_id(name) + ", '" + row['Route'] + "', '" + row['Rating'] + "', '" + row['Route Type'] + "', " + row['Length'] + ", " + row['Avg Stars'] + "),\n"


def form_final(df, name):
    ret = ""
    ret_dict = ret_rating_dict()
    for index, row in df.iterrows():
        if ('Redacted' not in row['Route'] and 'Unknown' not in row['Route']) and 'Unnamed' not in row['Route']:
            row['Rating'] = ret_dict[row['Rating']]
            ret += form_row(row, name)
    return ret


def find_crag_id(name):
    crag_dict = {
        'Manchester Wall': 1,
        'Belle Isle': 2,
        'The Sport Park': 3,
        'Castle Rock': 4,
        'Happy Hour Crag': 5,
        'Summersville Lake': 6,
        'Lower Meadow': 7,
        'Upper Meadow': 8,
        'Valley South Side': 9,
        'Valley North Side': 10
    }
    return str(crag_dict[name])


def ret_rating_dict():
    f = open('references/ratings.txt')
    ret_dict = {}
    for x in f:
        x = x.strip()
        x = x.split(",")
        x = x[0:2]
        x[0] = x[0][2:len(x[0])-1]
        x[1] = x[1][2:len(x[1])-1]
        ret_dict[x[1]] = x[0]
    return ret_dict


def form_rates(rates):
    for y in range(len(rates)):
        temp = rates[y]
        temp += "     "
        temp = temp[:5]
        temp = temp.split(" ")
        temp = temp[0]
        xtemp = temp[2:]
        if xtemp[0] == '1' and len(xtemp) == 2:
            temp += 'a'
        elif xtemp[0] == '1' and len(xtemp) == 3:
            if xtemp[2] == '+':
                temp = temp[:4]
                temp += 'd'
            elif xtemp[2] == '-':
                temp = temp[:4]
                temp += 'a'
        elif xtemp[0] != '1' and len(xtemp) == 2:
            temp = temp[:3]
        rates[y] = temp
    return rates


def form_lengths(lengths):
    for y in range(len(lengths)):
        temp = str(lengths[y])
        if temp == 'nan':
            temp = 'null'
        else:
            temp = temp.split(".")
            temp = temp[0]
        lengths[y] = str(temp)
    return lengths


def form_stars(stars):
    for y in range(len(stars)):
        temp = float(stars[y])
        temp = temp * (10 / 4)
        if temp < 0:
            temp = 0.0
        stars[y] = str(temp)
    return stars


def form_types(types):
    for y in range(len(types)):
        temp = str(types[y])
        spl = temp.split(",")
        temp = ""
        for x in range(len(spl)):
            spl[x] = spl[x].strip()
            temp += spl[x]
            if (x + 1) in range(len(spl)):
                temp += '/'
        types[y] = temp
    return types


def form_names(names):
    for y in range(len(names)):
        temp = names[y]
        if "'" in temp:
            names[y] = temp.replace("'", "")
    return names


def main():
    csvs = []
    for x in range(10):
        csvs.append(input('Crag name ' + str(x + 1) + ': \n'))
    for name in csvs:
        df = pd.read_csv('crags/' + name + '.csv')
        df = df[['Route', 'Avg Stars', 'Route Type', 'Rating', 'Length']]
        rate_clean = form_rates(list(df['Rating']))
        df['Rating'] = rate_clean
        length_clean = form_lengths(list(df['Length']))
        df['Length'] = length_clean
        stars_clean = form_stars(list(df['Avg Stars']))
        df['Avg Stars'] = stars_clean
        types_clean = form_types(list(df['Route Type']))
        df['Route Type'] = types_clean
        routes_clean = form_names(list(df['Route']))
        df['Route'] = routes_clean
        p = form_final(df, name)

        print(p)


if __name__ == '__main__':
    main()