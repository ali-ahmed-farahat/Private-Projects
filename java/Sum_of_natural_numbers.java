import java.util.*;

public class Sum_of_natural_numbers {

    public static void main(String[] args) {
        int sum = 0;
        System.out.println("This program sums the first n natural numbers\n");
        System.out.println("Please enter the number: ");
        Scanner input = new Scanner (System.in);
        int num = input.nextInt();

        for (int i = 1; i <= num; i++) {
            sum += i;
        }

        System.out.println("The sum of numbers from 1 to " + num + " is " + sum);

        input.close();
    }
}


//Sum of Natural Numbers:
//Write a Java program to calculate the sum of the first 'n' natural numbers. 
//You should prompt the user to enter a positive integer 'n' 
//and then compute the sum of all natural numbers from 1 to 'n'. Use a loop to achieve this.
