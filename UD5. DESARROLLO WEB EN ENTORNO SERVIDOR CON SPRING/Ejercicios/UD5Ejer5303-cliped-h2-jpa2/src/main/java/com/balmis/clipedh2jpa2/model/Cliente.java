package com.balmis.clipedh2jpa2.model;

import java.io.Serializable;
import java.util.HashSet;
import java.util.Set;

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
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;
import lombok.ToString;

// LOMBOK
@AllArgsConstructor         // => Constructor con todos los argumentos
@NoArgsConstructor          // => Constructor sin argumentos
@Data                       // => @Getter + @Setter + @ToString + @EqualsAndHashCode + @RequiredArgsConstructor
@ToString(exclude = "Pedidos")           // Excluir del toString para evitar recursividad
@EqualsAndHashCode(exclude = "Pedidos")  // Excluir de equals y hashCode para evitar recursividad

// JPA
@Entity
@Table(name = "Clientes")
@JsonIgnoreProperties({"hibernateLazyInitializer", "handler"}) 
public class Cliente implements Serializable {
        
    private static final long serialVersionUID = 1L; 
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id")
    private int id;
    
    @NotBlank(message = "El nombre es obligatorio")
    @Size(min = 1, max = 100, message = "El nombre debe tener entre 1 y 100 caracteres")
    @Column(name = "nombre", nullable = false, unique = true)
    private String nombre;

    @NotBlank(message = "El email es obligatorio")
    @Size(min = 1, max = 150, message = "El email debe tener entre 1 y 150 caracteres")
    @Column(name = "email", nullable = false, unique = true)
    private String email;

    @NotBlank(message = "El telefono del rol es obligatorio")
    @Size(min = 1, max = 20, message = "El telefono debe tener entre 1 y 20 caracteres")
    @Column(name = "telefono", nullable = false, unique = true)
    private String telefono;

    @NotBlank(message = "El direccion del rol es obligatorio")
    @Size(min = 1, max = 150, message = "El direccion debe tener entre 1 y 150 caracteres")
    @Column(name = "direccion", nullable = false, unique = true)
    private String direccion;

    @OneToMany(mappedBy = "Pedidos", cascade = CascadeType.ALL, fetch = FetchType.LAZY)
    @JsonIgnoreProperties("Pedidos")  
    private Set<Pedido> pedidos = new HashSet<>();
    
}


