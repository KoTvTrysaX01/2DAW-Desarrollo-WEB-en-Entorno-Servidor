package com.balmis.apirest.controller;

import com.balmis.apirest.model.Producto;
import com.balmis.apirest.service.ProductoService;
import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.media.Content;
import io.swagger.v3.oas.annotations.responses.ApiResponse;
import io.swagger.v3.oas.annotations.responses.ApiResponses;
import io.swagger.v3.oas.annotations.tags.Tag;
import jakarta.validation.Valid;
import java.math.BigDecimal;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@Tag(name = "Productos", description = "API para gestión de productos")
@RestController
@RequestMapping("/productos")
public class ProductoController {

    @Autowired
    private ProductoService prodService;

    // ***************************************************************************
    // CONSULTAS
    // ***************************************************************************
    // http://localhost:8080/apirestmergesec/productos
    // ***************************************************************************    
    // SWAGGER
    @Operation(summary = "Obtener todos los productos",
            description = "Retorna una lista con todos los productos disponibles")
    @ApiResponses(value = {
        @ApiResponse(responseCode = "200", description = "Productos obtenidos con éxito")
    })
    // ***************************************************************************    
    @GetMapping("")
    public ResponseEntity<List<Producto>> showProductos() {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(prodService.findAll());
    }

    // http://localhost:8080/apirestmergesec/productos/2
    // ***************************************************************************    
    // SWAGGER
    @Operation(summary = "Obtener producto por ID",
            description = "Retorna un producto específico basado en su ID")
    @ApiResponses(value = {
        @ApiResponse(responseCode = "200", description = "Producto encontrado"),
        @ApiResponse(responseCode = "404", description = "Producto no encontrado", content = @Content())
    })
    // ***************************************************************************    
    @GetMapping("/{id}")
    public ResponseEntity<Producto> detailsProducto(@PathVariable int id) {
        Producto prod = prodService.findById(id);

        if (prod == null) {
            return ResponseEntity
                    .status(HttpStatus.NOT_FOUND)
                    .body(null);  // 404 Not Found
        } else {
            return ResponseEntity
                    .status(HttpStatus.OK)
                    .body(prod);
        }
    }

    // http://localhost:8080/apirestmergesec/productos/mayor/7
    // ***************************************************************************    
    // SWAGGER
    @Operation(summary = "Obtener productos mayores de un ID",
            description = "Retorna una lista con todos los productos con ID mayor que un valor")
    @ApiResponses(value = {
        @ApiResponse(responseCode = "200", description = "Productos obtenidos con éxito")
    })
    // ***************************************************************************    
    @GetMapping("/mayor/{id}")
    public ResponseEntity<List<Producto>> showProductosMayores(@PathVariable int id) {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(prodService.findByIdGrThan(id));
    }

    // http://localhost:8080/apirestmergesec/productos/count
    // ***************************************************************************    
    // SWAGGER
    @Operation(summary = "Obtener el número de productos existentes",
            description = "Retorna la cantidad de productos")
    @ApiResponses(value = {
        @ApiResponse(responseCode = "200", description = "Número de productos obtenidos con éxito", content = @Content())
    })
    // ***************************************************************************    
    @GetMapping("/count")
    public ResponseEntity<Map<String, Object>> countProductos() {

        ResponseEntity<Map<String, Object>> response = null;

        Map<String, Object> map = new HashMap<>();
        map.put("productos", prodService.count());

        response = ResponseEntity
                .status(HttpStatus.OK)
                .body(map);

        return response;
    }

    // ***************************************************************************
    // ACTUALIZACIONES
    // ***************************************************************************
    // ****************************************************************************
    // INSERT (POST)    
    // http://localhost:8080/apirestmergesec/productos
    // ***************************************************************************    
    // SWAGGER
    @Operation(summary = "Crear un nuevo producto",
            description = "Registra un nuevo producto en el sistema con los datos proporcionados")
    @ApiResponses(value = {
        @ApiResponse(responseCode = "201", description = "Producto creado con éxito", content = @Content()),
        @ApiResponse(responseCode = "400", description = "Datos de entrada inválidos", content = @Content())
    })
    // ***************************************************************************    

    @PostMapping("")
    public ResponseEntity<Map<String, Object>> createProducto(
            @Valid @RequestBody Producto prod) {

        ResponseEntity<Map<String, Object>> response;

        if (prod == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity
                    .status(HttpStatus.BAD_REQUEST)
                    .body(map);
        } else {

            if (prod.getDescrip() == null || prod.getDescrip().trim().isEmpty()
                    || ( prod.getPrecio().compareTo(new BigDecimal("0.00")) < 0 ) 
                    ) {

                Map<String, Object> map = new HashMap<>();
                map.put("error", "Los campos descripción y precio son obligatorios");

                response = ResponseEntity
                        .status(HttpStatus.BAD_REQUEST)
                        .body(map);
            } else {
                System.out.println(prod);
                Producto prodPost = prodService.save(prod);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Producto creado con éxito");
                map.put("insertProd", prodPost);

                response = ResponseEntity
                        .status(HttpStatus.CREATED)
                        .body(map);
            }
        }

        return response;
    }

    // ****************************************************************************
    // UPDATE (PUT)
    // http://localhost:8080/apirestmergesec/productos
    // ***************************************************************************    
    // SWAGGER
    @Operation(summary = "Actualizar un producto existente",
            description = "Reemplaza completamente los datos de un producto identificado por su ID")
    @ApiResponses(value = {
        @ApiResponse(responseCode = "201", description = "Producto actualizado con éxito", content = @Content()),
        @ApiResponse(responseCode = "400", description = "Datos de actualización inválidos", content = @Content()),
        @ApiResponse(responseCode = "404", description = "Producto no encontrado", content = @Content())
    })
    // ***************************************************************************    
    @PutMapping("")
    public ResponseEntity<Map<String, Object>> updateProd(
            @Valid @RequestBody Producto prod) {

        ResponseEntity<Map<String, Object>> response;

        if (prod == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity.status(HttpStatus.BAD_REQUEST).body(map);
        } else {
            int id = prod.getId();
            Producto existingProd = prodService.findById(id);

            if (existingProd == null) {
                Map<String, Object> map = new HashMap<>();
                map.put("error", "Producto no encontrado");
                map.put("id", id);

                response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
            } else {

                // Actualizar campos si están presentes
                if (prod.getDescrip() != null) {
                    existingProd.setDescrip(prod.getDescrip());
                }
                existingProd.setPrecio(prod.getPrecio());

                Producto prodPut = prodService.save(existingProd);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Producto actualizado con éxito");
                map.put("updatedProd", prodPut);

                response = ResponseEntity.status(HttpStatus.OK).body(map);
            }
        }

        return response;
    }

    // ****************************************************************************
    // DELETE
    // http://localhost:8080/apirestmergesec/productos/16
    // ***************************************************************************    
    // SWAGGER
    @Operation(summary = "Eliminar producto por ID",
            description = "Elimina un producto específico del sistema")
    @ApiResponses(value = {
        @ApiResponse(responseCode = "201", description = "Producto eliminado con éxito", content = @Content()),
        @ApiResponse(responseCode = "404", description = "Producto no encontrado", content = @Content())
    })
    // ***************************************************************************    
    @DeleteMapping("/{id}")
    public ResponseEntity<Map<String, Object>> deleteProd(@PathVariable int id) {

        ResponseEntity<Map<String, Object>> response;

        Producto existingProd = prodService.findById(id);
        if (existingProd == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "Producto no encontrado");
            map.put("id", id);

            response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
        } else {

            prodService.deleteById(id);

            Map<String, Object> map = new HashMap<>();
            map.put("mensaje", "Producto eliminado con éxito");
            map.put("deletedprod", existingProd);

            response = ResponseEntity.status(HttpStatus.OK).body(map);
        }
        return response;
    }

}
