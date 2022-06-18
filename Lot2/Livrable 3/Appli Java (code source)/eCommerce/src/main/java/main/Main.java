/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package main;

import view.*;
import model.*;
import com.formdev.flatlaf.FlatDarkLaf;
import com.formdev.flatlaf.FlatLightLaf;
import java.util.ArrayList;
import java.util.List;

import javax.swing.UIManager;


import model.MyDataBase;
import view.MainWindow;

import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.ResultSet;

/**
 *
 * @author antho & alex
 *
 */

public class Main {	
        
    public static void main(String[] args){
        try {
            UIManager.setLookAndFeel(
            new FlatDarkLaf());
        } catch (Exception e) { System.out.println(e);}
                

        MyDataBase db = new MyDataBase();
        
        Category.addAll(db.getAllCategory());
        Subcategory.addAll(db.getAllSubcategory());
        Promotion.addAll(db.getAllPromotion());
        Customer.addAll(db.getAllCustomer());
        
        MainWindow.setDefaultLookAndFeelDecorated(true);
        MainWindow test = new MainWindow();
        //test.pack();
        test.setSize(770, 790);
        test.setVisible(true);

    }        
}
