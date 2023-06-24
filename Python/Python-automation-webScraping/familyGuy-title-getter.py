import pandas as pd #importing pandas which will have the nessacesary functions

url = 'https://en.wikipedia.org/wiki/List_of_Family_Guy_episodes'  #saving the url that we'll need in a variable
familyGuy = pd.read_html(url) #reading the html page containing tables of seasons
while True:
    seasonNum = int(input("Enter the number of the season: "))  #taking the season number
    episodeNum = int(input("Enter the number of the eposide: ")) #taking the episode nmber
    try:
      #if season is larger than 0 where 0 is the first table on the page which doesn't represent any season
      #and less than 22 where the number of seasons are only 21
        if (0 < seasonNum < 22): 
        
            seasonTable = familyGuy[seasonNum] #taking the table olf this specific season
            episodesInSeason = len(seasonTable) #counting the number of episodes in this season
            if (episodeNum > episodesInSeason): 
              #if the targeted episode is more than the number of all this season episodes
                print("This episode numeber doesn't exist")
                continue #give the user another try
            else:
                rowSelection = seasonTable[seasonTable['No. in season'] == episodeNum] # selecting the row containing this specific episode
                titleSelection = rowSelection.Title.item() # select only the title column and using ".item()" to select only the element
                print(titleSelection)
                answer = input("Do you want to continue? (y) or any other key to exit: ")
                if (answer == 'y' or answer == 'Y'):
                    continue
                else:
                    break
    except Exception:
        print(Exception)
    else:
        print("This season number doesn't exist")
        continue
