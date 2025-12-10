package app;

import java.util.Scanner;

public class Booleano {

    public static void main(String[] args) {

        int dato;
        boolean todoCorrecto;
        Scanner teclado = new Scanner(System.in);

        do {
            System.out.print("Introduce un dato del 0 al 10: ");
            dato = teclado.nextInt();
            todoCorrecto = (dato >= 0) && (dato <= 10);
            if (!todoCorrecto) {
                System.out.println("No es válido!");
            }
        } while (!todoCorrecto);

        System.out.println("Terminado!");
    }
}
