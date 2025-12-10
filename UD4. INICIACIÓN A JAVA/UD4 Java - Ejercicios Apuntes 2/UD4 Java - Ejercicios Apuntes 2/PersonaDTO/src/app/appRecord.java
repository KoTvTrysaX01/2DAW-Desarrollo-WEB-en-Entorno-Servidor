package app;

import records.PersonaDTO;
import records.PersonaDTODefault;

public class appRecord {

    public static void main(String[] args) {

        // PersonaDTO con constructor por defecto
        PersonaDTODefault p = new PersonaDTODefault("pepe", "perez", 20);
        
        System.out.println("Nombre...: " + p.nombre());
        System.out.println("Apellidos: " + p.apellidos());
        System.out.println("Edad.....: " + p.edad());
        System.out.println();


        // PersonaDTO con constructor definido por usuario
        PersonaDTO p1 = new PersonaDTO("pepe", "perez", 20);
        PersonaDTO p2 = new PersonaDTO("pepe", "perez", 20);
        
        System.out.println(p1);

        System.out.println("Nombre...: " + p1.nombre());
        System.out.println("Apellidos: " + p1.apellidos());
        System.out.println("Edad.....: " + p1.edad());
        
        if (p1.isMayorEdad()) {
            System.out.println(p1.getNombreLower()+" es mayor de edad");    
        } else {
            System.out.println(p1.getNombreLower()+" es menor de edad");    
        }
        
        
        if (p1.equals(p2)) {
            System.out.println("p1 es igual a p2");    
        } else {
            System.out.println("p1 NO es igual a p2");    
        }
                
        
    }

}
