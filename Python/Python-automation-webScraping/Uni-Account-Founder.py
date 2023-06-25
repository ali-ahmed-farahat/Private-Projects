#this code finds your uni-Email & password by searching for the ID, but I'm not gonna upload that PDF as it contains
#senstive information

import camelot
import pandas as pd

pdf_tables = camelot.read_pdf("البريد الجامعي.pdf",flavor='stream', pages='1-end')
combined_tables = pd.DataFrame() #empty data frame to append all tables in later on


for table in pdf_tables:
    df = table.df #moving to the next table
    combined_tables = pd.concat([combined_tables, df]) #concatinating this table to all the previous ones

combined_tables.to_csv('البريد الجامعي.csv', index = False, encoding='utf-8-sig') #converting to csv and using this encoding to preserve arabic
                                                                            # characters
csv_tables = pd.read_csv('البريد الجامعي.csv',dtype= {'3':int}) #reading the csv file, keeping in mind that the cloumn 3(id's) is read as int

number = int(input("Please enter your ID to find your universy-email: "))

if (20220001 < number < 20220566): #if the numebr is in the range of id's in the pdf
    filtered_tables = csv_tables[csv_tables['3'] == number] #search for the id matching the number

  #using the .item() to print only the element
  
    print("Your E-mail: " + filtered_tables['1'].item()) #selecting the element in the selected row and cloumn (1) of Emails
    print("Your Password: " + filtered_tables['0'].item()) #same goes for password 
else:
    print("this id doesn't exist")
