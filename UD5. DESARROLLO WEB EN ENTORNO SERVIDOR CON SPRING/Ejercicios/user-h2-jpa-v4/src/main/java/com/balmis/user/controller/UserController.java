package com.balmis.user.controller;

import com.balmis.user.model.User;
import com.balmis.user.service.UserService;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.RequestParam;

@RestController
public class UserController {

    @Autowired
    private UserService userService;

    // http://localhost:8080/userh2jpav4/h2-console = Consola de H2

    // http://localhost:8080/userh2jpav4 = /static/index.html
    // http://localhost:8080/userh2jpav4/static-noexiste = gestionado por
    // GlobalExceptionHandler
    // http://localhost:8080/userh2jpav4/users/api-noexiste = gestionado por
    // GlobalExceptionHandler

    // http://localhost:8080/userh2jpav4/users
    @GetMapping("/users")
    public List<User> showUsers() {
        return userService.findAll();
    }

    // http://localhost:8080/userh2jpav4/users/2
    @GetMapping("/users/{id}")
    public User detailsUser(@PathVariable int id) {
        return userService.findById(id);
    }

    // http://localhost:8080/userh2jpav4/users/mayor/7
    @GetMapping("/users/mayor/{id}")
    public List<User> showUsersMayores(@PathVariable int id) {
        return userService.findByIdGrThan(id);
    }

    // http://localhost:8080/userh2jpav4/users/count
    @GetMapping("/users/count")
    public Map<String, Object> countUsers() {
        Map<String, Object> obj = new HashMap<>();
        obj.put("users", userService.count());

        return obj; // Se mapea automáticamente a JSON usando Jackson
    }

    // http://localhost:8080/userh2jpav4/users/age/hasta/7
    @GetMapping("/users/age/hasta/{age}")
    public List<User> showUsersHasta(@PathVariable int age) {
        return userService.findByAgeLessThan(age);
    }

    @GetMapping("/users/name/contiene/{cadena}")
    public List<User> showUsersNombreContiene(@PathVariable String cadena) {
        return userService.findByNameLike(cadena);
    }

}
