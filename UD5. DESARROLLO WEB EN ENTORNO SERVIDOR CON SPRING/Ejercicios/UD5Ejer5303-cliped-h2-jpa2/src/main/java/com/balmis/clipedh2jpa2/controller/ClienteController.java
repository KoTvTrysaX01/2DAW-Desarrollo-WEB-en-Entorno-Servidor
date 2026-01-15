package com.balmis.clipedh2jpa2.controller;

import com.balmis.clipedh2jpa2.model.Cliente;
import com.balmis.clipedh2jpa2.service.ClienteService;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class ClienteController {

    @Autowired
    private ClienteService clienteService;


    // http://localhost:8080/userh2jpa2v1/roles
    @GetMapping("/clientes")
    public List<Cliente> showRoles() {
        return clienteService.findAll();
    }    
    
    
    // http://localhost:8080/userh2jpa2v1/roles/2
    @GetMapping("/clientes/{id}")
    public Cliente detailsUser(@PathVariable int id) {
        return clienteService.findById(id); 
    }

    // http://localhost:8080/userh2jpa2v1/roles/mayor/7
    @GetMapping("/clientes/mayor/{id}")
    public List<Cliente> showUsersMayores(@PathVariable int id) {
        return clienteService.findByIdGrThan(id);
    }
    
    // http://localhost:8080/userh2jpa2v1/roles/count
    @GetMapping("/clientes/count")    
    public Map<String, Object> countUsers() {
        Map<String, Object> obj = new HashMap<>();
        obj.put("clientes", clienteService.count());

        return obj;  // Se mapea automáticamente a JSON usando Jackson        
    }        
    
    
}


