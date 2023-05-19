import os.path
import math
def ShowAllMovies():
    try:
        if not os.path.exists("movielist.txt"):
            print("there are no availibe movies!!")
            return 
        else:
            file = open('movielist.txt','r')
            lines = file.readlines()
            i=0
            for line in lines:
                while(i%2==0 and i<len(lines)):
                    Pline = lines[i]
                    print(Pline)
                    i=i+2
            if (math.floor(len(lines)/2) > 0):
                print("done")
            print('Total number of availible films is=', math.floor(len(lines)/2))  
            
    except Exception:
        print(Exception)  
        
ShowAllMovies()
