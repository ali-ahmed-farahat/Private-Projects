import re

text_sample = "a bird searched for worms in a pack of dirt"

while True:
    print(text_sample + "\n-----------------------------------------")
    answer = input("What do you want to do:\n1-search a word\t2-repalce a specific word (any other button to exit): ")
    if answer == '1':
        word = input("Enter the word you want to search from the text sample: ")
        search = re.search(word, text_sample)

        if search:
            print("Pattern Found: ", search.group())

        else:
            print("Pattern not found")

    elif answer == '2':
        replacment_word = input("Please enter the word you wanna replace: ")
        search_rep = re.search(replacment_word, text_sample)
        if (search_rep):
            new_word = input("Enter the new word you wanna insert: ")
            new_text = re.sub(replacment_word, new_word, text_sample)
            print("The editing is done\n" + "The new text is: " + new_text + "\n-------------------")
            text_sample = new_text
        else:
            print("This word is not found")

    else:
        print("Thank you for using my program\n" + "Look into for more codes\n" + "-----------------\n" + 
            "github.com/ali-ahmed-farahat.git")
        exit()
