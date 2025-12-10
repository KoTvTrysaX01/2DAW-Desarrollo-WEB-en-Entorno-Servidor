package app;

import java.util.HashMap;
import java.util.Iterator;

public class HashMap1 {

    public static void main(String[] args) {

        HashMap<Integer, String> tabla = new HashMap<Integer, String>();

        // Añadimos datos 
        tabla.put(1, "uno");
        tabla.put(3, "tres");
        tabla.put(5, "cinco");

        if (tabla.containsKey(5)) {
            System.out.println("Aparece la clave 5");
        }

        if (tabla.containsValue("Tres")) {
            System.out.println("Aparece el valor Tres");
        }

        int clave = 1;
        String valor = tabla.get(clave);
        System.out.println("El valor para 1 es " + valor);

        System.out.println("Tamaño de la tabla: " + tabla.size());

        if (tabla.isEmpty()) {
            System.out.println("Está vacía");
        }

        Iterator<Integer> iterador = tabla.keySet().iterator();
        while (iterador.hasNext()) {
            int claveActual = iterador.next();
            System.out.println("Clave: " + claveActual
                    + " valor: " + tabla.get(claveActual));
        }

    }
}
