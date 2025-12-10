package app;

import java.util.ArrayList;
import java.util.function.Consumer;

public class Lambda {

    public static void main(String[] args) {
        //https://www.w3schools.com/java/java_lambda.asp
        
        ArrayList<Integer> numbers = new ArrayList<Integer>();
        numbers.add(5);
        numbers.add(9);
        numbers.add(8);
        numbers.add(1);

        // Lambda Direct
        numbers.forEach((n) -> {
            System.out.print(n + " ");
        });
        System.out.println();

        // Lambda Consumer
        Consumer<Integer> method = (n) -> {
            System.out.print(n + " ");
        };
        numbers.forEach(method);
        System.out.println();

    }

}
