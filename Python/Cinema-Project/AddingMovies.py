import os.path

def addM(title,description):
    try:
        if moviecheck(title):
            return False
        else:
            if os.path.exists('./movielist.txt'):
                NewMovie = ('\n' + title + ',' + description)
                file = open('movielist.txt','a')
                file.seek(0, 2)
                file.write(NewMovie)
                print("Movie added successfully!")
                return True
            else:
                f=open("movielist.txt",'a+')
                NewMovie = (title + ',' + description)
                f.write(NewMovie)

    except Exception:
        print(Exception)
def moviecheck(title):

    try:
        with open('movielist.txt','r') as file:
            lines = file.readlines()
        for line in lines:
            fields = line.split(",")
            if (fields[0] == title):
                print("This movie already exists")
                return True
                
    except Exception:
        print(Exception)
    return False

title = input("PLease enter the movie title: ")
description = input("Please enter the description: ")

addM(title,description)
