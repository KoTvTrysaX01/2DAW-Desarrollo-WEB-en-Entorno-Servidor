package com.example.demo;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class DemoApplication {

    public static void main(String[] args) {
        SpringApplication.run(DemoApplication.class, args);
        System.out.println("Prueba de UTF-8: áéíóú");
    }

    // http://localhost:8080/demodinamic                         => /static/index.html
    // http://localhost:8080/demodinamic/dinamico                => String html con testo fijo
    // http://localhost:8080/demodinamic/paramvariable/algo      => String html con el texto del path  de la URL
    // http://localhost:8080/demodinamic/paramquery?param=saludo => String html con el texto del query de la URL
}
