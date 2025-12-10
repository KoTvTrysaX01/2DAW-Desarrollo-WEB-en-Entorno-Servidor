package app;

import clases.ClaseSaludadorSumador;
import clases.ClaseSaludador;

public class Interfaces {

    public static void main(String[] args) {
        ClaseSaludador c1 = new ClaseSaludador();
        c1.saludar();
        
        ClaseSaludadorSumador c2 = new ClaseSaludadorSumador();
        c2.sumar(7);
        c2.saludar();
    }
}
