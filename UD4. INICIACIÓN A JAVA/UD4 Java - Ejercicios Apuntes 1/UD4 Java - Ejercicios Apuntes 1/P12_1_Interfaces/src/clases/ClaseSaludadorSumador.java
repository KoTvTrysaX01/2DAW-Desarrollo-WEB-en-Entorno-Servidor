package clases;

import interfaces.Saludador;
import interfaces.Sumador;

public class ClaseSaludadorSumador implements Saludador, Sumador {

    int dato = datoInterno;

    public void saludar() {
        System.out.println("Hola! Mi dato es: " + dato);
    }

    public void sumar(int n) {
        dato = datoInterno + n;
    }
}
