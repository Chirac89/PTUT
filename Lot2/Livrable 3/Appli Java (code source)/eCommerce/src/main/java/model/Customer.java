package model;

import java.sql.Date;
import java.util.ArrayList;

public class Customer {
	private int ID;
	private String firstname, lastname, email, password;
	private Date accountCreationDate, birthday;
	
	public static ArrayList<Customer> buffer = new ArrayList<Customer>();
	
	
	public Customer(int ID, String lastname, String firstname, String email, String password,
			Date accountCreationDate, Date birthday) {
		
		this.ID = ID;
		this.firstname = firstname;
		this.lastname = lastname;
		this.email = email;
		this.password = password;
		this.accountCreationDate = accountCreationDate;
		this.birthday = birthday;
	}


	public int getID() {
		return ID;
	}


	public void setID(int iD) {
		ID = iD;
	}


	public String getFirstname() {
		return firstname;
	}


	public void setFirstname(String firstname) {
		this.firstname = firstname;
	}


	public String getLastname() {
		return lastname;
	}


	public void setLastname(String lastname) {
		this.lastname = lastname;
	}


	public String getEmail() {
		return email;
	}


	public void setEmail(String email) {
		this.email = email;
	}


	public String getPassword() {
		return password;
	}


	public void setPassword(String password) {
		this.password = password;
	}


	public Date getAccountCreationDate() {
		return accountCreationDate;
	}


	public void setAccountCreationDate(Date accountCreationDate) {
		this.accountCreationDate = accountCreationDate;
	}


	public Date getBirthday() {
		return birthday;
	}


	public void setBirthday(Date birthday) {
		this.birthday = birthday;
	}
	
	public static Customer getCustomerByID(int ID) {
		Customer customer, result = null;
		
		for(int i=0; i < buffer.size() && result == null; i++) {
			customer = buffer.get(i);
			
			if(customer != null && customer.getID() == ID) {
				result = customer;
			}
		}
		
		return result;
	}
	
	public static void addAll(ArrayList<Customer> customers) {
		for(Customer customer : customers) {
			buffer.add(customer);
		}
	}
	
	public static boolean deleteCustomer(Customer customer) {
		boolean deleted = buffer.remove(customer);
		
		return deleted;
	}
	
	public static void overwriteBuffer(ArrayList<Customer> customers) {
		buffer.clear();
		buffer.addAll(customers);
	}
}






