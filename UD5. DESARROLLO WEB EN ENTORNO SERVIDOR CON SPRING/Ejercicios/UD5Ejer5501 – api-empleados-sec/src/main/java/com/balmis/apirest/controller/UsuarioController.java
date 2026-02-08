package com.balmis.apirest.controller;

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

import com.balmis.apirest.model.Usuario;
import com.balmis.apirest.service.UsuarioService;

import jakarta.validation.Valid;

@RestController
@RequestMapping("/usuarios")
public class UsuarioController {

    @Autowired
    private UsuarioService userService;

    // ***************************************************************************
    // CONSULTAS
    // ***************************************************************************
    // http://localhost:8080/apirestmergesec/users
    // ***************************************************************************     
    @GetMapping("")
    public ResponseEntity<List<Usuario>> showUsers() {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(userService.findAll());
    }

    // http://localhost:8080/apirestmergesec/users/2
    // ***************************************************************************     
    @GetMapping("/{id}")
    public ResponseEntity<Usuario> detailsUser(@PathVariable int id) {
        Usuario usu = userService.findById(id);

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

    @GetMapping("/mayor/{id}")
    public ResponseEntity<List<Usuario>> showUsersMayores(@PathVariable int id) {
        return ResponseEntity
                .status(HttpStatus.OK)
                .body(userService.findByIdGrThan(id));
    }
  
    @GetMapping("/count")
    public ResponseEntity<Map<String, Object>> countUsers() {

        ResponseEntity<Map<String, Object>> response = null;

        Map<String, Object> map = new HashMap<>();
        map.put("users", userService.count());

        response = ResponseEntity
                .status(HttpStatus.OK)
                .body(map);

        return response;
    }
   

    @PostMapping("")
    public ResponseEntity<Map<String, Object>> createUser(
            @Valid @RequestBody Usuario user) {

        ResponseEntity<Map<String, Object>> response;

        if (user == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity
                    .status(HttpStatus.BAD_REQUEST)
                    .body(map);
        } else {

            if (user.getUsername() == null || user.getUsername().trim().isEmpty()
                    || user.getEmail() == null || user.getEmail().trim().isEmpty()
                    || user.getPassword() == null || user.getPassword().trim().isEmpty()
                    ) {

                Map<String, Object> map = new HashMap<>();
                map.put("error", "Los campos 'name', 'email' y 'password' son obligatorios");

                response = ResponseEntity
                        .status(HttpStatus.BAD_REQUEST)
                        .body(map);
            } else {
                System.out.println(user);
                Usuario usuPost = userService.save(user);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Usuario creado con éxito");
                map.put("insertUser", usuPost);

                response = ResponseEntity
                        .status(HttpStatus.CREATED)
                        .body(map);
            }
        }

        return response;
    }

   
    @PutMapping("")
    public ResponseEntity<Map<String, Object>> updateUser(
            @Valid @RequestBody Usuario userUpdate) {

        ResponseEntity<Map<String, Object>> response;

        if (userUpdate == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "El cuerpo de la solicitud no puede estar vacío");

            response = ResponseEntity.status(HttpStatus.BAD_REQUEST).body(map);
        } else {
            int id = userUpdate.getId();
            Usuario existingUser = userService.findById(id);

            if (existingUser == null) {
                Map<String, Object> map = new HashMap<>();
                map.put("error", "Usuario no encontrado");
                map.put("id", id);

                response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
            } else {

                // Actualizar campos si están presentes
                if (userUpdate.getUsername() != null) {
                    existingUser.setUsername(userUpdate.getUsername());
                }
                if (userUpdate.getEmail() != null) {
                    existingUser.setEmail(userUpdate.getEmail());
                }
                if (userUpdate.getPassword() != null) {
                    existingUser.setPassword(userUpdate.getPassword());
                }
                existingUser.setAdministrador(userUpdate.isAdministrador());
                existingUser.setUsuario(userUpdate.isUsuario());
                existingUser.setInvitado(userUpdate.isInvitado());
                existingUser.setActivado(userUpdate.isActivado());                

                Usuario usuPut = userService.save(existingUser);

                Map<String, Object> map = new HashMap<>();
                map.put("mensaje", "Usuario actualizado con éxito");
                map.put("updatedUser", usuPut);

                response = ResponseEntity.status(HttpStatus.OK).body(map);
            }
        }

        return response;
    }

  
    @DeleteMapping("/{id}")
    public ResponseEntity<Map<String, Object>> deleteUser(@PathVariable int id) {

        ResponseEntity<Map<String, Object>> response;

        Usuario existingUser = userService.findById(id);
        if (existingUser == null) {
            Map<String, Object> map = new HashMap<>();
            map.put("error", "Usuario no encontrado");
            map.put("id", id);

            response = ResponseEntity.status(HttpStatus.NOT_FOUND).body(map);
        } else {

            userService.deleteById(id);

            Map<String, Object> map = new HashMap<>();
            map.put("mensaje", "Usuario eliminado con éxito");
            map.put("deletedUser", existingUser);

            response = ResponseEntity.status(HttpStatus.OK).body(map);
        }
        return response;
    }

}