package com.balmis.transportistas.controller;

import com.balmis.transportistas.model.Transportista;
import com.balmis.transportistas.service.TransportistaService;
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
@CrossOrigin(origins = "*") // Permite CORS desde cualquier origen
public class TransportistaController {
    @Autowired
    private TransportistaService transportistaService;

    // http://localhost:8080/bdempresa/h2-console = Consola de H2
    // http://localhost:8080/bdempresa = /static/index.html
    // http://localhost:8080/bdempresa/static-noexiste = gestionado por
    // GlobalExceptionHandler
    // http://localhost:8080/bdempresa/api/api-noexiste = gestionado por
    // GlobalExceptionHandler

    // ***************************************************************************
    // CONSULTAS
    // ***************************************************************************
    // http://localhost:8080/bdempresa/api/empleados
    @GetMapping("/transportistas")
    public ResponseEntity<List<Transportista>> showAll() {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(transportistaService.findAll());
    }

    // http://localhost:8080/bdempresa/api/empleados/2
    @GetMapping("/transportistas/{id}")
    public ResponseEntity<Transportista> showById(@PathVariable int id) {
        Transportista tran = transportistaService.findById(id);

        if (tran == null) {
            return ResponseEntity
                    .status(HttpStatus.NOT_FOUND)
                    .body(null); // 404 Not Found
        } else {
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(tran);
        }
    }

    // http://localhost:8080/bdempresa/api/empleados/dep/Ventas
    @GetMapping("/transportistas/matricula/{matricula}")
    public ResponseEntity<Transportista> showByMatricula(@PathVariable String matricula) {
        Transportista tran = transportistaService.findByMatricula(matricula);

        if (tran == null) {
            return ResponseEntity
                    .status(HttpStatus.NOT_FOUND)
                    .body(null); // 404 Not Found
        } else {
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(tran);
        }
    }

    // http://localhost:8080/bdempresa/api/empleados/nombre?contiene=pe
    @GetMapping("/transportistas/nombre")
    public ResponseEntity<List<Transportista>> showByNombre(@RequestParam("contiene") String nombre) {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(transportistaService.findLikeNombre(nombre));
    }

    // http://localhost:8080/bdempresa/api/empleados/count
    @GetMapping("/transportistas/count")
    public ResponseEntity<Map<String, Object>> count() {

        ResponseEntity<Map<String, Object>> response = null;

        Map<String, Object> map = new HashMap<>();
        map.put("count", transportistaService.count());

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
    // http://localhost:8080/bdempresa/api/empleados
    @PostMapping("/transportistas")
    public ResponseEntity<Map<String, Object>> create(
            @Valid @RequestBody Transportista transportista) {

        ResponseEntity<Map<String, Object>> response;

        if (transportista == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity
                    .status(HttpStatus.BAD_REQUEST)
                    .body(map);
        } else {

            if (transportista.getNombre() == null || transportista.getNombre().trim().isEmpty() ||
                    transportista.getTipo_licencia() == null || transportista.getTipo_licencia().trim().isEmpty() ||
                    transportista.getExperiencia() < 0) {

                Map<String, Object> map = new HashMap<>();
                String error = "";
                if (transportista.getNombre() == null || transportista.getNombre().trim().isEmpty()) {
                    if (!error.equals(""))
                        error += " - ";
                    error += "El campo 'nombre' es obligatorio";
                }
                if (transportista.getTipo_licencia() == null || transportista.getTipo_licencia().trim().isEmpty()) {
                    if (!error.equals(""))
                        error += " - ";
                    error += "El campo 'tipo_licencia' es obligatorio";
                }
                if (transportista.getExperiencia() < 0) {
                    if (!error.equals(""))
                        error += " - ";
                    error += "El campo 'experiencia' debe ser positivo";
                }
                map.put("error", error);

                response = ResponseEntity
                        .status(HttpStatus.BAD_REQUEST)
                        .body(map);
            } else {
                System.out.println(transportista);
                Transportista objPost = transportistaService.save(transportista);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Transportista creado con éxito");
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
    // http://localhost:8080/bdempresa/api/empleados
    @PutMapping("/transportistas")
    public ResponseEntity<Map<String, Object>> update(
            @Valid @RequestBody Transportista transportista) {

        ResponseEntity<Map<String, Object>> response;

        if (transportista == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity.status(HttpStatus.BAD_REQUEST).body(map);
        } else {
            int id = transportista.getId();
            Transportista existingObj = transportistaService.findById(id);

            if (existingObj == null) {
                Map<String, Object> map = new HashMap<>();
                map.put("error", "Transportista no encontrado");
                map.put("id", id);

                response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
            } else {

                // Actualizar campos si están presentes
                if (transportista.getNombre() != null) {
                    existingObj.setNombre(transportista.getNombre());
                }
                if (transportista.getTipo_licencia() != null) {
                    existingObj.setTipo_licencia(transportista.getTipo_licencia());
                }
                if (transportista.getExperiencia() >= 0) {
                    existingObj.setExperiencia(transportista.getExperiencia());
                }

                Transportista objPut = transportistaService.save(existingObj);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Transportista actualizado con éxito");
                map.put("updateRealizado", objPut);

                response = ResponseEntity.status(HttpStatus.OK).body(map);
            }
        }

        return response;
    }

    // ***************************************************************************
    // OPERACIONES ESPECIALES DE ACTUALIZACIÓN
    // ***************************************************************************

    // http://localhost:8080/bdempresa/api/empleados/1/asignar/departamento/3
    @PutMapping("/transportistas/{tranId}/asignar/vehiculo/{depId}")
    public ResponseEntity<Map<String, Object>> asignarDep(
            @PathVariable int tranId,
            @PathVariable int vehId) {

        ResponseEntity<Map<String, Object>> response;

        Transportista tran = transportistaService.asignarDepartamento(tranId, vehId);

        if (tran != null) {
            Map<String, Object> map = new HashMap<>();
            map.put("mensaje", "Departamento asignado con éxito");
            map.put("updateRealizado", tran);

            response = ResponseEntity.status(HttpStatus.OK).body(map);

        } else {

            Map<String, Object> map = new HashMap<>();
            map.put("error", "Empleado o Departamento no existe");
            map.put("empId", tranId);
            map.put("depId", vehId);

            response = ResponseEntity.status(HttpStatus.BAD_REQUEST).body(map);
        }

        return response;
    }

    // http://localhost:8080/bdempresa/api/empleados/1/desasignar/departamento
    @PutMapping("/transportistas/{tranId}/desasignar/vehiculo")
    public ResponseEntity<Map<String, Object>> desasignarDep(@PathVariable int tranId) {

        ResponseEntity<Map<String, Object>> response;

        Transportista tran = transportistaService.desasignarDepartamento(tranId);

        if (tran != null) {
            Map<String, Object> map = new HashMap<>();
            map.put("mensaje", "Departamento desasignado con éxito");
            map.put("updateRealizado", tran);

            response = ResponseEntity.status(HttpStatus.OK).body(map);

        } else {

            Map<String, Object> map = new HashMap<>();
            map.put("error", "Empleado no existe");
            map.put("empId", tranId);

            response = ResponseEntity.status(HttpStatus.BAD_REQUEST).body(map);
        }

        return response;
    }

    // ****************************************************************************
    // DELETE
    // http://localhost:8080/bdempresa/api/empleados/16
    @DeleteMapping("/transportistas/{id}")
    public ResponseEntity<Map<String, Object>> delete(@PathVariable int id) {

        ResponseEntity<Map<String, Object>> response;

        Transportista existingObj = transportistaService.findById(id);
        if (existingObj == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "Transportista no encontrado");
            map.put("id", id);

            response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
        } else {

            transportistaService.deleteById(id);

            Map<String, Object> map = new HashMap<>();
            map.put("mensaje", "Empleado eliminado con éxito");
            map.put("deletedRealizado", existingObj);

            response = ResponseEntity.status(HttpStatus.OK).body(map);
        }
        return response;
    }
}
