package com.instalook;

import java.util.Scanner;

public class Main {

    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);

        int opcion;

        do {

            System.out.println();
            System.out.println("=================================");
            System.out.println(" INSTA LOOK OUTFIT MANAGER");
            System.out.println("=================================");
            System.out.println("1. Ver usuarios");
            System.out.println("2. Ver productos");
            System.out.println("3. Crear outfit");
            System.out.println("4. Ver outfits");
            System.out.println("5. Eliminar outfit");
            System.out.println("6. Salir");
            System.out.print("Seleccione una opcion: ");

            opcion = Integer.parseInt(sc.nextLine());

            switch(opcion){

                case 1:
                    OutfitDAO.verUsuarios();
                    break;

                case 2:
                    OutfitDAO.verProductos();
                    break;

                case 3:
                    OutfitDAO.crearOutfit(sc);
                    break;

                case 4:
                    OutfitDAO.verOutfits();
                    break;

                case 5:
                    OutfitDAO.eliminarOutfit(sc);
                    break;

                case 6:
                    System.out.println("Hasta pronto.");
                    break;

                default:
                    System.out.println("Opcion no valida.");
            }

        }while(opcion != 6);

        sc.close();
    }
}
