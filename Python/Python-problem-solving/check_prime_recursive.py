#checking for a prime number

number = int(input("Enter the number you want to detect wheter if it's prime or not: "))

def check_prime(num, divisor):
    
    if (divisor == num):
        return (1)
    result = float(num / divisor)
    if (result.is_integer() == 1):
        return (0)
    
    return (check_prime(num, divisor + 1))

if (check_prime(number, 2) == 1):
    print("the number is prime")
else:
    print("the number is not prime")
