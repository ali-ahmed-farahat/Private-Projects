import os.path
def createFile(pathfile):
    if not os.path.exists(pathfile):
        open(pathfile,'a+')
        return True
def register(username,password,pathfile):
    try:
        if createFile(pathfile):
            f=open(pathfile,'a+')
            NewUser = (username + ',' + password)    
            f.write(NewUser)
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
                        file.write('\n' + NewUser)
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
        password = str(password)
        with open(pathfile,'r') as file:
            lines = file.readlines()
        for line in lines:
            line = line.strip()
            fields = line.split(",")
            if (fields[0] == username and fields[1] == password ):
                return True
    except Exception:
        print(Exception)
    return False

def bookingmoviecheck(title):

    try:
        with open('movielist.txt','r') as file:
            lines = file.readlines()
        for line in lines:
            fields = line.split(",")
            if (fields[0] == title):
                return True
                
    except Exception:
        print(Exception)
    return False

def BookingCheck(username,title):
    try:
        title = str(title)
        with open("booked.txt",'r') as file:
            lines = file.readlines()
        for line in lines:
            line = line.strip()
            fields = line.split(",")
            if (fields[0] == username and fields[1] == title ):
                return False
    except Exception:
        print(Exception)
    return True


def CountBooking(title):
        count = 0
        with open("booked.txt", 'r') as file:
            for line in file:
                count += line.count(title)
        return count
def booking(username,title):
    try:
        if not os.path.exists('booked.txt'):
                f=open('booked.txt','a+')
                if bookingmoviecheck(title) and BookingCheck(username, title):
                    f.write(username + "," + title)
                    print("booked successfully")
                if not BookingCheck(username, title):
                    print("You already booked this movie")
                if not bookingmoviecheck(title):
                    print("This title doesn't exist")
        else:
            f=open('booked.txt','r')
            lines = f.readlines()
        if os.path.getsize("booked.txt") == 0 and bookingmoviecheck(title) and BookingCheck(username, title):
            # File exists and is empty
            NewBooking = (title + ',' + username)
            file = open('booked.txt','a')
            file.write(NewBooking)
            print("Ticket Booked Successfully")
            return True
        for line in lines:
                    if not BookingCheck(username,title):
                        print("you already booked this movie")
                        return False
                    if not bookingmoviecheck(title):
                        print("This movie doesn't exist")
                    else:
                        count = CountBooking(title)
                        if(count<100):
                                NewBooking = (title + ',' + username)
                                file = open('booked.txt','a')
                                file.write('\n' + NewBooking)
                                print("Ticket Booked Successfully")
                                return True
                        elif (100==count):
                            text=line.strip()
                            if title in text:
                                del text
    except Exception:
        print(Exception)

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

def movieDetails(title):
    try:
        with open('movielist.txt','r') as file:
            lines = file.readlines()
        for line in lines:
            fields = line.split(",")
            if (fields[0] == title ):
                text=line.strip()
                print(text)
        if title in text:
            return True
                
    except Exception:
        return False

def whobooked(title):
    try:
        results = []  # Initialize an empty array to store the occurrences
    
        with open("booked.txt", 'r') as file:
            for line in file:
                if title in line:
                    results.append(line.strip())  # Save the line with the occurrence of the word
                
        if results:
            for result in results:
                print(result)  # Print the array of results
            return True
        else:
            print("No results found.")
            return False
        
    except Exception:
        print(Exception)
        return False
    
def search_word(file_name, word):
    results = []  # Initialize an empty array to store the occurrences
    
    with open(file_name, 'r') as file:
        for line in file:
            if word in line:
                results.append(line.strip())  # Save the line with the occurrence of the word
    

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
            if os.path.exists("vendor.txt"):
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
                        if whobooked(title):
                            print("---------")
                        else:
                            #else print the users who booked that movie
                            print("No one booked that movie or This movie doesn't exist")
                else:
                    print("Wrong username or password!")
                continue
            else:
                print("There're no vendor-users existing")
                continue
        elif type_ofuser == '2': #if 2 (customer)
            username=input("Please enter your username: ") #
            password=input("Please enter your password: ") #takes the data of the user(username-password)
            if os.path.exists("vendor.txt"):
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
                print("There are no customer-users existing")
    else:
        exit()
