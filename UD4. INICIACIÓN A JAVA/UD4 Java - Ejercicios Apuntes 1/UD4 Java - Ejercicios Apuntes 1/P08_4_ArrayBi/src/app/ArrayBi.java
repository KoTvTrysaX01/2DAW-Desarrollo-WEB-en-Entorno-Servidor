package app;

public class ArrayBi {

    public static void main(String[] args) {

        int[][] datos = new int[2][2];

        datos[0][0] = 5;
        datos[0][1] = 1;
        datos[1][0] = -2;
        datos[1][1] = 3;

        // +----+----+
        // |  5 |  1 | // fila 0
        // +----+----+
        // | -2 |  3 | // fila 1
        // +----+----+
        for (int i = 0; i < 2; i++) {
            for (int j = 0; j < 2; j++) {
                System.out.println("El dato " + i + "," + j + " vale " + datos[i][j]);
            }
        }
    }
}
