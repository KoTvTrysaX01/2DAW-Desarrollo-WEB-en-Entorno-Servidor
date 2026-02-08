
package com.balmis.apirest.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class SwaggerController {
    
    // http://localhost:8080/apirestmergesec
    @GetMapping("/")
    public String redirectToSwagger() {
        return "redirect:/swagger-ui.html";
    }
}