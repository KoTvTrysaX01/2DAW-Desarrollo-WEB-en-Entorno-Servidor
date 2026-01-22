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

import io.swagger.v3.oas.annotations.media.Schema;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@AllArgsConstructor         // => Constructor con todos los argumentos
@NoArgsConstructor          // => Constructor sin argumentos
@Data                       // => @Getter + @Setter + @ToString + @EqualsAndHashCode + @RequiredArgsConstructor

// SWAGGER
@Schema(description = "Modelo de Empleado", name="Empleado")


@Entity
@Table(name = "empleados")
public class Empleado implements Serializable {
    
    private static final long serialVersionUID = 1L;  

    @Schema(description = "ID único del empleado", example = "1")
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @Schema(description = "Nombre del empleado", example = "Vadim")
    @NotBlank(message = "El nombre es obligatorio")
    @Size(min=1, max=50, message = "El nombre no puede tener más de 50 caracteres")
    @Column(name = "nombre", nullable = false, unique = true) 
    private String nombre;

    @Schema(description = "Departamento del empleado", example = "2 Desarrollo de Aplicaciones Web")
    @NotBlank(message = "El departamento es obligatorio")
    @Size(min=1, max=20, message = "El departamento no puede tener más de 20 caracteres")
    @Column(name = "dep", nullable = false, unique = false) 
    private String dep;
    
    @Schema(description = "Departamento del empleado", example = "vad.els@alu.edu.gva.es")
    @NotBlank(message = "El email es obligatorio")
    @Size(min=1, max=60, message = "El email no puede tener más de 60 caracteres")
    @Column(name = "email", nullable = false, unique = true) 
    private String email;

    @Schema(description = "Edad del empleado", example = "24")
    @Min(value = 0, message = "La edad mínima es 0")
    @Column(name = "edad", nullable = false, unique = false) 
    private int edad;

    
}
