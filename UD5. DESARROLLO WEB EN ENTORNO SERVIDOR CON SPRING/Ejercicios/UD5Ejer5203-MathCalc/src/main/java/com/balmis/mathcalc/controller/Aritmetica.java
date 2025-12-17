
package com.balmis.mathcalc.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
@RequestMapping("/xmath/aritmetica")
public class Aritmetica {

    @ResponseBody
    @GetMapping("/sumar/{num1}/{num2}")
    public String getResultadoSumar(@PathVariable int num1, @PathVariable int num2) {
        return String.valueOf(num1 + num2);
    }

    @ResponseBody
    @GetMapping("/restar/{num1}/{num2}")
    public String getResultadoRestar(@PathVariable int num1, @PathVariable int num2) {
        return String.valueOf(num1 - num2);
    }

    @ResponseBody
    @GetMapping("/multiplicar/{num1}/{num2}")
    public String getResultadoMultiplicar(@PathVariable int num1, @PathVariable int num2) {
        return String.valueOf(num1 * num2);
    }

    @ResponseBody
    @GetMapping("/dividir/{num1}/{num2}")
    public String getResultadoDividir(@PathVariable double num1, @PathVariable double num2,
            @RequestParam(name = "dec", required = false, defaultValue = "0") int dec) {
        double result = 0;
        if (dec == 0) {
            result = Math.floor(num1 / num2);
        } else {
            result = (num1 / num2);
        }
        return String.format("%." + dec + "f", result);
    }

    @ResponseBody
    @GetMapping("/porcentaje/{num1}/{num2}")
    public String getResultadoPorcentaje(@PathVariable double num1, @PathVariable double num2,
            @RequestParam(name = "dec", required = false, defaultValue = "0") int dec) {
        double result = 0;
        if (dec == 0) {
            result = Math.floor(num1 / 100 * num2);
        } else {
            result = (num1 / 100 * num2);
        }
        return String.format("%." + dec + "f", result);
    }

}