import os.path

def addM(title,description):
    try:
        if os.path.exists('./movielist.txt'):
            with open('movielist.txt','r') as f:
                lines = f.readlines()
        else:
            print("doesn't exist")
            f=open("movielist.txt",'a+')
            lines = f.readlines()
        if moviecheck(title):
            return False
        else:
                NewMovie = (title + ',' + description)
                file = open('movielist.txt','a')
                file.write('\n' + NewMovie + '\nblank')
                print("Movie added successfully!")
                return True
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