import os.path

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
def whobooked(title):
    try:
        results = []  # Initialize an empty array to store the occurrences
        title = str(title)
        with open("booked.txt", 'r') as file:
            lines = file.readlines()
        for line in lines:
            line = line.strip()
            fields = line.split(",")
            if fields[1] == title:
                    results.append(line.strip())  # Save the line with the occurrence of the word
                
        if results:
            for result in results:
                print(result)  # Print the array of results
            return True
        else:
            return False
    except Exception:
        print(Exception)
        return False
