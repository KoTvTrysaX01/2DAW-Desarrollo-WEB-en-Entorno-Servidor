package com.balmis.librosh2jpa.model;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
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
@Table(name = "libros")
public class Libro implements Serializable{
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @NotBlank(message = "El titulo es obligatorio")
    @Size(min=1, max=100, message = "El titulo no puede tener más de 100 caracteres")
    @Column(name = "titulo", nullable = false, unique = false) 
    private String titulo;

    
    @NotBlank(message = "El autor es obligatorio")
    @Size(min=1, max=100, message = "El autor no puede tener más de 100 caracteres")
    @Column(name = "autor", nullable = false, unique = false) 
    private String autor;
}
