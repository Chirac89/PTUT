package model;

import java.sql.Connection;
import java.sql.Date;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Timestamp;
import java.util.ArrayList;



public class MyDataBase {
    
        private static Connection connection;
        private final String url = "jdbc:mysql://localhost:3306/tawagoto";
        private final String id = "root";
        private final String password = null;
        
       
        
        public MyDataBase(){
	        try {
	            connection = (Connection) DriverManager.getConnection(url,id,password);
	            System.out.println("Connecte avec succes");
	        }
	        catch(SQLException e) { System.out.println(e); }
        }
        
        
        
        private ResultSet getResult(String sqlRequest) throws SQLException {
            PreparedStatement preparedStatement = (PreparedStatement) connection.prepareStatement(sqlRequest);
        	return preparedStatement.executeQuery();
        }
        
        
        
        
        //========================================= CREATE (insert) =========================================//
        
        
        /**
         * 
         * @param table le nom de la table dans laquelle effectuer la requête
         * @param o Objet à insérer dans la table (chaque attribut sera inséré dans le champ correspondant)
         * @return un entier correspondant au nombre de lignes insérées (ou -1 si l'opération a échoué)
         */
        public int insertRow(String table, Object o){
        	String sql;
        	int row;
        	
            switch(table){
                case "products":
                    Product pdt = (Product) o ;
                    sql = "INSERT INTO `products`(`FK_product_cat_ID`, `FK_product_subcat_ID`, `product_name`, "
                    		+ "`product_price`, `product_description`, `product_alertThreshold`, `product_stock`) "
                    		+ "VALUES (?,?,?,?,?,?,?)";
                    try {
	                    PreparedStatement pst = (PreparedStatement) connection.prepareStatement(sql);
	                    
	                    pst.setInt(1, pdt.getCat().getID());
	                    pst.setInt(2, pdt.getSubcat().getID());
	                    pst.setString(3, pdt.getName());
	                    pst.setDouble(4, pdt.getPrice());
	                    pst.setString(5, pdt.getDescription());
	                    pst.setInt(6, pdt.getAlertThreshold());
	                    pst.setInt(7, pdt.getStock());
	                    
	                    row = pst.executeUpdate();
	                    pst.close();
	                     
	                    return row;
                    }
                    catch (SQLException e) { System.out.println(e) ; }
                    break;
                   
                    
                case "categories":
                	Category cat = (Category) o;
                	sql = "INSERT INTO `categories` (`cat_name`) VALUES (?);";
                	
                	try {
                		PreparedStatement pst = connection.prepareStatement(sql);
                		
                		pst.setString(1, cat.getName());
                		
                		row = pst.executeUpdate();
                		pst.close();
                	
                		return row;
                	} 
                	catch (SQLException e) { System.out.println(e) ; }
                	break;
                    
                	
                case "subcategories":
                	Subcategory subcat = (Subcategory) o;
                	sql = "INSERT INTO `subcategories` (`FK_subcat_cat_ID`, `subcat_name`) VALUES (?,?);";
                	
                	try {
                		PreparedStatement pst = connection.prepareStatement(sql);
                		
                		pst.setInt(1, subcat.getCat().getID());
                		pst.setString(2, subcat.getName());
                		
                		row = pst.executeUpdate();
                		pst.close();
                		
                		return row;
                	} 
                	catch (SQLException e) { System.out.println("insertRow " + table + " " + e);
                	}
                	break;
                	
                	
                case "promotions":
                	Promotion promotion = (Promotion) o;
                	sql = "INSERT INTO `promotions` (`promotion_start`, `promotion_end`, `promotion_name`, "
                			+ "`promotion_discountRate`) VALUES (?,?,?,?)";
                	
                	try {
                		PreparedStatement pst =  connection.prepareStatement(sql);
                		
                		pst.setTimestamp(1, promotion.getStart());
                		pst.setTimestamp(2, promotion.getEnd());
                		pst.setString(3, promotion.getName());
                		pst.setInt(4,  promotion.getDiscountRate());
                		
                		row = pst.executeUpdate();
                		pst.close();
                		
                		return row;
                	} 
                	catch (SQLException e) { System.out.println(e);}
                	break;
            }
       
            return -1;
        } 
        
        
        public int insertPromotedProduct(Promotion promotion, Product product) {
        	int updatedRow = -1;
        	String sql = "INSERT INTO `promoted_products` (`PK_FK_promotion_ID`, `PK_FK_promotion_product_ID`) VALUES (?,?);";
        	
        	try {
        		PreparedStatement pst = connection.prepareStatement(sql);
        		
        		pst.setInt(1, promotion.getID());
        		pst.setInt(2, product.getID());
        		
        		updatedRow = pst.executeUpdate();
        	}
        	catch (SQLException e) { System.out.println(e) ; }
        	
        	return updatedRow;
        }
        
        
        
    
        
        //============================================== READ ==============================================//
        
        
        // ========== Category ==========//
        
        public ArrayList<Category> getAllCategory()  {
        	String sql = "SELECT * FROM Categories;";
        	ArrayList<Category> listCat = new ArrayList<>();
        	
        	ResultSet result;
        	
        	try  {
        		result = getResult(sql);
        		
        		while(result.next()) {
        			listCat.add(toCategory(result));
        		}
        		
        		result.close();
        	} 
        	catch(SQLException e) {
        		System.out.println("getAllCat : " + e.toString());
        	}
        	
        	return listCat;
        }
        
        
        public Category getCategoryByName(String name) {
        	String sql = "SELECT * FROM categories WHERE cat_name LIKE ?;";
        	Category cat = null;
        	
        	PreparedStatement pst;
        	ResultSet result;
        	
        	try {
        		pst = connection.prepareStatement(sql);
        		pst.setString(1, name);
        		
        		result = pst.executeQuery();
        		
        		if(result.next()) {
        			cat = toCategory(result);
        		}
        		
        		result.close();
        	} 
        	catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return cat;
        }
        
        
        
        // ========== Subcategory ==========//
        
        public ArrayList<Subcategory> getAllSubcategory()  {
        	String sql = "SELECT * FROM subcategories";
        	ArrayList<Subcategory> listSubcat = new ArrayList<>();
        	
        	ResultSet result;
        	
        	try  {
        		result = getResult(sql);
        		
        		while(result.next()) {
        			listSubcat.add(toSubcategory(result));
        		}
        		
        		result.close();
        	} 
        	catch(SQLException e) {
        		System.out.println(e.toString());
        	}
        	
        	return listSubcat;
        }
        
        
        public Subcategory getSubcategoryByNameAndCat(String name, Category cat) {
        	String sql = "SELECT * FROM subcategories WHERE subcat_name LIKE ? AND FK_subcat_cat_ID=?;";
        	Subcategory subcat = null;
        	
        	PreparedStatement pst;
        	ResultSet result;
        	
        	try {
        		pst = connection.prepareStatement(sql);
        		pst.setString(1, name);
        		pst.setInt(2, cat.getID());
        		
        		result = pst.executeQuery();
        		
        		if(result.next()) {
        			subcat = toSubcategory(result);
        		}
        		
        		result.close();
        	} 
        	catch (SQLException e) {
        		System.out.println("getSubcatByNameAndCat " + e);
        	}
        	
        	return subcat;
        }
        
        
        
        // ========== Promotion  ==========//
        
        public ArrayList<Promotion> getAllPromotion() {
        	String sql = "SELECT * FROM `promotions` WHERE `promotion_end` > current_timestamp();";
        	ArrayList<Promotion> promotions = new ArrayList<Promotion>();
        	
        	try {
        		ResultSet result = getResult(sql);
        		
        		while(result.next()) {
        			promotions.add(toPromotion(result));
             	}
        		
        		result.close();
        	} 
        	catch (SQLException e) {
        		System.out.println(e);
        	}
      
        	return promotions;
        }
        
        
        public Promotion getPromotionByNameAndDate(String name, Timestamp start, Timestamp end) {
        	String sql = "SELECT * FROM `promotions` WHERE `promotion_name` LIKE ? AND"
        			+ " `promotion_start`=? AND `promotion_end`=?;";
        	Promotion promotion = null;
        	
        	PreparedStatement pst;
        	ResultSet result;
        	
        	try {
        		pst = connection.prepareStatement(sql);
        		pst.setString(1, name);
        		pst.setTimestamp(2, start);
        		pst.setTimestamp(3, end);
        		
        		result = pst.executeQuery();
        		
        		if(result.next()) {
        			promotion = toPromotion(result);
        		}
        		
        		result.close();
        	} 
        	catch (SQLException e) {
        		System.out.println("getPromotionByNameAndDate " + e);
        	}
        	
        	return promotion;
        }
        
        
        
        // ========== Product ==========//
        
        public ArrayList<Product> getProduct (String name, Category cat, Subcategory subcat) {
        	String sql = "SELECT * FROM products WHERE ";
        	String nameConstraint = "";
        	String catConstraint = "";
        	String subcatConstraint = "";
                    	
        	if(name != null && !name.equals("")) {
        		nameConstraint += "product_name LIKE \"" + name + "%\"";
        		if(cat != null && cat.getID() > 0) {
        			catConstraint += " AND ";
        		}
        	}
        		
        	if(cat != null && cat.getID() > 0) {
        		catConstraint += "FK_product_cat_ID=" + cat.getID();
        	}
        	
        	if(subcat != null && subcat.getID() > 0) {
				subcatConstraint += " AND FK_product_subcat_ID=" + subcat.getID();
			}
        	
        	sql += nameConstraint + catConstraint + subcatConstraint + ";";
        	
        	
        	ArrayList<Product> listProd = new ArrayList<Product>();
        	
        	ResultSet result;
        	
        	try {
        		result = getResult(sql);
        		
        		while (result.next()) {
        			listProd.add(toProduct(result));
        		}
        		
        		result.close();
        	} 
        	catch (SQLException e) { 
        		System.out.println(sql + "\n" + e.toString()); 
        	}
        	
        	return listProd;
        }
       
        
        public ArrayList<Product> getProductByPromotion(Promotion promotion) {
        	String sql = "SELECT * FROM `products`, `promoted_products`, `promotions` WHERE `PK_product_ID` = `PK_FK_promotion_product_ID`"
        			+ " AND `PK_FK_promotion_ID`=? AND `PK_promotion_ID`= `PK_FK_promotion_ID` AND `promotion_end` > current_timestamp();";
        	
        	ArrayList<Product> products = new ArrayList<Product>();
        	
        	PreparedStatement pst;
        	ResultSet result;
        	
        	
        	try {
        		pst = connection.prepareStatement(sql);
        		pst.setInt(1,  promotion.getID());
        		
        		result = pst.executeQuery();
        		
        		while(result.next()) {
        			products.add(toProduct(result));
        		}
        		
        		result.close();
        	} 
        	catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return products;
        }
        
        
        
        // ========== Customer ==========//
        
        public ArrayList<Customer> getAllCustomer()  {
        	String sql = "SELECT * FROM `customers` WHERE `PK_customer_ID` > 0;";
        	ArrayList<Customer> customers = new ArrayList<Customer>();
        	
        	ResultSet result;
        	
        	try  {
        		result = getResult(sql);
        		
        		while(result.next()) {
        			customers.add(toCustomer(result));
        		}
        		
        		result.close();
        	} 
        	catch(SQLException e) {
        		System.out.println(e.toString());
        	}
        	
        	return customers;
        }
        
        
        
        
        // =============== Model Instantiation ===============//
        
        private Category toCategory(ResultSet result) throws SQLException {
        	return new Category(
        			Integer.valueOf(result.getString(1)),
        			result.getString(2)
        			);
        }
        
        
        private Subcategory toSubcategory(ResultSet result) throws SQLException {
        	return new Subcategory(
        			Integer.valueOf(result.getString(1)),
        			Category.getCategoryByID(Integer.valueOf(result.getString(2))),
        			result.getString(3)
        			);
        }
        
        
        private Promotion toPromotion(ResultSet result) throws SQLException {
        	return new Promotion(
					Integer.valueOf(result.getString(1)),
					Timestamp.valueOf(result.getString(2)),
					Timestamp.valueOf(result.getString(3)),
					result.getString(4),
					Integer.valueOf(result.getString(5))
        			);
        }
        
        
        private Product toProduct(ResultSet result) throws SQLException {
        	Product product;
        	Subcategory subcategory = null;
        	
       
        	if(result.getString(3) != null) {
				subcategory = Subcategory.getSubcategoryByID(Integer.parseInt(result.getString(3)));
			}
        	
        	product = new Product(
					Integer.parseInt(result.getString(1)),
				    Category.getCategoryByID(Integer.parseInt(result.getString(2))),
					subcategory,
					result.getString(4),
					Double.parseDouble(result.getString(5)),
					result.getString(6),
					Integer.parseInt(result.getString(7)),
					Integer.parseInt(result.getString(8)),
					null
					);
        	
        	productSetPromotion(product);
        	
        	
        	return product;
        }
        
        
        private boolean productSetPromotion(Product product) throws SQLException {
        	boolean isPromoted = false;
        	
        	String sql = "SELECT `PK_promotion_ID`"
        			+ " FROM"
        			+ "    `promoted_products`, `promotions`"
        			+ " WHERE "
        			+ "    `PK_FK_promotion_product_ID`=? AND `PK_FK_promotion_ID`=`PK_promotion_ID`"
        			+ "     AND `promotion_end` > CURRENT_TIMESTAMP;";
        	
        	PreparedStatement pst;
        	ResultSet result;
        	
        	
        	pst = connection.prepareStatement(sql);
	        pst.setInt(1, product.getID());
	        
	        result = pst.executeQuery();
	        
	        if(result.next()) {
	        	product.setPromotion(Promotion.getPromotionByID(Integer.valueOf(result.getString(1))));
	        	isPromoted = true;
	        }
	        
	        
	        return isPromoted;
        }
        
        
        private Customer toCustomer(ResultSet result) throws SQLException {
        	return new Customer(
        			Integer.parseInt(result.getString(1)),
					result.getString(2),
					result.getString(3),
					result.getString(4),
					result.getString(5),
					Date.valueOf(result.getString(6)),
					Date.valueOf(result.getString(7))
        			);
        }
        
        //============================================== UPDATE ==============================================//
        
        
        public int updatePromotion(Promotion promotion) {
        	int updatedRow = -1;
        	
        	String sql = "UPDATE `promotions` SET `promotion_start`=?, `promotion_end`=?,"
        			+ " `promotion_name`=?, `promotion_discountRate`=? WHERE `PK_promotion_ID`=?";
        	
        	try {
        		PreparedStatement pst = connection.prepareStatement(sql);
        		
        		pst.setTimestamp(1, promotion.getStart());
        		pst.setTimestamp(2, promotion.getEnd());
        		pst.setString(3, promotion.getName());
        		pst.setInt(4, promotion.getDiscountRate());
        		pst.setInt(5,  promotion.getID());
        		
        		updatedRow = pst.executeUpdate();
        		pst.close();
        		
        	} 
        	catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return updatedRow;
        }
        
        
        
        public int updateProduct(Product product) {
        	int updatedRow = -1;
        	
        	String sql = "UPDATE `products` SET `FK_product_cat_ID`=?, `FK_product_subcat_ID`=?, `product_name`=?,"
        			+ " `product_price`=?, `product_description`=?, `product_alertThreshold`=?, `product_stock`=?"
        			+ " WHERE `PK_product_ID`=?;";
        	
        	try {
        		PreparedStatement pst = connection.prepareStatement(sql);
        		
        		pst.setInt(1, product.getCat().getID());
        		if(product.getSubcat() != null) { pst.setInt(2, product.getSubcat().getID()) ; } 
        		else { pst.setNull(2, java.sql.Types.INTEGER) ; }
        		pst.setString(3, product.getName());
        		pst.setFloat(4,  (float) product.getPrice());
        		pst.setString(5, product.getDescription());
        		pst.setInt(6, product.getAlertThreshold());
        		pst.setInt(7, product.getStock());
        		pst.setInt(8, product.getID());
        		
        		updatedRow = pst.executeUpdate();
        		pst.close();
        		
        	} catch (SQLException e) { System.out.println(e); }
        	
        	return updatedRow;
        }
        
        
        
        public int updateCategory(Category cat) {
        	int updatedRow = -1;
        	
        	String sql = "UPDATE `categories` SET `cat_name`=? WHERE `PK_cat_ID`=?";
        	
        	try {
        		PreparedStatement pst = connection.prepareStatement(sql);
        		
        		pst.setString(1, cat.getName());
        		pst.setInt(2, cat.getID());
        		
        		updatedRow = pst.executeUpdate();
        		pst.close();
        		
        	} 
        	catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return updatedRow;
        }
        
        
        
        public int updateSubcategory(Subcategory subcat) {
        	int updatedRow = -1;
        	
        	String sql = "UPDATE `subcategories` SET `subcat_name`=? WHERE `PK_subcat_ID`=?";
        	
        	try {
        		PreparedStatement pst = connection.prepareStatement(sql);
        		
        		pst.setString(1, subcat.getName());
        		pst.setInt(2, subcat.getID());
        		
        		updatedRow = pst.executeUpdate();
        		pst.close();
        		
        	} 
        	catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return updatedRow;
        }
        
        
        
        public int updateCustomer(Customer customer) {
        	int updatedRow = -1;
        	
        	String sql = "UPDATE `customers` SET `customer_lastName`=?, `customer_firstName`=?, `customer_email`=?, `customer_birthday`=?"
        			+ " WHERE `PK_customer_ID`=?;";
        	
        	try {
        		PreparedStatement pst = connection.prepareStatement(sql);
        		
        		pst.setString(1, customer.getLastname());
        		pst.setString(2, customer.getFirstname());
        		pst.setString(3, customer.getEmail());
        		pst.setDate(4, customer.getBirthday());
        		pst.setInt(5, customer.getID());
        		
        		updatedRow = pst.executeUpdate();
        		pst.close();
        		
        	}
        	catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return updatedRow;
        }
       
      
        
        
        //============================================== DELETE ==============================================//
        
        
        public int deletePromotedProduct(Promotion promotion, int productID) {
        	int updatedRow = -1;
        	String sql = "DELETE FROM `promoted_products` WHERE `PK_FK_promotion_ID`=? AND "
        			+ "`PK_FK_promotion_product_ID`=?";
        	
        	try {
        		PreparedStatement pst = connection.prepareStatement(sql);
        		pst.setInt(1, promotion.getID());
        		pst.setInt(2, productID);
        		
        		updatedRow = pst.executeUpdate();
        		
        		return updatedRow;
        		
        	} catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return updatedRow;
        }
        
        
        
        public int deleteCustomer(Customer customer) {
        	int updatedRow = -1;
        	String sql = "UPDATE `customers` SET `PK_customer_ID`=? WHERE `PK_customer_ID`=?;";
        	
        	try {
        		int ID = customer.getID();
        		if (ID > 0 ) {
        			PreparedStatement pst = connection.prepareStatement(sql);
	        		pst.setInt(1, -ID);
	        		pst.setInt(2, ID);
	        		
	        		updatedRow = pst.executeUpdate();
        		}
        	}
        	catch (SQLException e) {
        		System.out.println(e);
        	}
        	
        	return updatedRow;
        }
}