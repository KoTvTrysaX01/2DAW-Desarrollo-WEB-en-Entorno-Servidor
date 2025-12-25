package com.balmis.thprovincias.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;

import com.balmis.thprovincias.model.Provincia;
import com.balmis.thprovincias.service.ProvinciaService;

@Controller
public class ProvinciaController {

    @Autowired
    private ProvinciaService provinciaService;
    @GetMapping("/provincias")
    public String showProvincias(Model model) {
        model.addAttribute("provincias", provinciaService.findAll());
        return "provincias";
    }

    @GetMapping("/codigo/{id}")
    public String codigoProvincia(@PathVariable int id, Model model) {

        Provincia provincia = provinciaService.findById(id);

        if (provincia != null) {
            model.addAttribute("provincia", provincia);
            return "codigo";
        } else {
            model.addAttribute("provincias", provinciaService.findAll());
            return "provincias";
        }
    }

    @GetMapping("/comunidad/{comAuto}")
    public String comunidadProvincia(@PathVariable String comAuto, Model model) {

        List<Provincia> provincias = provinciaService.findByComunidad(comAuto);

        if (provincias != null) {
            model.addAttribute("provincias", provincias);
            return "comunidad";
        } else {
            model.addAttribute("provincias", provinciaService.findAll());
            return "provincias";
        }
    }

}
