print("This is a Light bulb resolve problem")

answer_1 = input("Is your bulb plugged?(yes/no)")
if (answer_1 == "yes"):
    if (input("is the bulb burned?(yes/no)") == "yes"):
        print("change the bulb")
    else:
        print("Go to a electric technichan")
else:
    print("Plug it in")
