package records;

public record PersonaDTO(String nombre, String apellidos, int edad) {

    public PersonaDTO(String nombre, String apellidos, int edad) {
        this.nombre = nombre.toUpperCase();
        this.apellidos = apellidos.toUpperCase();
        this.edad = edad;
    }

    public String getNombreLower() {
        return this.nombre.toLowerCase();
    }

    public boolean isMayorEdad() {

        return (this.edad >= 18);
    }
}
