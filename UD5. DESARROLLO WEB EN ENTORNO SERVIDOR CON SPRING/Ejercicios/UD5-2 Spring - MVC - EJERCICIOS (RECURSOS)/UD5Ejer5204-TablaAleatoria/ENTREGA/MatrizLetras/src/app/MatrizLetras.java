
package app;

import java.util.Random;

public class MatrizLetras {

    public static void main(String[] args) {
        
        char[][] matriz = getMatrizAleatoria();

        
        // Mostrar matriz
        System.out.println("+---+---+---+---+---+---+---+---+---+---+---+");
        System.out.println("|   | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |");
        System.out.println("+---+---+---+---+---+---+---+---+---+---+---+");
        for (int i=0; i<10; i++) {
            System.out.print("| "+i+" |");
            for (int j=0; j<10; j++) {
                System.out.print(" "+matriz[i][j]+" |");
            }
            System.out.println();
            System.out.println("+---+---+---+---+---+---+---+---+---+---+---+");
        }
        
    }
    
    // Método para obtener la matriz con letras aleatorias
    private static char[][] getMatrizAleatoria() {
        char[] letras = {'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
                 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'};
        
        char[][] matriz = new char[10][10];

        // Carga de datos
        for (int i = 0; i < 10; i++) {
            for (int j = 0; j < 10; j++) {
                // Número entre el 65 y 90 -> 27 números posiblea
                Random random = new Random();
                int randomNum = random.nextInt(letras.length);
                matriz[i][j] = letras[randomNum];
            }
        }
        
        return matriz;
    }
    
    
}
