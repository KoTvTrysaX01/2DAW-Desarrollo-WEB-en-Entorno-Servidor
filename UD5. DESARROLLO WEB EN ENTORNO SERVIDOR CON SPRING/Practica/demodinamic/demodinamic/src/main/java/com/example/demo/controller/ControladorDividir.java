
package com.example.demo.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
@RequestMapping("/dividir")
public class ControladorDividir {

    @ResponseBody
    @GetMapping("/{num1}/{num2}")
    public String getMethodParam(@PathVariable double num1, @PathVariable double num2, @RequestParam(name = "dec", required = false, defaultValue = "0") int dec) {
        return String.format("%." + dec+ "f", (num1 / num2));
    }
}