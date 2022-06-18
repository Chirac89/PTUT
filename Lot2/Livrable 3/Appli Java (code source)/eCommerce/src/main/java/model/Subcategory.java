package model;

import java.util.ArrayList;

public class Subcategory extends ModelCat{
	private Category cat;
	public static ArrayList<Subcategory> buffer = new ArrayList<Subcategory>();
	
	public Subcategory(int ID, Category cat, String name) {
		super(ID, name);
		this.cat = cat;
	}
	
	public Subcategory(Category cat, String name) {
		super(-1, name);
		this.cat = cat;
	}

	public Category getCat() { return cat ; }

	public void setCat(Category cat) { this.cat = cat ; }
	
	public static void addAll(ArrayList<Subcategory> arrayList) {
		for(int i = 0; i < arrayList.size(); i++) {
			buffer.add(arrayList.get(i));
		}
	}
	
	public static void overwriteBuffer(ArrayList<Subcategory> arrayList) {
		buffer.clear();
		addAll(arrayList);
	}
	
	
	public static Subcategory getSubcategoryByID(int ID) {
		Subcategory subcat, result = null;
		
		for(int i = 0; i < buffer.size() && result == null; i++) {
			subcat = buffer.get(i);
			if(subcat.getID() == ID) {
				result = subcat;
			}
		}
		
		return result;
	}
	
	public static Subcategory getSubcategoryByName(String name) {
		Subcategory subcat, result = null;
		
		for(int i = 0; i < buffer.size() && result == null; i++) {
			subcat = buffer.get(i);
			if(subcat.getName().equals(name)) {
				result = subcat;
			}
		}
		
		return result;
	}
	

	public static ArrayList<Subcategory> getSubcategoryByCat(Category cat) {
		ArrayList<Subcategory> result = new ArrayList<Subcategory>();
		
		for(Subcategory subcat : buffer) {
			if(subcat.getCat().equals(cat)) {
				result.add(subcat);;
			}
		}
		
		return result;
	}
}
