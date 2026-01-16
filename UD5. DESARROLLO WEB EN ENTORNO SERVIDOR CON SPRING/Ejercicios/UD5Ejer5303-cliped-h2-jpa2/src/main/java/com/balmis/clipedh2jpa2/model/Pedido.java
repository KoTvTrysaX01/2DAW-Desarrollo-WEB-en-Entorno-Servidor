package com.balmis.clipedh2jpa2.model;

import java.io.Serializable;
import java.sql.Date;

import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;
import jakarta.validation.constraints.Max;
import jakarta.validation.constraints.Min;
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
@ToString(exclude = "cliente")           // Excluir del toString para evitar recursividad
@EqualsAndHashCode(exclude = "cliente")  // Excluir de equals y hashCode para evitar recursividad

// JPA
@Entity
@Table(name = "Pedidos")
@JsonIgnoreProperties({"hibernateLazyInitializer", "handler"}) 
public class Pedido implements Serializable {

    private static final long serialVersionUID = 1L; 
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true) 
    private int id;
    
    @NotBlank(message = "La fecha es obligatorio")
    @Size(min=1, max=20, message = "La fecha no puede tener más de 20 caracteres")
    @Column(name = "fecha", nullable = false, unique = false) 
    private Date fecha;

    
    @NotBlank(message = "El producto es obligatorio")
    @Size(min=1, max=150, message = "El producto no puede tener más de 150 caracteres")
    @Column(name = "producto", nullable = false, unique = false) 
    private String producto;

    @Min(value = 1, message = "La cantidad mínima es 1")
    @Max(value = 15, message = "La cantidad máxima es 15")
    @Column(name = "cantidad", nullable = false, unique = false) 
    private int cantidad;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "cliente_id", referencedColumnName = "id")
    @JsonIgnoreProperties("pedidos")  
    private Cliente cliente;    
    
}