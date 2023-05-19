import os.path

def moviecheck(title):

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
def booking(username,title):
    try:
        if not os.path.exists('booked.txt'):
            f=open('booked.txt','a+')
            lines = f.readlines()
            f.write(title + ", " + username + '\nblank' )
            print("booked successfully")
        else:
            f=open('booked.txt','a+')
            lines = f.readlines()
            data=f.read()
        for line in lines:
                
                fields = line.split(",")
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
    except Exception:
        print(Exception)