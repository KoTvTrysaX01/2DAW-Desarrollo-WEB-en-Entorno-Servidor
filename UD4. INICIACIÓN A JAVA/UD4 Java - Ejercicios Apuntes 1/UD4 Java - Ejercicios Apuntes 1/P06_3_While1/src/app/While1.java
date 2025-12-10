package app;

import java.util.Scanner;

public class While1 {

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);

        System.out.print("Introduce un cero: ");
        int dato = teclado.nextInt();

        while (dato != 0) {
            System.out.print("No era cero. Introduce cero: ");
            dato = teclado.nextInt();
        }
        System.out.println("Terminado!");
    }
}
