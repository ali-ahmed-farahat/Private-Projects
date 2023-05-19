import json
def register(username,password,pathfile):
    try:
        with open(pathfile,'r') as f:
            lines = f.readlines()
            for line in lines:
                
                fields = line.split(",")
                if registercheck(username,pathfile):
                    print("This user already exists")
                    return False
                else:
                    NewUser = (username + ',' + password)
                    file = open(pathfile,'a')
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





