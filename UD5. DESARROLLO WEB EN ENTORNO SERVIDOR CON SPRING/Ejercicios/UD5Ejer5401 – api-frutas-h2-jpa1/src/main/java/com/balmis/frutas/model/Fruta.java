package com.balmis.frutas.model;

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
@Table(name = "frutas")
public class Fruta implements Serializable {
    
    private static final long serialVersionUID = 1L;  

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @NotBlank(message = "El nombre es obligatorio")
    @Size(min=1, max=30, message = "El nombre no puede tener más de 30 caracteres")
    @Column(name = "nombre", nullable = false, unique = true) 
    private String nombre;

    @NotBlank(message = "El kg es obligatorio")
    @Min(value = 1, message = "La edad mínima es 1")
    @Column(name = "kg", nullable = false, unique = false) 
    private int kg;

    @NotBlank(message = "El precio es obligatorio")
    @Min(value = 1, message = "La edad mínima es 1")
    @Column(name = "precio", nullable = false, unique = false) 
    private Double precio;

    
}