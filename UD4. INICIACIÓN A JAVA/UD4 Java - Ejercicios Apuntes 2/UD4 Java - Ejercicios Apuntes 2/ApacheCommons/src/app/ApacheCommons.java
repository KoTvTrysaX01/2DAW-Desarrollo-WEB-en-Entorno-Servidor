
package app;

import org.apache.commons.lang3.StringUtils;


public class ApacheCommons {
    // https://commons.apache.org/proper/commons-lang/javadocs/api-release/index.html

    public static void main(String[] args) {
       // https://commons.apache.org/proper/commons-lang/javadocs/api-release/org/apache/commons/lang3/StringUtils.html
       String saludo="BIENVENIDO";
       System.out.println(StringUtils.reverse(saludo));
       System.out.println(StringUtils.left(saludo, 4));
       System.out.println(StringUtils.contains(saludo,"I"));
       System.out.println(StringUtils.contains(saludo,"J"));
       System.out.println(StringUtils.repeat("ali",5));
       System.out.println(StringUtils.replace(saludo, "EN", "en"));
       System.out.println(StringUtils.remove(saludo,"EN")); 
    }
    
}
