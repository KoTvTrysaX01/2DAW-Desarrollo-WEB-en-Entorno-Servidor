package com.balmis.clipedh2jpa2.controller;

import com.balmis.clipedh2jpa2.model.Pedido;
import com.balmis.clipedh2jpa2.service.PedidoService;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class PedidoController {

    @Autowired
    private PedidoService pedidoService;
    
    // http://localhost:8080/userh2jpa2v1/h2-console          = Consola de H2
    
    // http://localhost:8080/userh2jpa2v1                     = /static/index.html
    // http://localhost:8080/userh2jpa2v1/static-noexiste     = gestionado por GlobalExceptionHandler
    // http://localhost:8080/userh2jpa2v1/users/api-noexiste  = gestionado por GlobalExceptionHandler
    
    // http://localhost:8080/userh2jpa2v1/users
    @GetMapping("/pedidos")
    public List<Pedido> showUsers() {
        return pedidoService.findAll();
    }
    
    
    // http://localhost:8080/userh2jpa2v1/users/2
    @GetMapping("/pedidos/{id}")
    public Pedido detailsUser(@PathVariable int id) {
        return pedidoService.findById(id); 
    }

    // http://localhost:8080/userh2jpa2v1/users/mayor/7
    @GetMapping("/pedidos/mayor/{id}")
    public List<Pedido> showUsersMayores(@PathVariable int id) {
        return pedidoService.findByIdGrThan(id);
    }
    
    // http://localhost:8080/userh2jpa2v1/users/count
    @GetMapping("/pedidos/count")    
    public Map<String, Object> countUsers() {
        Map<String, Object> obj = new HashMap<>();
        obj.put("Pedidos", pedidoService.count());

        return obj;  // Se mapea automáticamente a JSON usando Jackson        
    }    
    
}

