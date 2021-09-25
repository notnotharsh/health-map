import csv
import math

POPULATION_INDEX = 1
TARGET_INDEX = 3

with open('../../uploads/data.csv') as csv_file:
    def zero_to_one_lin(arr):
        minl = min(arr)
        maxl = max(arr)
        shrunk = [(i - minl) / (maxl - minl) for i in arr]
        return shrunk
    def zero_to_one_log(arr):
        subtracted = [math.log(i + 1) for i in arr]
        return zero_to_one_lin(subtracted)
    def prob_to_color(arr):
        green = [255, 255, 0]
        multiplier = [0, -255, 0]
        return [([int(green[0] + multiplier[0] * i), int(green[1] + multiplier[1] * i), int(green[2] + multiplier[2]) * i]) for i in arr]
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    names = []
    populations = []
    percentages = []
    for row in csv_reader:
        if line_count == 0:
            line_count += 1
        else:
            names.append(row[0])
            populations.append(int(row[POPULATION_INDEX].replace(",", "")))
            percentages.append(float(row[TARGET_INDEX]) / 100)
            line_count += 1
    targets = [int(populations[i] * percentages[i]) for i in range(0, len(populations))]
    print(prob_to_color(zero_to_one_log(targets)))
