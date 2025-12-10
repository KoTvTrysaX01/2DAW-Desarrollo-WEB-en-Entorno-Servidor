package app;

import java.util.Scanner;

public class Saludo1 {

    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        System.out.print("Cuántas veces te saludo? ");

        int n = entrada.nextInt();
        for (int i = 0; i < n; i++) {
            System.out.println("Hola mundo.");
        }
    }

}
