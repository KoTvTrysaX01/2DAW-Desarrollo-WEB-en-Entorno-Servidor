
package com.balmis.apirest.model;



import java.io.Serializable;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Size;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

// LOMBOK
@AllArgsConstructor         // => Constructor con todos los argumentos
@NoArgsConstructor          // => Constructor sin argumentos
@Data                       // => @Getter + @Setter + @ToString + @EqualsAndHashCode + @RequiredArgsConstructor

// JPA
@Entity
@Table(name = "users_security")
public class Usuario implements Serializable {

    private static final long serialVersionUID = 1L; 

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    

    @NotBlank(message = "El nombre es obligatorio")
    @Size(min=1, max=100, message = "El nombre no puede tener más de 100 caracteres")
    @Column(name = "username", nullable = false, unique = false) 
    private String username;

    @NotBlank(message = "El email es obligatorio")
    @Size(min=1, max=150, message = "El email no puede tener más de 150 caracteres")
    @Column(name = "email", nullable = false, unique = false) 
    private String email;

    @NotBlank(message = "El password es obligatorio")
    @Column(name = "password", nullable = false, unique = false) 
    private String password;

    
    @Column(name = "administrador", nullable = false, unique = false) 
    private boolean administrador;

    @Column(name = "usuario", nullable = false, unique = false) 
    private boolean usuario;

    @Column(name = "invitado", nullable = false, unique = false) 
    private boolean invitado;
    
    @Column(name = "activado", nullable = false, unique = false) 
    private boolean activado;
    
}