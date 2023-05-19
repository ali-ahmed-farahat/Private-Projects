import math,os.path,json
def createFile(pathfile):
    if not os.path.exists(pathfile):
        x=open(pathfile,'a+')
        return True
def register(username,password,pathfile):
    try:
        if createFile(pathfile):
            f=open(pathfile,'a+')
            NewUser = (username + ',' + password)    
            f.write(NewUser + '\nblank')
            print("Registered Successfully")
            return
        else:
            with open(pathfile,'r') as f:
                lines = f.readlines()
                for line in lines:
                    if registercheck(username,pathfile):
                        print("This user already exists")
                        return False
                    else:
                        file = open(pathfile,'a')
                        NewUser = (username + ',' + password)    
                        file.write('\n' + NewUser + '\nblank')
                        print("Registered Successfully")
                        return True
    except Exception:
        print(Exception)
def registercheck(username,pathfile):

    try:
        with open(pathfile,'r') as file:
            lines = file.readlines()
        for line in lines:
            fields = line.split(",")
            if (fields[0] == username):
                return True
                
    except Exception:
        print(Exception)
    return False
def verifylogin(username,password,pathfile):
    try:
        password = str(password) + '\n'
        with open(pathfile,'r') as file:
            lines = file.readlines()
        for line in lines:
            fields = line.split(",")
            if (fields[0] == username and fields[1] == password ):
                return True
    except Exception:
        print(Exception)
    return False

def BookingCheck(username,title):
    try:
        title = str(title) + '\n'
        with open('booked.txt','r') as file:
            lines = file.readlines()
        for line in lines:
            fields = line.split(",")
            if (fields[0] == username and fields[1] == title ):
                return True
    except Exception:
        print(Exception)
    return False
def booking(username,title):
    try:
        if os.path.exists('booked.txt'):
            f=open('booked.txt','r')
            lines = f.readlines()
            
        else:
            f=open('booked.txt','a+')
            lines = f.readlines()
            data=f.read()
        for line in lines:
                
            #fields = line.split(",")
            if (moviecheck(title)):
                if BookingCheck(username,title):
                    print("you already booked this movie")
                    return False
                else:
                    count = CountBooking()
                    if(count<100):
                        NewBooking = (title + ',' + username)
                        file = open('booked.txt','a')
                        file.write('\n' + NewBooking + '\nblank')
                        print("Ticket Booked Successfully")
                        return True
                    elif (100==count):
                        text=line.strip()
                        if title in text:
                            del text
            else:
                print("This movie doesn't exist")
    except Exception:
        print(Exception)


def CountBooking(title):
    f=open('booked.txt','r')
    data=f.read()
    count = data.count(title)
    return count

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
        return False

def whobooked(title):
    try:
        with open('booked.txt','r') as file:
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

def addM(title,description):
    try:
        if not os.path.exists('./movielist.txt'):
            with open('movielist.txt','a+') as f:
                lines = f.readlines()
                NewMovie=(title + ', ' + description)
                f.write(NewMovie + '\nblank')
                print("Added successfully!")
                return
        
        f=open("movielist.txt",'a+')
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

def choice1_2():
    while True:
        choice=input('(1/2/any other key to exit) = ')
        if choice == '1':
            return choice
        elif choice == '2':
            return choice
        else:
            break
while True:
    print("Welcome to the Cinema Booking System Project")
    print("Executed by:Ali Farahat")
    print("--------------------------------------")
    print("Choose what you want to do")
    print("1-Register\n2-login\nany other key to exit")
    user_choice= input("(1/2/any other key)= ")  #takes the user choice whether login or register
    if user_choice=='1': #if register
        print("1-Vendor\n2-Customer")  #choose your type (vendor/cutomer)
        type_ofuser=choice1_2()  #taked input (1/2)
        if type_ofuser =='1':  #if 1 (vendor)
            username=input("Please enter your username: ")
            password=input("Please enter your password: ")
            register(username,password,'vendor.txt')
            continue
        elif type_ofuser == '2': #if 2 (customer)
            username=input("Please enter your username: ")
            password=input("Please enter your password: ")
            register(username,password,'customer.txt')
            continue
    elif user_choice=='2':  #if login
        print("1-Vendor\n2-Customer")  #choose your type (vendor/cutomer)
        type_ofuser=choice1_2()  #taked input (1/2)
        if type_ofuser =='1':  #if 1 (vendor)
            username=input("Please enter your username: ") #
            password=input("Please enter your password: ") #takes the data of the user(username-password)
            if verifylogin(username,password,'vendor.txt'): #if logging in can be done
                print("Logged in successfully!")    
                print("1-Add a movie\n2-Search who booked a specific movie\nany other key to exit") #what does the user want to do
                vendor_choice = choice1_2() #takes input
                if vendor_choice == '1': #if he wants to add a movie
                    title=input("Please enter the title of the movie: ") #takes the title of the movie
                    if moviecheck(title): #checks that the title of the movie doesn't exist (if exists)
                        continue #prints the movie already exists and start over
                    else:
                        description= input("Please enter the description of a movie: ") #takes the description of the movie
                        addM(title,description)  #adds the movie to the movie list file
                        continue  #prints the movie added successfully and starts over
                if vendor_choice == '2': #if he wants to see who booked a specific movie
                    title = input("Please enter the title of the movie: ")
                    if not whobooked(title): #if the title doesn't exist
                        print("This title doesn't exist(OR NO ONE HAS BOOKED IT YET)")
                        continue #start over
                    else:
                        whobooked(title) #else print the users who booked that movie
                        continue
            else:
                print("Wrong username or password!")
                continue
        elif type_ofuser == '2': #if 2 (customer)
            username=input("Please enter your username: ") #
            password=input("Please enter your password: ") #takes the data of the user(username-password)
            if verifylogin(username,password,'customer.txt'):
                ShowAllMovies()
                print("1-Book a movie\n2-Show specific movie details\nany other key to exit")
                customer_choice = choice1_2()
                if customer_choice == '1': #if he wants to book a movie
                    while True:
                        username2=input("Please re-enter your username: ")
                        if (username != username2):
                            print("This isn't your username")
                            continue
                        else:
                            break
                    title= input("Please enter the title of the movie: ")
                    booking(username,title) #booking the movie
                elif customer_choice == '2':  #if he wants to see details of a specific movie
                    title= input("Please enter the title of the movie: ")
                    if not movieDetails(title):
                        print("this movie doesn't exist!")
                        continue
                    else:
                        movieDetails(title)
                        continue
            else:
                print("Wrong username or password!")
                continue
    else:
        exit()

