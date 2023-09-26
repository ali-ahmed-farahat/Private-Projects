#A leap year is exactly divisible by 4 except for 
#century years (years ending with 00). 
#The century year is a leap year only if it is 
#perfectly divisible by 400

year = int(input("Enter the year you want to test: "))

if ((year % 2) != 0):
    print("This year is not a leap year")
else:
    div_year_4 = year % 4.0

if(div_year_4 == 0):
    
    if((year % 100) == 0):
        
        if((year % 400) == 0):
            print("This year is a leap year")
        
        else:
            print("This year is not a leap year")
    else:
        print("This year is a leap year")

