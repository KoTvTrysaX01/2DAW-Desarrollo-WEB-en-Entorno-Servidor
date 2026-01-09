package com.balmis.user.model;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
import jakarta.validation.constraints.Max;
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
@Table(name = "users")
public class User implements Serializable {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @NotBlank(message = "El nombre es obligatorio")
    @Size(min=1, max=100, message = "El nombre no puede tener más de 100 caracteres")
    @Column(name = "name", nullable = false, unique = false) 
    private String name;

    
    @NotBlank(message = "El email es obligatorio")
    @Size(min=1, max=150, message = "El email no puede tener más de 150 caracteres")
    @Column(name = "email", nullable = false, unique = false) 
    private String email;

    @Min(value = 0, message = "La edad mínima es 0")
    @Max(value = 150, message = "La edad máxima es 150")
    @Column(name = "age", nullable = false, unique = false) 
    private int age;

    
}
