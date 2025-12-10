
package app;

import java.text.SimpleDateFormat;
import java.util.Date;

public class DateToISO {

    
    public static void main(String[] args) {
        Date fecha;
        
        fecha = new Date();
        
        String strFecha = new SimpleDateFormat("dd/mm/YYYY").format(fecha);
        System.out.println(strFecha);
        
        String strHora = new SimpleDateFormat("HH:mm:ss").format(fecha);
        System.out.println(strHora);
        
        // ISO 8601 Format
        String strFechaISO = new SimpleDateFormat("YYYY-MM-dd'T'HH:mm:ss'Z'").format(fecha);
        System.out.println(strFechaISO);
        
        
    }    
    
 
    
}
