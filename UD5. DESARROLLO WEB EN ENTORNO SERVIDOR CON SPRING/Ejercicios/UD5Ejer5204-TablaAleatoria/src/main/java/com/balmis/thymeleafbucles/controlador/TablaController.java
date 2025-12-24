package com.balmis.thymeleafbucles.controlador;

import java.util.Random;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;


@Controller
public class TablaController {

    @GetMapping("/")
    public String crearMatriz(Model model) {
        char[] letras = { 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
                'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z' };

        char[][] matriz = new char[10][10];

        for (int i = 0; i < 10; i++) {
            for (int j = 0; j < 10; j++) {

                Random random = new Random();
                int randomNum = random.nextInt(letras.length);
                matriz[i][j] = letras[randomNum];
            }
        }
        model.addAttribute("matriz", matriz);
        return "index";
    }
}
