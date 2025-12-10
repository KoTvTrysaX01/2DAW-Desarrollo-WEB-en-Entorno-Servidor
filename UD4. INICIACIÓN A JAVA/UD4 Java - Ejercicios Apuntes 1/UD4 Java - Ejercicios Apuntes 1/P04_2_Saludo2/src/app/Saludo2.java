package app;

import java.util.Scanner;

public class Saludo2 {

    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        System.out.print("Cuántas veces te saludo? ");
        int n = entrada.nextInt();
        entrada.nextLine();

        System.out.print("Y cual es tu nombre? ");
        String nombre = entrada.nextLine();

        for (int i = 0; i < n; i++) {
            System.out.println("Hola " + nombre);
        }
    }
}
