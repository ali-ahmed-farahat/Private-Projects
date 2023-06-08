import os.path

def ShowAllMovies():
    try:
        if not os.path.exists("movielist.txt"):
            print("there are no availibe movies!!")
            return 
        else:
            file = open('movielist.txt','r')
            lines = file.readlines()
            i = 0
            for line in lines:
                    Pline = lines[i]
                    print(Pline)
                    i += 1
            print("done")
            print('Total number of availible films is=', len(lines))  
            
    except Exception:
        print(Exception)
