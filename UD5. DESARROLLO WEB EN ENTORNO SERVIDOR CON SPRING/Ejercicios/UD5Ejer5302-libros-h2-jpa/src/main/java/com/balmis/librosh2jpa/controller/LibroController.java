package com.balmis.librosh2jpa.controller;

import com.balmis.librosh2jpa.model.Libro;
import com.balmis.librosh2jpa.service.LibroService;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class LibroController {

    @Autowired
    private LibroService userService;

    // http://localhost:8080/userh2jpav4/h2-console = Consola de H2

    // http://localhost:8080/userh2jpav4 = /static/index.html
    // http://localhost:8080/userh2jpav4/static-noexiste = gestionado por
    // GlobalExceptionHandler
    // http://localhost:8080/userh2jpav4/users/api-noexiste = gestionado por
    // GlobalExceptionHandler

    // http://localhost:8080/userh2jpav4/users
    @GetMapping("/libros")
    public List<Libro> showUsers() {
        return userService.findAll();
    }

    // http://localhost:8080/userh2jpav4/users/2
    @GetMapping("/libros/{id}")
    public Libro detailsUser(@PathVariable int id) {
        return userService.findById(id);
    }

    // http://localhost:8080/userh2jpav4/users/mayor/7
    @GetMapping("/libros/mayor/{id}")
    public List<Libro> showUsersMayores(@PathVariable int id) {
        return userService.findByIdGrThan(id);
    }

    // http://localhost:8080/userh2jpav4/users/count
    @GetMapping("/libros/count")
    public Map<String, Object> countUsers() {
        Map<String, Object> obj = new HashMap<>();
        obj.put("libros", userService.count());

        return obj; // Se mapea automáticamente a JSON usando Jackson
    }
}
