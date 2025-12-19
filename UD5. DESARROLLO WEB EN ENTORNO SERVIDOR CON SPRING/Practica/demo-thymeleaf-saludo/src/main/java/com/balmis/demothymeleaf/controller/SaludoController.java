package com.balmis.demothymeleaf.controller;


import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class SaludoController {
    MatrizController matriz = new MatrizController();

    // http://localhost:8080/demosaludo
    @GetMapping("/")
    public String welcome(Model model) {
        matriz.main(null);
        model.addAttribute("mensaje", matriz.returnTabla());
        return "index";
    }
    
    // http://localhost:8080/demosaludo/hola   # Da error si no indicamos el parámetro
    // http://localhost:8080/demosaludo/hola?name=Juan
    @GetMapping("/hola")
    public String welcomeHola(@RequestParam("name") String name, Model model) {
        model.addAttribute("saludo", "Hola "+name);
        return "hola";
    }
    
    // http://localhost:8080/demosaludo/hello  # Usa el valor por defecto para el parámetro
    // http://localhost:8080/demosaludo/hello?name=Miguel
    @GetMapping("/hello")
    public String welcomeHello(@RequestParam(name="name", required=false, defaultValue="Student") String name, Model model) {
        model.addAttribute("saludo", "Hello "+name);
        return "hola";
    }    
    
    // http://localhost:8080/demosaludo/hola/Elena   
    @GetMapping("/hola/{name}")
    public String welcomeHolaPath(@PathVariable String name, Model model) {
        model.addAttribute("saludo", "Hola "+name);
        return "hola";
    }    
    
    
}
