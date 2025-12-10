package app;

// Comprobación de condiciones con "switch" y cadenas de texto 

public class SwitchCadenas {

    public static void main(String[] args) {
        String nombre = "yo";
        switch (nombre) {
            case "uno":
                System.out.println("Hola, uno");
                break;
            case "yo":
                System.out.println("Hola, tú");
                break;
            case "otro":
                System.out.println("Bienvenido, otro");
                break;
            default:
                System.out.println("Nombre desconocido");
                break;
        }
    }
}
