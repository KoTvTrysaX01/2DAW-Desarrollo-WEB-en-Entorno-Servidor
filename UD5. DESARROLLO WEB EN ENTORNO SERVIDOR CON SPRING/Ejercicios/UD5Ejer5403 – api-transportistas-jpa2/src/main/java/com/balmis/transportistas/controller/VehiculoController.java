package com.balmis.transportistas.controller;

import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.springframework.http.MediaType;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.balmis.transportistas.model.Transportista;
import com.balmis.transportistas.model.Vehiculo;
import com.balmis.transportistas.service.VehiculoService;

import jakarta.validation.Valid;

@RestController
@RequestMapping("/api")
@CrossOrigin(origins = "*") // Permite CORS desde cualquier origen
public class VehiculoController {
    @Autowired
    private VehiculoService vehiculoService;

    // http://localhost:8080/bdempresa/h2-console = Consola de H2
    // http://localhost:8080/bdempresa = /static/index.html
    // http://localhost:8080/bdempresa/static-noexiste = gestionado por
    // GlobalExceptionHandler
    // http://localhost:8080/bdempresa/rest/api-noexiste = gestionado por
    // GlobalExceptionHandler

    // ***************************************************************************
    // CONSULTAS
    // ***************************************************************************
    // http://localhost:8080/bdempresa/api/departamentos
    @GetMapping("/vehiculos")
    public ResponseEntity<List<Vehiculo>> showAll() {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(vehiculoService.findAll());
    }

    // http://localhost:8080/bdempresa/api/departamentos/2
    @GetMapping("/vehiculos/{id}")
    public ResponseEntity<Vehiculo> showById(@PathVariable int id) {
        Vehiculo veh = vehiculoService.findById(id);

        if (veh == null) {
            return ResponseEntity
                    .status(HttpStatus.NOT_FOUND)
                    .body(null); // 404 Not Found
        } else {
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(veh);
        }
    }

    // http://localhost:8080/bdempresa/api/empleados/dep/Ventas
    @GetMapping("/vehiculos/matricula/{matricula}")
    public ResponseEntity<Vehiculo> showByMatricula(@PathVariable String matricula) {
        Vehiculo veh = vehiculoService.findByMatricula(matricula);

        if (veh == null) {
            return ResponseEntity
                    .status(HttpStatus.NOT_FOUND)
                    .body(null); // 404 Not Found
        } else {
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(veh);
        }
    }

    // http://localhost:8080/bdempresa/api/departamentos/count
    @GetMapping("/vehiculos/count")
    public ResponseEntity<Map<String, Object>> count() {

        ResponseEntity<Map<String, Object>> response = null;

        Map<String, Object> map = new HashMap<>();
        map.put("count", vehiculoService.count());

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
    // http://localhost:8080/bdempresa/api/departamentos
    @PostMapping("/vehiculos")
    public ResponseEntity<Map<String, Object>> create(
            @Valid @RequestBody Vehiculo veh) {

        ResponseEntity<Map<String, Object>> response;

        if (veh == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity
                    .status(HttpStatus.BAD_REQUEST)
                    .body(map);
        } else {

            if (veh.getMatricula() == null || veh.getMatricula().trim().isEmpty() ||
                    veh.getTipo() == null || veh.getTipo().trim().isEmpty()) {

                Map<String, Object> map = new HashMap<>();
                String error = "";
                if (veh.getMatricula() == null || veh.getMatricula().trim().isEmpty()) {
                    if (!error.equals(""))
                        error += " - ";
                    error += "El campo 'matricual' es obligatorio";
                }
                if (veh.getTipo() == null || veh.getTipo().trim().isEmpty()) {
                    if (!error.equals(""))
                        error += " - ";
                    error += "El campo 'tipo' es obligatorio";
                }
                map.put("error", error);

                response = ResponseEntity
                        .status(HttpStatus.BAD_REQUEST)
                        .body(map);
            } else {
                System.out.println(veh);
                Vehiculo objPost = vehiculoService.save(veh);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Departamento creado con éxito");
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
    // http://localhost:8080/bdempresa/api/departamentos
    @PutMapping("/vehiculos")
    public ResponseEntity<Map<String, Object>> update(
            @Valid @RequestBody Vehiculo veh) {

        ResponseEntity<Map<String, Object>> response;

        if (veh == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity.status(HttpStatus.BAD_REQUEST).body(map);
        } else {
            int id = veh.getId();
            Vehiculo existingObj = vehiculoService.findById(id);

            if (existingObj == null) {
                Map<String, Object> map = new HashMap<>();
                map.put("error", "Departamento no encontrado");
                map.put("id", id);

                response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
            } else {

                // Actualizar campos si están presentes
                if (veh.getMatricula() != null) {
                    existingObj.setMatricula(veh.getMatricula());
                }
                if (veh.getTipo() != null) {
                    existingObj.setTipo(veh.getTipo());
                }
                existingObj.setCapacidad_carga(veh.getCapacidad_carga());

                Vehiculo objPut = vehiculoService.save(existingObj);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Vehiculo actualizado con éxito");
                map.put("updateRealizado", objPut);

                response = ResponseEntity.status(HttpStatus.OK).body(map);
            }
        }

        return response;
    }

    // ****************************************************************************
    // DELETE
    // http://localhost:8080/bdempresa/api/departamentos/16
    @DeleteMapping("/vehiculos/{id}")
    public ResponseEntity<Map<String, Object>> delete(@PathVariable int id) {

        ResponseEntity<Map<String, Object>> response;

        Vehiculo existingObj = vehiculoService.findById(id);
        if (existingObj == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "Vehiculo no encontrado");
            map.put("id", id);

            response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
        } else {

            vehiculoService.deleteById(id);

            Map<String, Object> map = new HashMap<>();
            map.put("mensaje", "Vehiculo eliminado con éxito");
            map.put("deletedRealizado", existingObj);

            response = ResponseEntity.status(HttpStatus.OK).body(map);
        }
        return response;
    }

}
