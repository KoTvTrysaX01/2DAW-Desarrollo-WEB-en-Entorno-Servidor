package app;

import java.util.TreeSet;

public class TreeSet1 {

    public static void main(String[] args) {

        TreeSet<String> datos = new TreeSet<String>();

        // Añadimos datos 
        datos.add("hola");
        datos.add("adios");
        datos.add("hasta luego");
        datos.add("hola"); // No permite repetidos

        // Y mostramos todos 
        System.out.println("Contenido actual:");
        for (String unDato : datos) // El TreeSet está siempre ordenado
        {
            System.out.println(unDato);
        }
    }
}
