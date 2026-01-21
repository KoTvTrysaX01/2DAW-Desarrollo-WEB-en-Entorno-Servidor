package com.balmis.frutas.controller;

import com.balmis.frutas.model.Fruta;
import com.balmis.frutas.service.FrutaService;
import jakarta.validation.Valid;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/api")
@CrossOrigin(origins = "*")  // Permite CORS desde cualquier origen
public class FrutaController {

    @Autowired
    private FrutaService frutaService;


    @GetMapping("/frutas")
    public ResponseEntity<List<Fruta>> showAll() {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(frutaService.findAll());
    }


    @GetMapping("/frutas/{id}")
    public ResponseEntity<Fruta> showById(@PathVariable int id) {
        Fruta fruta = frutaService.findById(id);

        if (fruta == null) {
            return ResponseEntity
                    .status(HttpStatus.NOT_FOUND)
                    .body(null);  // 404 Not Found
        } else {
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(fruta);
        }
    }

    @GetMapping("/frutas/nombre")
    public ResponseEntity<List<Fruta>> showByNombre(@RequestParam("contiene") String nombre) {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(frutaService.findLikeNombre(nombre));
    }

    @GetMapping("/frutas/count")
    public ResponseEntity<Map<String, Object>> count() {

        ResponseEntity<Map<String, Object>> response = null;

        Map<String, Object> map = new HashMap<>();
        map.put("count", frutaService.count());

        response = ResponseEntity
                .status(HttpStatus.OK)
                .contentType(MediaType.APPLICATION_JSON)
                .body(map);

        return response;
    }





        @PostMapping("/frutas")
    public ResponseEntity<Map<String, Object>> create(
            @Valid @RequestBody Fruta fruta) {
        
        ResponseEntity<Map<String, Object>> response;
        
        if (fruta == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");
            
            response = ResponseEntity
                            .status(HttpStatus.BAD_REQUEST)
                            .body(map);                
        } else {

            if (fruta.getNombre() == null || fruta.getNombre().trim().isEmpty() ||
                fruta.getKg() < 0 ||
                fruta.getPrecio() < 0) {

                Map<String, Object> map = new HashMap<>();
                String error="";
                if (fruta.getNombre() == null || fruta.getNombre().trim().isEmpty()) {
                    if (!error.equals("")) error += " - ";
                    error += "El campo 'nombre' es obligatorio";
                }
                if (fruta.getKg()<0) {
                    if (!error.equals("")) error += " - ";
                    error += "El campo 'kg' debe ser positivo";
                }
                if (fruta.getPrecio()<0) {
                    if (!error.equals("")) error += " - ";
                    error += "El campo 'precio' debe ser positivo";
                }
                map.put("error", error);
                                
                response = ResponseEntity
                            .status(HttpStatus.BAD_REQUEST)
                            .body(map);                
            } else {
                System.out.println(fruta);
                Fruta objPost = frutaService.save(fruta);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Fruta creado con éxito");
                map.put("insertRealizado", objPost);
                
                response = ResponseEntity
                                .status(HttpStatus.CREATED)
                                .body(map);
            }
        }
        
        return response;
    }

}
