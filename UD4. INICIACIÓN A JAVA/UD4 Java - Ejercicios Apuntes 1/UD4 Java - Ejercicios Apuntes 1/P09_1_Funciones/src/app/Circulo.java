package app;

public class Circulo {

    public static double superfCirculo(int radio) {
        double superf = 3.1415926535 * radio * radio;
        return superf;
    }

    public static void main(String[] args) {
        System.out.println("La superficie de un círculo con radio=3 es:");
        System.out.println(superfCirculo(3));
    }
}
