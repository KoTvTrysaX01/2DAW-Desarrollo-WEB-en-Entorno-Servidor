package com.balmis.transportistas.model;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;
import jakarta.persistence.CascadeType;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import jakarta.persistence.Table;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Size;
import java.io.Serializable;
import java.util.HashSet;
import java.util.Set;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;
import lombok.ToString;

// LOMBOK
@AllArgsConstructor         // => Constructor con todos los argumentos
@NoArgsConstructor          // => Constructor sin argumentos
@Data                       // => @Getter + @Setter + @ToString + @EqualsAndHashCode + @RequiredArgsConstructor
@ToString(exclude = "transportistas")           // Excluir del toString para evitar recursividad
@EqualsAndHashCode(exclude = "transportistas")  // Excluir de equals y hashCode para evitar recursividad

// JPA
@Entity
@Table(name = "vehiculos")
@JsonIgnoreProperties({"hibernateLazyInitializer", "handler"}) 
public class Vehiculo implements Serializable {
    
    private static final long serialVersionUID = 1L; 

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @NotBlank(message = "La matricula es obligatoria")
    @Size(min=1, max=10, message = "La matricula no puede tener más de 10 caracteres")
    @Column(name = "matricula", nullable = false, unique = true) 
    private String matricula;

    @NotBlank(message = "El tipo es obligatorio")
    @Size(min=1, max=50, message = "El tipo no puede tener más de 50 caracteres")
    @Column(name = "tipo", nullable = false, unique = false) 
    private String tipo;

    @Column(name = "capacidad_carga", nullable = false, unique = false) 
    private double capacidad_carga;

    @OneToMany(mappedBy = "vehiculo", cascade = CascadeType.ALL, fetch = FetchType.LAZY)
    @JsonIgnoreProperties("vehiculo")  
    private Set<Transportista> transportistas = new HashSet<>();
    
}
