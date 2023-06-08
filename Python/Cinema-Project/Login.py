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
