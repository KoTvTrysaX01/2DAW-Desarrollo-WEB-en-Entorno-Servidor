
package app;

import java.util.Calendar;
import java.util.Date;

public class StringToDate {

   public static void main(String[] args) {
        Date fecha;
        
        String strFecha = "05/11/2028";
        System.out.println(stringToDate(strFecha));
        
        String strFechaMySQL = "2028-11-16";
        System.out.println(stringToDateMySQL(strFechaMySQL));

        String strFechaISO = "2028-10-25T15:27:57Z";
        System.out.println(stringToDateISO(strFechaISO));
        
    }
    
   public static Date stringToDateMySQL(String strFecha) {
        // ***********************
        // strFecha = 'AAAA-MM-DD'
        // ***********************
        
        // year - AAAA
        // month - the month between 0-11.
        // date - the day of the month between 1-31.        
        Calendar calendar = Calendar.getInstance();
        calendar.set(Integer.parseInt(strFecha.substring(0, 4)),
                Integer.parseInt(strFecha.substring(5, 7)) - 1,
                Integer.parseInt(strFecha.substring(8, 10)),
                0,0,0);
        return calendar.getTime();
    }

    public static Date stringToDate(String strFecha) {
        // ***********************
        // strFecha = 'dd/mm/AAAA'
        // ***********************

        // year - AAAA
        // month - the month between 0-11.
        // day - the day of the month between 1-31.        
        Calendar calendar = Calendar.getInstance();
        calendar.set(
                Integer.parseInt(strFecha.substring(6, 10)),
                Integer.parseInt(strFecha.substring(3, 5)) - 1,
                Integer.parseInt(strFecha.substring(0, 2)),
                0,0,0
                );
        return calendar.getTime();
    }    
    
    
   public static Date stringToDateISO(String strFecha) {
        // ***********************
        // strDia = 'AAAA-MM-DD';
        // strHora = 'HH:mm:ss';
        // strFecha = strDia+'T'+strHora+'Z';
        // ***********************
      
        Calendar calendar = Calendar.getInstance();
        calendar.set(Integer.parseInt(strFecha.substring(0, 4)),
                Integer.parseInt(strFecha.substring(5, 7)) - 1,
                Integer.parseInt(strFecha.substring(8, 10)),
                Integer.parseInt(strFecha.substring(11, 13)),
                Integer.parseInt(strFecha.substring(14, 16)),
                Integer.parseInt(strFecha.substring(17, 19)));
        return calendar.getTime();
    }    
    
}
