package com.example.demo.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RequestParam;


@Controller
public class DinamicController {

    private static String html="""
<!DOCTYPE html>
<html>
    <head>
        <title>DEMO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>DEMO DINAMIC</h1>
        <div>
            [CONTENIDO]
        </div>
    </body>
</html>                               
                               """;
    
    
    // http://localhost:8080/demodinamic/dinamico
    // Este método devuelve el contenido de un String html gracias a @ResponseBody
    @ResponseBody
    @GetMapping("/dinamico")
    public String dinamico() {
        String salida = html;
        salida=salida.replace("[CONTENIDO]", "<p>Este contenido html es dinámico</p>" );
        return salida;
    }

    
    
    // http://localhost:8080/demodinamic/paramquery?param=saludo
    // http://localhost:8080/demodinamic/paramquery
    // Este método devuelve el contenido de un String html gracias a @ResponseBody
    @ResponseBody
    @GetMapping("/paramquery")
    public String getMethodQuery(@RequestParam String param) {
        String salida = html;
        salida=salida.replace("[CONTENIDO]", param);
        return salida;
    }
    
    
    // http://localhost:8080/demodinamic/paramquery2
    // Este método devuelve el contenido de un String html gracias a @ResponseBody
    @ResponseBody
    @GetMapping("/paramquery2")
    public String getMethodQuery2(
            @RequestParam(name = "param", required = false, defaultValue = "Saludo opcional") String param) {
        String salida = html;
        salida=salida.replace("[CONTENIDO]", param);
        return salida;
    }   
    
    // http://localhost:8080/demodinamic/paramvariable/algo
    // Este método devuelve el contenido de un String html gracias a @ResponseBody
    @ResponseBody
    @GetMapping("/paramvariable/{param1}/{param2}")
    public String getMethodParam(@PathVariable String param1, @PathVariable String param2) {
        return param1 + param2;
    }

}
