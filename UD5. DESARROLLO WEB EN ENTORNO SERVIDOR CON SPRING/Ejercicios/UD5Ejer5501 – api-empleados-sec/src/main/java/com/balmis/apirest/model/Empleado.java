package com.balmis.apirest.model;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import jakarta.validation.constraints.Min;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Size;
import java.io.Serializable;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@AllArgsConstructor         // => Constructor con todos los argumentos
@NoArgsConstructor          // => Constructor sin argumentos
@Data                       // => @Getter + @Setter + @ToString + @EqualsAndHashCode + @RequiredArgsConstructor

@Entity
@Table(name = "empleados")
public class Empleado implements Serializable {
    
    private static final long serialVersionUID = 1L;  

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @NotBlank(message = "El nombre es obligatorio")
    @Size(min=1, max=50, message = "El nombre no puede tener más de 50 caracteres")
    @Column(name = "nombre", nullable = false, unique = true) 
    private String nombre;

    @NotBlank(message = "El departamento es obligatorio")
    @Size(min=1, max=20, message = "El departamento no puede tener más de 20 caracteres")
    @Column(name = "dep", nullable = false, unique = false) 
    private String dep;
    
    @NotBlank(message = "El email es obligatorio")
    @Size(min=1, max=60, message = "El email no puede tener más de 60 caracteres")
    @Column(name = "email", nullable = false, unique = true) 
    private String email;

    @Min(value = 0, message = "La edad mínima es 0")
    @Column(name = "edad", nullable = false, unique = false) 
    private int edad;

    
}
