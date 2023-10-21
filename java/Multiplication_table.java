public class Multiplication_table {
  public static void main(String[] args) {
    System.out.println("This program prints the multiplication table from 1-10\n");

    for (int i = 1; i < 11; i++) {
        for (int j = 1; j < 11; j++) {
            int result = i * j;
            System.out.println(i + " * " + j + " = " + result + "\t");
        }
        System.out.println("\n");
    }
  }  
}

//Multiplication Table:
//Write a Java program to display the multiplication table for a given number.
//Prompt the user to enter an integer, and then use a loop to print the
//multiplication table for that number from 1 to 10.
