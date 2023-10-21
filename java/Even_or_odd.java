import java.util.*;

public class Even_or_odd {
    public static void main(String[] args) {
        System.out.println("This Program checks whether the number is even or odd\n");
        System.out.println("Please enter the number you want to test: ");
        Scanner input = new Scanner(System.in);
        int x = input.nextInt();
        
        if (x == 0)
            System.out.println("The number you entered is ZERO");
        else if (x % 2 == 0)
            System.out.println("This number is even");
        else
            System.out.println("This number is odd");
        
        System.out.println("\nThank you so much for using this program");

        input.close();
    }
}

//Even or Odd Number Checker:
//Create a Java program that accepts an integer input from the user.
// Determine whether the input number is even or odd.
// Use an if-else statement to check the number's parity and display the result to the user.
