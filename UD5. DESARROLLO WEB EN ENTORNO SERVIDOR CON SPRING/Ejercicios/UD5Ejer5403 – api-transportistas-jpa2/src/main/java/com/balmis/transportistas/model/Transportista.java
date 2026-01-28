package com.balmis.transportistas.model;

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
import jakarta.validation.constraints.Min;
import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Size;
import java.io.Serializable;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;
import lombok.ToString;

// LOMBOK
@AllArgsConstructor // => Constructor con todos los argumentos
@NoArgsConstructor // => Constructor sin argumentos
@Data // => @Getter + @Setter + @ToString + @EqualsAndHashCode +
      // @RequiredArgsConstructor
@ToString(exclude = "vehiculo") // Excluir del toString para evitar recursividad
@EqualsAndHashCode(exclude = "vehiculo") // Excluir de equals y hashCode para evitar recursividad

// JPA
@Entity
@Table(name = "transportistas")
@JsonIgnoreProperties({ "hibernateLazyInitializer", "handler" })
public class Transportista implements Serializable {

    private static final long serialVersionUID = 1L;

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false, unique = true)
    private int id;

    @NotBlank(message = "El nombre es obligatorio")
    @Size(min = 1, max = 100, message = "El nombre no puede tener más de 100 caracteres")
    @Column(name = "nombre", nullable = false, unique = true)
    private String nombre;

    @NotBlank(message = "El tipo de licencia es obligatorio")
    @Size(min = 1, max = 10, message = "El tipo de licencia no puede tener más de 10 caracteres")
    @Column(name = "tipo_licencia", nullable = false, unique = true)
    private String tipo_licencia;

    @Min(value = 0, message = "La experiencia mínima es 0")
    @Column(name = "experiencia", nullable = false, unique = false)
    private int experiencia;

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "vehiculo_id", referencedColumnName = "id")
    @JsonIgnoreProperties("transportistas")
    private Vehiculo vehiculo;
}
