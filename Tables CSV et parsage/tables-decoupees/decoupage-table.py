import csv

# Spécifiez le chemin vers votre fichier CSV d'origine et le dossier de destination pour les fichiers découpés.
chemin_fichier_csv = 'CINE_titres.csv'
dossier_destination = ''

taille_max = 2 * 1024 * 1024  # 2 Mo en octets

partie = 1
taille_actuelle = 0
fichier_csv_actuel = open(dossier_destination + 'partie{}.csv'.format(partie), 'w', newline='')
writer = csv.writer(fichier_csv_actuel)

with open(chemin_fichier_csv, 'r', encoding='windows-1252') as fichier_csv:
    reader = csv.reader(fichier_csv)
    entetes = next(reader)  # Lire les en-têtes du fichier CSV

    writer.writerow(entetes)  # Écrire les en-têtes dans chaque fichier découpé

    for ligne in reader:
        taille_ligne = len(','.join(ligne))  # Taille de la ligne en octets

        if taille_actuelle + taille_ligne > taille_max:
            fichier_csv_actuel.close()  # Fermer le fichier actuel
            partie += 1
            taille_actuelle = 0
            fichier_csv_actuel = open(dossier_destination + 'partie{}.csv'.format(partie), 'w', newline='')
            writer = csv.writer(fichier_csv_actuel)
            writer.writerow(entetes)  # Écrire les en-têtes dans chaque fichier découpé

        writer.writerow(ligne)  # Écrire la ligne dans le fichier actuel
        taille_actuelle += taille_ligne

    fichier_csv_actuel.close()  # Fermer le dernier fichier actuel

print("Le fichier CSV a été découpé avec succès en plusieurs parties.")