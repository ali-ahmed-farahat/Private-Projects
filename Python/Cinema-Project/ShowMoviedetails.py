


def movieDetails(title):
    try:
        with open('movielist.txt','r') as file:
            lines = file.readlines()
        for line in lines:
            fields = line.split(",")
            if (fields[0] == title ):
                text=line.strip()
                if title in text:
                    print(text)
                    return True
                
    except Exception:
        print(Exception)
    return False
title = input("enter the title of the movie: ")
if not movieDetails(title):
    print("this title doesn't exist")