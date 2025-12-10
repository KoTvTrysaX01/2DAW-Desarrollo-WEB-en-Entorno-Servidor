package app;

import java.util.Scanner;

public class DoWhile1 {

    public static void main(String[] args) {
        int password;
        Scanner teclado = new Scanner(System.in);

        do {
            System.out.print("Introduzca su password numérica: ");
            password = teclado.nextInt();

            if (password != 1234) {
                System.out.println("No es válida.");
            }
        } while (password != 1234);

    }
}
