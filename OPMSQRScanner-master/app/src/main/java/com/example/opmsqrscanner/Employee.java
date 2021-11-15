package com.example.opmsqrscanner;

import com.google.gson.annotations.SerializedName;

public class Employee {
    @SerializedName("message")
    private String message;
    @SerializedName("emp_code")
    private String empCode;
    @SerializedName("first_name")
    private String firstName;
    @SerializedName("last_name")
    private String lastName;
    @SerializedName("emp_time_in")
    private String empTimeIn;
    @SerializedName("emp_time_out")
    private String empTimeOut;

    public Employee(String message, String empCode, String firstName, String lastName,
                    String empTimeIn, String empTimeOut) {
        this.message = message;
        this.empCode = empCode;
        this.firstName = firstName;
        this.lastName = lastName;
        this.empTimeIn = empTimeIn;
        this.empTimeOut = empTimeOut;
    }

    public String getMessage() {   return message;    }
    public void setMessage(String message) {  this.message = message;   }
    public String getEmpCode() {   return empCode;    }
    public void setEmpCode(String empCode) {  this.empCode = empCode;   }
    public String getFirstName() { return firstName;  }
    public void setFirstName(String firstName) {  this.firstName = firstName;   }
    public String getLastName() {  return lastName;   }
    public void setLastName(String lastName) {    this.lastName = lastName; }
    public String getEmpTimeIn() { return empTimeIn;  }
    public void setEmpTimeIn(String empTimeIn) {  this.empTimeIn = empTimeIn;   }
    public String getEmpTimeOut() {    return empTimeOut; }
    public void setEmpTimeOut(String empTimeOut) {    this.empTimeOut = empTimeOut; }
    public String getFullName() {   return getFirstName() + " " + getLastName();  }
}
