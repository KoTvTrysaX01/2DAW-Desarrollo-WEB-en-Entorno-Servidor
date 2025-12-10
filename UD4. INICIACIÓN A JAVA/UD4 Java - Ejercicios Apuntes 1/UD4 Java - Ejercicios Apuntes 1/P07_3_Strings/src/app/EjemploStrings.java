package app;

import java.util.Scanner;

public class EjemploStrings {

    public static void main(String[] args) {

        // Forma "sencilla" de dar un valor 
        String texto1 = "Hola";

        // Declarar y dar valor usando un "constructor" 
        String texto2 = new String("Prueba");

        // Declarar sin dar valor
        String resultado;

        // Manipulaciones básicas 
        System.out.print("La primera cadena de texto es: ");
        System.out.println(texto1);

        resultado = texto1 + texto2;
        System.out.println("Si concatenamos las dos: " + resultado);

        resultado = texto1 + 5 + " " + 23.5 + '.';
        System.out.println("Podemos concatenar varios: " + resultado);
        System.out.println("La longitud de la segunda es: " + texto2.length());
        System.out.println("La segunda letra de texto2 es: " + texto2.charAt(1));

        // En general, las operaciones no modifican la cadena 
        texto2.toUpperCase();
        System.out.println("texto2 no ha cambiado a mayúsculas: " + texto2);
        resultado = texto2.toUpperCase();
        System.out.println("Ahora sí: " + resultado);

        // Podemos extraer fragmentos 
        resultado = texto2.substring(2, 5);
        System.out.println("Tres letras desde la posición 2: " + resultado);

        // Y podemos comparar cadenas 
        System.out.println("Comparamos texto1 y texto2: " + texto1.compareTo(texto2));
        if (texto1.compareTo(texto2) < 0) {
            System.out.println("Texto1 es menor que texto2");
        }

        // Finalmente, pedimos su nombre completo al usuario
        System.out.print("¿Cómo te llamas? ");
        Scanner teclado = new Scanner(System.in);
        String nombre = teclado.nextLine();
        System.out.println("Hola, " + nombre);

        // O podemos bien leer sólo la primera palabra
        System.out.print("Teclea varias palabras y espacios... ");
        String primeraPalabra = teclado.next();
        System.out.println("La primera es " + primeraPalabra);

    }
}
