package model;

import java.util.ArrayList;

public class Product {
	private String name, description;
	private Category cat;
	private Subcategory subcat;
	private double price;
	private int ID, alertThreshold, stock;
	private Promotion promotion;
	
	public static ArrayList<Product> buffer = new ArrayList<Product>();

	public Product(int ID, Category cat, Subcategory subcat, String name, double price, String description,
			int alertThreshold, int stock, Promotion promotion) {

		this.ID = ID;
		this.name = name;
		this.description = description;
		this.cat = cat;
		this.subcat = subcat;
		this.price = price;
		this.promotion = promotion;
		this.alertThreshold = alertThreshold;
		this.stock = stock;
	}
	
	public Product(Category cat, Subcategory subcat, String name, double price, String description,
			int alertThreshold, int stock, Promotion promotion) {
		this(-1, cat, subcat, name, price, description, alertThreshold, stock, promotion);
	}
	
	public static void addAll(ArrayList<Product> arrayList) {
		for(int i = 0; i < arrayList.size(); i++) {
			buffer.add(arrayList.get(i));
		}
	}
	
	public static void overwriteBuffer(ArrayList<Product> arrayList) {
		buffer.clear();
		addAll(arrayList);
	}
	
	public static Product getProductByID(int ID) {
		Product product, result = null;
		for(int i = 0; i < buffer.size() && result == null; i++) {
			product = buffer.get(i);
			if(product.getID() == ID) {
				result = product;
			}
		}
		
		return result;
	}
	
	public String toString() { return this.name ; }
	public String testField() { return name + "\n" + cat.toString() + "\n" + price + "\n" + stock; }
 
	public int getID() { return ID ; }
	public String getName() { return name ; }
	public String getDescription() { return description ; }
	public Category getCat() { return cat ; }
	public Subcategory getSubcat() { return subcat ; }
	public double getPrice() { return price ; }
	public Promotion getPromotion() { return promotion ; }
	public int getAlertThreshold() { return alertThreshold ; }
	public int getStock() { return stock ; }

	public void setName(String name) { this.name = name ; }
	public void setDescription(String description) { this.description = description ; }
	public void setCat(Category cat) { this.cat = cat ; }
	public void setSubcat(Subcategory subcat) { this.subcat = subcat ; }
	public void setPrice(double price) { this.price = price ; }
	public void setPromotion(Promotion promotion) { this.promotion = promotion ; }
	public void setAlertThreshold(int alertThreshold) { this.alertThreshold = alertThreshold ; }
	public void setStock(int stock) { this.stock = stock ; }
}