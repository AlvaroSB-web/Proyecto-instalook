package com.instalook;

import java.sql.Connection;
import java.sql.DriverManager;

public class DatabaseConnection {

    private static final String URL =
            "jdbc:mariadb://34.193.170.124:3306/instalook";

    private static final String USER =
            "root";

    private static final String PASSWORD =
            "root";

    public static Connection getConnection()
            throws Exception {

        Class.forName(
                "org.mariadb.jdbc.Driver"
        );

        return DriverManager.getConnection(
                URL,
                USER,
                PASSWORD
        );
    }
}
