package com.instalook;

import java.sql.*;
import java.util.Scanner;

public class OutfitDAO {

    public static void verUsuarios() {

        try {

            Connection conn =
                    DatabaseConnection.getConnection();

            Statement st =
                    conn.createStatement();

            ResultSet rs =
                    st.executeQuery(
                            "SELECT id,nombre,email FROM usuarios"
                    );

            System.out.println();
            System.out.println("=== USUARIOS ===");

            while(rs.next()) {

                System.out.println(
                        rs.getInt("id")
                        + " - "
                        + rs.getString("nombre")
                        + " ("
                        + rs.getString("email")
                        + ")"
                );

            }

            conn.close();

        } catch(Exception e) {

            e.printStackTrace();

        }

    }

    public static void verProductos() {

        try {

            Connection conn =
                    DatabaseConnection.getConnection();

            Statement st =
                    conn.createStatement();

            ResultSet rs =
                    st.executeQuery(
                            "SELECT id,nombre,precio FROM productos"
                    );

            System.out.println();
            System.out.println("=== PRODUCTOS ===");

            while(rs.next()) {

                System.out.println(
                        rs.getInt("id")
                        + " - "
                        + rs.getString("nombre")
                        + " - "
                        + rs.getDouble("precio")
                        + " €"
                );

            }

            conn.close();

        } catch(Exception e) {

            e.printStackTrace();

        }

    }

    public static void crearOutfit(Scanner sc) {

        try {

            System.out.print("ID Usuario: ");
            int usuarioId =
                    Integer.parseInt(sc.nextLine());

            System.out.print("Nombre Outfit: ");
            String nombre =
                    sc.nextLine();

            System.out.print("Parte Superior: ");
            String superior =
                    sc.nextLine();

            System.out.print("Parte Inferior: ");
            String inferior =
                    sc.nextLine();

            System.out.print("Calzado: ");
            String calzado =
                    sc.nextLine();

            Connection conn =
                    DatabaseConnection.getConnection();

            PreparedStatement ps =
                    conn.prepareStatement(

                            "INSERT INTO outfits(" +
                            "usuario_id," +
                            "nombre," +
                            "parte_superior," +
                            "parte_inferior," +
                            "calzado" +
                            ") VALUES(?,?,?,?,?)"

                    );

            ps.setInt(1, usuarioId);
            ps.setString(2, nombre);
            ps.setString(3, superior);
            ps.setString(4, inferior);
            ps.setString(5, calzado);

            ps.executeUpdate();

            conn.close();

            System.out.println("Outfit creado correctamente.");

        } catch(Exception e) {

            e.printStackTrace();

        }

    }

    public static void verOutfits() {

        try {

            Connection conn =
                    DatabaseConnection.getConnection();

            Statement st =
                    conn.createStatement();

            ResultSet rs =
                    st.executeQuery(

                            "SELECT o.id,o.nombre," +
                            "u.nombre AS usuario," +
                            "o.parte_superior," +
                            "o.parte_inferior," +
                            "o.calzado " +
                            "FROM outfits o " +
                            "LEFT JOIN usuarios u " +
                            "ON o.usuario_id=u.id"

                    );

            System.out.println();
            System.out.println("=== OUTFITS ===");

            while(rs.next()) {

                System.out.println();
                System.out.println(
                        "ID: " +
                        rs.getInt("id")
                );

                System.out.println(
                        "Usuario: " +
                        rs.getString("usuario")
                );

                System.out.println(
                        "Nombre: " +
                        rs.getString("nombre")
                );

                System.out.println(
                        "Superior: " +
                        rs.getString("parte_superior")
                );

                System.out.println(
                        "Inferior: " +
                        rs.getString("parte_inferior")
                );

                System.out.println(
                        "Calzado: " +
                        rs.getString("calzado")
                );

            }

            conn.close();

        } catch(Exception e) {

            e.printStackTrace();

        }

    }

    public static void eliminarOutfit(Scanner sc) {

        try {

            System.out.print("ID Outfit a eliminar: ");

            int id =
                    Integer.parseInt(sc.nextLine());

            Connection conn =
                    DatabaseConnection.getConnection();

            PreparedStatement ps =
                    conn.prepareStatement(

                            "DELETE FROM outfits WHERE id=?"

                    );

            ps.setInt(1,id);

            ps.executeUpdate();

            conn.close();

            System.out.println("Outfit eliminado.");

        } catch(Exception e) {

            e.printStackTrace();

        }

    }

}
