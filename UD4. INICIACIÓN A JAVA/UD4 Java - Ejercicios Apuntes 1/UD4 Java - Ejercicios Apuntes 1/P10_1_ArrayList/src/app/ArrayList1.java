package app;

import java.util.ArrayList;   // Para ArrayList
import java.util.Collections; // Para ordenar ArrayList 

public class ArrayList1 {

    public static void main(String[] args) {
        ArrayList<String> datos = new ArrayList<String>();

        // Añadimos datos 
        datos.add("hola");
        datos.add("adios");
        datos.add("hasta luego");

        // Ordenamos 
        Collections.sort(datos);

        // Mostramos el primero... si existe 
        if (datos.size() > 0) {
            System.out.println("Primer dato: " + datos.get(0));
        }

        // Borramos el primero 
        datos.remove("adios");

        // Buscamos uno 
        if (datos.contains("hola")) {
            System.out.println("Aparece \"hola\"");
        }

        // Y mostramos todos 
        System.out.println("Contenido actual:");
        for (String unDato : datos) {
            System.out.println(unDato);
        }
    }
}
