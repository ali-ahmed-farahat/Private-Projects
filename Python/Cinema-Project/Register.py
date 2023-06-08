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
