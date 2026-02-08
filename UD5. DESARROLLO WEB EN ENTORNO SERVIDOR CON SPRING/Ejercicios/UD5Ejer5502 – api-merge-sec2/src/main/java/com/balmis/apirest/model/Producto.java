package com.balmis.apirest.model;


import io.swagger.v3.oas.annotations.media.Schema;
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
import java.math.BigDecimal;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

// LOMBOK
@AllArgsConstructor         // => Constructor con todos los argumentos
@NoArgsConstructor          // => Constructor sin argumentos
@Data                       // => @Getter + @Setter + @ToString + @EqualsAndHashCode + @RequiredArgsConstructor

// SWAGGER
@Schema(description = "Modelo de Producto", name="Producto")

// JPA
@Entity
@Table(name = "productos")
public class Producto implements Serializable {

    private static final long serialVersionUID = 1L; 
    
    @Schema(description = "ID único del producto", example = "1")
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @Schema(description = "Descripción del producto", example = "Ordenador portátil")
    @NotBlank(message = "La descripción es obligatoria")
    @Size(min=1, max=100, message = "La descripción no puede tener más de 100 caracteres")
    @Column(name = "descrip", nullable = false, unique = false) 
    private String descrip;

    @Schema(description = "Precio del producto", example = "1510.99")
    @Min(value = 0, message = "El precio mínimo es 0.00")
    @Column(name = "precio", nullable = false, unique = false) 
    private BigDecimal precio;
       
    
    
}
