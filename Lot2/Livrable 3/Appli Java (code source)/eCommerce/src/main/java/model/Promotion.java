package model;

import java.sql.Timestamp;
import java.util.ArrayList;

public class Promotion {
	private Timestamp start, end;
	private String name;
	private int ID, discountRate;
	
	public static ArrayList<Promotion> buffer = new ArrayList<Promotion>();
	
	public Promotion(int ID, Timestamp start, Timestamp end, String name, int discountRate) {
		this.ID = ID;
		this.start = start;
		this.end = end;
		this.name = name;
		this.discountRate = discountRate;
	}
	
	public static Promotion getPromotionByID(int ID) {
		Promotion promo, result = null;
		for(int i=0; i < buffer.size() && result == null; i++) {
			promo = buffer.get(i);
			if(promo.getID() == ID) {
				result = promo;
			}
		}
		
		return result;
	}
	
	public static void addAll(ArrayList<Promotion> arrayList) {
		for(int i = 0; i < arrayList.size(); i++) {
			buffer.add(arrayList.get(i));
		}
	}
	
	public static void remove(int ID) {
		for(int i=0; i < buffer.size(); i++) {
			if(buffer.get(i).getID() == ID) {
				buffer.remove(i);
			}
		}
	}
	
	public int getID() {
		return ID;
	}

	public Timestamp getStart() {
		return start;
	}

	public void setStart(Timestamp start) {
		this.start = start;
	}

	public Timestamp getEnd() {
		return end;
	}

	public void setEnd(Timestamp end) {
		this.end = end;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public int getDiscountRate() {
		return discountRate;
	}

	public void setDiscountRate(int discountRate) {
		this.discountRate = discountRate;
	}
	
	public String toString() {
		return name;
	}
}

