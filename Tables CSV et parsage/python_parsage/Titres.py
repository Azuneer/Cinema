# Programme de récupération des pays. #

import csv

# Letcture du csv et mise en liste des pays. #
def data(fichier,a):
    files = []
    with open(fichier, "r", encoding='utf-8') as f:
        reader = csv.reader(f, delimiter= ",")
        for ligne in reader:
            files.append(ligne[a])
        return files

donnees = data("IMDb-movies.csv",1)
genre = data("IMDb-movies.csv",5)
pays = data("IMDb-movies.csv",7)
langue = ("IMDb-movies.csv",8)

def extraction(tab, ge, pa, lg):
    liste=list()
    for i in range(1,len(tab)):
        liste.append(tab[i])
    return liste

titres=extraction(donnees, genre, pays,langue)

#with open('titres.csv', 'w', newline='') as myfile:
    #wr = csv.writer(myfile)
    #wr.writerow(['Titres'])
    #for row in titresFR:
        #wr.writerow([row.strip()])

print(titres)