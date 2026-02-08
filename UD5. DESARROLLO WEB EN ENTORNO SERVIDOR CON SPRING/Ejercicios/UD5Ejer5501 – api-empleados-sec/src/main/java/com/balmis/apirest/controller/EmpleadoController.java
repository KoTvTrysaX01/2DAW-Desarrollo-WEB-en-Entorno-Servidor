package com.balmis.apirest.controller;

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

import com.balmis.apirest.model.Empleado;
import com.balmis.apirest.service.EmpleadoService;

import jakarta.validation.Valid;

@RestController
@RequestMapping("/api")
@CrossOrigin(origins = "*")  // Permite CORS desde cualquier origen
public class EmpleadoController {

    @Autowired
    private EmpleadoService empleadoService;

    // http://localhost:8080/bdempleados/h2-console          = Consola de H2
    // http://localhost:8080/bdempleados                     = /static/index.html
    // http://localhost:8080/bdempleados/static-noexiste     = gestionado por GlobalExceptionHandler
    // http://localhost:8080/bdempleados/api/api-noexiste   = gestionado por GlobalExceptionHandler
    // ***************************************************************************
    // CONSULTAS
    // ***************************************************************************
    // http://localhost:8080/bdempleados/api/empleados
    @GetMapping("/empleados")
    public ResponseEntity<List<Empleado>> showAll() {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(empleadoService.findAll());
    }

    // http://localhost:8080/bdempleados/api/empleados/2
    @GetMapping("/empleados/{id}")
    public ResponseEntity<Empleado> showById(@PathVariable int id) {
        Empleado usu = empleadoService.findById(id);

        if (usu == null) {
            return ResponseEntity
                    .status(HttpStatus.NOT_FOUND)
                    .body(null);  // 404 Not Found
        } else {
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(usu);
        }
    }

    // http://localhost:8080/bdempleados/api/empleados/dep/Ventas
    @GetMapping("/empleados/dep/{dep}")
    public ResponseEntity<List<Empleado>> showByDep(@PathVariable String dep) {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(empleadoService.findByDep(dep));
    }
    
    
    // http://localhost:8080/bdempleados/api/empleados/nombre?contiene=pe
    @GetMapping("/empleados/nombre")
    public ResponseEntity<List<Empleado>> showByNombre(@RequestParam("contiene") String nombre) {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(empleadoService.findLikeNombre(nombre));
    }

    // http://localhost:8080/bdempleados/api/empleados/count
    @GetMapping("/empleados/count")
    public ResponseEntity<Map<String, Object>> count() {

        ResponseEntity<Map<String, Object>> response = null;

        Map<String, Object> map = new HashMap<>();
        map.put("count", empleadoService.count());

        response = ResponseEntity
                .status(HttpStatus.OK)
                .contentType(MediaType.APPLICATION_JSON)
                .body(map);

        return response;
    }
        
    
    // ***************************************************************************
    // ACTUALIZACIONES
    // ***************************************************************************
    
    // ****************************************************************************
    // INSERT (POST)    
    // http://localhost:8080/bdempleados/api/empleados
    @PostMapping("/empleados")
    public ResponseEntity<Map<String, Object>> create(
            @Valid @RequestBody Empleado empleado) {
        
        ResponseEntity<Map<String, Object>> response;
        
        if (empleado == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");
            
            response = ResponseEntity
                            .status(HttpStatus.BAD_REQUEST)
                            .body(map);                
        } else {

            if (empleado.getNombre() == null || empleado.getNombre().trim().isEmpty() ||
                empleado.getDep() == null || empleado.getDep().trim().isEmpty() ||
                empleado.getEmail() == null || empleado.getEmail().trim().isEmpty() ||
                empleado.getEdad()<0) {

                Map<String, Object> map = new HashMap<>();
                String error="";
                if (empleado.getNombre() == null || empleado.getNombre().trim().isEmpty()) {
                    if (!error.equals("")) error += " - ";
                    error += "El campo 'nombre' es obligatorio";
                }
                if (empleado.getDep() == null || empleado.getDep().trim().isEmpty()) {
                    if (!error.equals("")) error += " - ";
                    error += "El campo 'dep' es obligatorio";
                }
                if (empleado.getEmail() == null || empleado.getEmail().trim().isEmpty()) {
                    if (!error.equals("")) error += " - ";
                    error += "El campo 'email' es obligatorio";
                }
                if (empleado.getEdad()<0) {
                    if (!error.equals("")) error += " - ";
                    error += "El campo 'precio' debe ser positivo";
                }
                map.put("error", error);
                                
                response = ResponseEntity
                            .status(HttpStatus.BAD_REQUEST)
                            .body(map);                
            } else {
                System.out.println(empleado);
                Empleado objPost = empleadoService.save(empleado);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Empleado creado con éxito");
                map.put("insertRealizado", objPost);
                
                response = ResponseEntity
                                .status(HttpStatus.CREATED)
                                .body(map);
            }
        }
        
        return response;
    }
    
    
    // ****************************************************************************
    // UPDATE (PUT)
    // http://localhost:8080/bdempleados/api/empleados
    @PutMapping("/empleados")
    public ResponseEntity<Map<String, Object>> update(
            @Valid @RequestBody Empleado empleado) {
        
        ResponseEntity<Map<String, Object>> response;
        
        if (empleado == null) {
                Map<String, Object> map = new HashMap<>();
                map.put("error", "El cuerpo de la solicitud no puede estar vacío");
                
                response=ResponseEntity.status(HttpStatus.BAD_REQUEST).body(map);
        } else {
            int id = empleado.getId();
            Empleado existingObj = empleadoService.findById(id);

            if (existingObj == null) {
                Map<String, Object> map = new HashMap<>();
                map.put("error", "Empleado no encontrado");
                map.put("id", id);

                response=ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
            } else {

                // Actualizar campos si están presentes
                if (empleado.getNombre() != null) {
                    existingObj.setNombre(empleado.getNombre());
                }
                if (empleado.getDep() != null) {
                    existingObj.setDep(empleado.getDep());
                }
                if (empleado.getEmail() != null) {
                    existingObj.setEmail(empleado.getEmail());
                }
                if (empleado.getEdad() >= 0) {
                    existingObj.setEdad(empleado.getEdad());
                }

                Empleado objPut = empleadoService.save(existingObj);                
                
                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Empleado actualizado con éxito");
                map.put("updateRealizado", objPut);
                
                response=ResponseEntity.status(HttpStatus.OK).body(map);
            }
        }
        
        return response;
    }
    
    // ****************************************************************************
    // DELETE
    // http://localhost:8080/bdempleados/api/empleados/16
    @DeleteMapping("/empleados/{id}")
    public ResponseEntity<Map<String, Object>> delete(@PathVariable int id) {
        
        ResponseEntity<Map<String, Object>> response;
        
        Empleado existingObj = empleadoService.findById(id);
        if (existingObj == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "Empleado no encontrado");
            map.put("id", id);

            response=ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
        } else {
            
            empleadoService.deleteById(id);
            
            Map<String, Object> map = new HashMap<>();
            map.put("mensaje", "Empleado eliminado con éxito");
            map.put("deletedRealizado", existingObj);
            
            response=ResponseEntity.status(HttpStatus.OK).body(map);
        }
        return response;
    }
    
    


}
