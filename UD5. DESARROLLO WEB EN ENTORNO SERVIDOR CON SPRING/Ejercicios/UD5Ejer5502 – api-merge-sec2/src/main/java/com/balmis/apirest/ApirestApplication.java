package com.balmis.apirest;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class ApirestApplication {

    // http://localhost:8080/apirestmergesec                     = redirige a /swagger-ui.html
    // http://localhost:8080/apirestmergesec/h2-console          = Consola de H2
    // http://localhost:8080/apirestmergesec/static-noexiste     = gestionado por GlobalExceptionHandler
    // http://localhost:8080/apirestmergesec/users/api-noexiste  = gestionado por GlobalExceptionHandler
    
    public static void main(String[] args) {
        SpringApplication.run(ApirestApplication.class, args);
    }
    
}
