package com.balmis.thprovincias.service;

import jakarta.annotation.PostConstruct;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Optional;
import java.util.stream.Collectors;

import org.springframework.stereotype.Service;

import com.balmis.thprovincias.model.Provincia;

@Service
public class ProvinciaService {

    private List<Provincia> provincias = new ArrayList<>();

    @PostConstruct 
    public void init() {
        provincias.addAll(
                Arrays.asList(
                        new Provincia(1, "Álava", "País Vasco"),
                        new Provincia(2, "Albacete", "Castilla-La Mancha"),
                        new Provincia(3, "Alicante", "Comunidad Valenciana"),
                        new Provincia(4, "Almería", "Andalucía"),
                        new Provincia(5, "Ávila", "Castilla y León"),
                        new Provincia(6, "Badajoz", "Extremadura"),
                        new Provincia(7, "Islas Baleares", "Islas Baleares"),
                        new Provincia(8, "Barcelona", "Cataluña"),
                        new Provincia(9, "Burgos", "Castilla y León"),
                        new Provincia(10, "Cáceres", "Extremadura"),
                        new Provincia(11, "Cádiz", "Andalucía"),
                        new Provincia(12, "Castellón", "Comunidad Valenciana"),
                        new Provincia(13, "Ciudad Real", "Castilla-La Mancha"),
                        new Provincia(14, "Córdoba", "Andalucía"),
                        new Provincia(15, "La Coruña", "Galicia"),
                        new Provincia(16, "Cuenca", "Castilla-La Mancha"),
                        new Provincia(17, "Gerona", "Cataluña"),
                        new Provincia(18, "Granada", "Andalucía"),
                        new Provincia(19, "Guadalajara", "Castilla-La Mancha"),
                        new Provincia(20, "Guipúzcoa", "País Vasco"),
                        new Provincia(21, "Huelva", "Andalucía"),
                        new Provincia(22, "Huesca", "Aragón"),
                        new Provincia(23, "Jaén", "Andalucía"),
                        new Provincia(24, "León", "Castilla y León"),
                        new Provincia(25, "Lérida", "Cataluña"),
                        new Provincia(26, "La Rioja", "La Rioja"),
                        new Provincia(27, "Lugo", "Galicia"),
                        new Provincia(28, "Madrid", "Madrid"),
                        new Provincia(29, "Málaga", "Andalucía"),
                        new Provincia(30, "Murcia", "Región de Murcia"),
                        new Provincia(31, "Navarra", "Navarra"),
                        new Provincia(32, "Orense", "Galicia"),
                        new Provincia(33, "Asturias", "Asturias"),
                        new Provincia(34, "Palencia", "Castilla y León"),
                        new Provincia(35, "Las Palmas", "Canarias"),
                        new Provincia(36, "Pontevedra", "Galicia"),
                        new Provincia(37, "Salamanca", "Castilla y León"),
                        new Provincia(38, "Santa Cruz de Tenerife", "Canarias"),
                        new Provincia(39, "Cantabria", "Cantabria"),
                        new Provincia(40, "Segovia", "Castilla y León"),
                        new Provincia(41, "Sevilla", "Andalucía"),
                        new Provincia(42, "Soria", "Castilla y León"),
                        new Provincia(43, "Tarragona", "Cataluña"),
                        new Provincia(44, "Teruel", "Aragón"),
                        new Provincia(45, "Toledo", " Castilla-La Mancha"),
                        new Provincia(46, "Valencia", "Comunidad Valenciana"),
                        new Provincia(47, "Valladolid", "Castilla y León"),
                        new Provincia(48, "Vizcaya", "País Vasco"),
                        new Provincia(49, "Zamora", "Castilla y León"),
                        new Provincia(50, "Zaragoza", "Aragón"),
                        new Provincia(51, "Ceuta", "Ceuta"),
                        new Provincia(52, "Melilla", "Melilla")));
    }

    public List<Provincia> findAll() {
        return provincias;
    }

    public Provincia findById(int provinciaId) {
        Optional<Provincia> optProvincia = provincias.stream()
                .filter(p -> p.getId() == provinciaId)
                .findFirst();

        if (optProvincia.isPresent()) {
            return optProvincia.get();
        } else {
            return null;
        }
    }

    public List<Provincia> findByComunidad(String provinciaComunidad) {
        List<Provincia> provinciasDeComunidad = new ArrayList<>();
        provinciasDeComunidad = provincias.stream().filter(p -> p.getComAuto().contains(provinciaComunidad))
                .collect(Collectors.toList());

        return provinciasDeComunidad;
    }

}
