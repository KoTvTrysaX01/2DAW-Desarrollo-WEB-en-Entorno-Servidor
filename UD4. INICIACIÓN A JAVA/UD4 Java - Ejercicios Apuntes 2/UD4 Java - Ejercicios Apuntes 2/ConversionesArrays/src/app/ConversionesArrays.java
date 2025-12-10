
package app;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Properties;
import java.util.TreeSet;

public class ConversionesArrays {

    public static void main(String[] args) {

        //*************************
        // String -> Arrays
        String   strColores;
        String[] arrColores;

        strColores="rojo,amarillo,verde,azul";
        arrColores=strColores.split(",");
        for (String color: arrColores) {
            System.out.print(color+"-"); 
        }
        System.out.println();

        strColores="rojo|amarillo|verde|azul";
        arrColores=strColores.split("\\|");
        for (String color: arrColores) {
            System.out.print(color+"-"); 
        }
        System.out.println();
        
        //*************************
        // Arrays -> String
        String[] arrColores2={"rojo","amarillo","verde","azul"};
        String   strColores2=String.join("|",arrColores2);
        System.out.println(strColores2);
        
        //*************************
        // Arrays -> ArrayList
        String[]          arrCiudades  = {"Alicante","Valencia","Castellón"};
        ArrayList<String> listCiudades = new ArrayList<String>(Arrays.asList(arrCiudades));
        listCiudades.forEach((s) -> System.out.print(s+"-"));
        System.out.println();
        
        //*************************
        // ArrayList -> Arrays 
        ArrayList<Integer>  listNumeros = new ArrayList<Integer>();
        Collections.addAll(listNumeros, 1, 2, 3, 4);
        System.out.println(listNumeros.toString());
        
        Integer[] arrNumeros = new Integer[listNumeros.size()];
        listNumeros.toArray(arrNumeros);
        for (Integer num: arrNumeros) {
            System.out.print(num+"-"); 
        }
        System.out.println();
        
        // +------------+--------------+--------------+
        // | interface  | -> interface | -> class     |
        // +------------+--------------+--------------+
        // | Collection |    List      | ArrayList    |
        // | Collection |    Set       | TreeSet      |
        // +------------+--------------+--------------+
        
        ArrayList<String> aList = new ArrayList<>();
        aList.add("verde");
        aList.add("azul");
        aList.add("rojo");
        aList.forEach((s) -> System.out.print(s+"-"));
        System.out.println();

        TreeSet<String> tSet = new TreeSet<>();
        tSet.add("verde");
        tSet.add("azul");
        tSet.add("rojo");
        tSet.forEach((s) -> System.out.print(s+"-"));
        System.out.println();

        
        // +------------+--------------+
        // | interface  | -> class     |
        // +------------+--------------+
        // | Map        | HashMap      |
        // | Map        | Properties   |
        // +------------+--------------+
        
        // HashMap
        HashMap<String,Integer> hMap = new HashMap<>();
        hMap.put("uno",1);
        hMap.put("dos",2);
        hMap.put("tres",3);

        System.out.println("Keys..: " + hMap.keySet());
        System.out.println("Values: " + hMap.values());

        hMap.forEach((key,value) -> System.out.println(key+"-"+value));

        for (String key: hMap.keySet()) {
            System.out.println(key+"-"+hMap.get(key));
        }
        System.out.println();

        // Properties
        Properties prop = new Properties();
        prop.setProperty("nombre","Alberto");
        prop.setProperty("apellido","Gómez");
        prop.setProperty("dni","21578488");

        System.out.println("Keys..: " + prop.keySet());
        System.out.println("Values: " + prop.values());

        prop.forEach((key,value) -> System.out.println(key+"-"+value));

        for (Object key: prop.keySet()) {
            System.out.println(key.toString()+"-"+prop.getProperty(key.toString()));
        }
        System.out.println();
        
        
        
    }
    
}
