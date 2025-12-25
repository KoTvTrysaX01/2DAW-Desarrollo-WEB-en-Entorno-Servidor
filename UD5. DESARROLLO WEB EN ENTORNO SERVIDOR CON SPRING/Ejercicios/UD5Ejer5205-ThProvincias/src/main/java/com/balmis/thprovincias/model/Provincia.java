package com.balmis.thprovincias.model;

import java.io.Serializable;

public class Provincia implements Serializable {

    private int id;
    private String nombre;
    private String comAuto;

    public Provincia() {
    }

    public Provincia(int id, String nombre, String comAuto) {
        this.id = id;
        this.nombre = nombre;
        this.comAuto = comAuto;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getComAuto() {
        return comAuto;
    }

    public void setComAuto(String comAuto) {
        this.comAuto = comAuto;
    }

    @Override
    public String toString() {
        return "Provincia{" + "id=" + id + ", nombre=" + nombre + ", comAuto=" + comAuto +'}';
    }

}