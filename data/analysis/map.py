import csv
import math

POPULATION_INDEX = 1
TARGET_INDEX = 3

with open('../../uploads/map.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    coordinates = []
    for row in csv_reader:
        if line_count == 0:
            line_count += 1
        else:
            coordinates.append([])
            for i in range(1, 14, 2):
                if float(row[i]) != -1:
                    coordinates[line_count - 1].append([float(row[i]), float(row[i + 1])])
            line_count += 1
    print(coordinates)
