
package app;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Iterator;
import java.util.List;
import java.util.stream.Collectors;

public class RecorrerArrayList {

    public static void main(String[] args) {

        // Carga de datos
        ArrayList<String> lista = new ArrayList<>();
        lista.add("uno");
        lista.add("dos");

        // Recorrer con for y contador
        for (int i=0; i<lista.size(); i++) {
            String str = lista.get(i);
            System.out.print(str+" ");
        }
        System.out.println();

        // Recorrer con iterator
        Iterator<String> iter   = lista.iterator();
        while (iter.hasNext()) {
            String str = iter.next();
            System.out.print(str+" ");
        }
        System.out.println();
        
        // Recorrer con for de contenido
        for (String str: lista) {
            System.out.print(str+" ");
        }
        System.out.println();
        
        // Recorrer con foreach y lambda
        lista.forEach((str) -> {
            System.out.print(str+" ");
        });
        System.out.println();

        
        // STREAMS vs COLLECTIONS (List, ArrayList, Set, ...)
        // https://www.geeksforgeeks.org/difference-between-streams-and-collections-in-java/        
        
        
        // Recorrer con stream y map
        List<String> collect1 = lista.stream().map(String::toUpperCase).collect(Collectors.toList());
        System.out.println(collect1); // [UNO, DOS]
      
        // Recorrer con stream y map
        List<String> collect2 = lista.stream().map(String::toUpperCase).collect(Collectors.toCollection(ArrayList::new));
        System.out.println(collect2); // [UNO, DOS]
        
        // Recorrer con stream y map
        List<Integer> num = Arrays.asList(1,2,3,4,5);
        List<Integer> collect3 = num.stream().map((n) -> n * 2).collect(Collectors.toList());
        System.out.println(collect3); //[2, 4, 6, 8, 10]        

        // Recorrer con stream y map
        List<String> collect4 = num.stream().map((n) -> n.toString()).collect(Collectors.toList());
        System.out.println(collect4); //["1", "2", "3", "4", "5"]        
        
        

    }
    
}
