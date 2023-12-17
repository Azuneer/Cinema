# Programme de récupération des pays. #

import csv

# Letcture du csv et mise en liste des pays. #
def data(fichier):
    files = []
    with open(fichier, "r", encoding='utf-8') as f:
        reader = csv.reader(f, delimiter= ",")
        for ligne in reader:
            files.append(ligne[5])
        return files

donnees = data("IMDb-movies.csv")
print(donnees)


#Delimitation des pays par .split() #
def delimite(tab):
    new_tab = []
    tab.pop(0)
    for elt in range(len(tab)-1):
        data = tab[elt].split(', ')
        if len(data) >= 2 and (data[0] not in new_tab):
            new_tab.append(data[0])
        if len(data) >= 2 and (data[1] not in new_tab):
            new_tab.append(data[1])
        elif(data[0] not in new_tab):
            new_tab.append(data[0])
    return new_tab

genres = delimite(donnees)

with open('genres.csv', 'w', newline='') as myfile:
    wr = csv.writer(myfile)
    wr.writerow(['Genres'])
    for row in genres:
        wr.writerow([row.strip()])
