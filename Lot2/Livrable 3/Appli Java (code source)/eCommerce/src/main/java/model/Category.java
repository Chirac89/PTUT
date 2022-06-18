package model;

import java.util.ArrayList;

public class Category extends ModelCat {
	public static ArrayList<Category> buffer = new ArrayList<Category>();
	
	public Category(int ID, String name) {
		super(ID, name);
	}
	
	public Category(String name) {
		super(-1, name);
	}
	
	public static void addAll(ArrayList<Category> arrayList) {
		for(int i = 0; i < arrayList.size(); i++) {
			buffer.add(arrayList.get(i));
		}
	}
	
	public static void overwriteBuffer(ArrayList<Category> arrayList) {
		buffer.clear();
		addAll(arrayList);
	}
	
	
	public static Category getCategoryByID(int ID) {
		Category cat, result = null;
		for(int i = 0; i < buffer.size() && result == null; i++) {
			cat = buffer.get(i);
			if(cat.getID() == ID) {
				result = cat;
			}
		}
		
		return result;
	}
	
	public static Category getCategoryByName(String name) {
		Category  cat, result = null;
		for(int i = 0; i < buffer.size() && result == null; i++) {
			cat = buffer.get(i);
			if(cat.getName().equals(name)) {
				result = cat;
			}
		}
		
		return result;
	}
}
