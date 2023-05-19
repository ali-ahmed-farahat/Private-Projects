import math
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

username = input("Please enter your username: ")
password = input("Please enter your password: ")

status = verifylogin (username,password,"vendor.txt")
if status:
    print('Logged in successfully')
