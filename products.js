// Web Development and Programming (CSCI-UA 61) - 001 
// Final Project: products.js 
// Subi Hwang
// Dec 16, 2023

/* 
JavaScript external program products.js: this form should be connected to products.js script:
You need to create an external products.js script with functions (using jQuery or JavaScript) 
similar to assignment #5 to compute the subtotal() and total() and also to validate() the elements 
in the form: This program needs to also to make sure that all fields for name, email, phone, credit card 
and address are all required. Make sure you validate them with JavaScript or jQuery to make sure all fields are filled, 
if not, they should be highlighted with focus(), and select(). Also, validate the zip code (should have 5 numbers), 
the phone (should have 9 numbers) and the email(should have @ and .)
*/
var qt1, qt2, qt3, subTotal1, subTotal2, subTotal3, shippingFee, grandTotal;

// Event listener for form submission
document.forms[0].addEventListener("submit", validate);

var obj1= document.getElementById("qt1");
var obj2= document.getElementById("qt2");
var obj3= document.getElementById("qt3");
var obj4= document.getElementById("shippingFee");


obj1.addEventListener("change", total);
obj2.addEventListener("change", total);
obj3.addEventListener("change", total);
obj4.addEventListener("change", total);

document.querySelectorAll('input[name="ShippingMethod"]').forEach(function(element) {
    element.addEventListener("change", total);
});

//compute the subtotal and grand total
function total()
{

var earringPrice = document.getElementById("earringPrice").value;
 qt1 = parseFloat(obj1.value);
 subTotal1= qt1 * parseFloat(earringPrice);
document.getElementById("subTotal1").innerHTML= "$" + subTotal1;

var necklacePrice = document.getElementById("necklacePrice").value;
 qt2 = parseFloat(obj2.value);
 subTotal2= qt2 * parseFloat(necklacePrice);
document.getElementById("subTotal2").innerHTML= "$" + subTotal2;

var ringPrice = document.getElementById("ringPrice").value;
 qt3 = parseFloat(obj3.value);
 subTotal3= qt3 * parseFloat(ringPrice);
document.getElementById("subTotal3").innerHTML= "$" + subTotal3;
    
    shippingFee = parseFloat(document.getElementById("shippingFee").value) || 0;
    var shippingMethod = document.querySelector('input[name="ShippingMethod"]:checked')?.value;
    
    if (shippingMethod === "shipping") {
        grandTotal = subTotal1 + subTotal2 + subTotal3 + shippingFee;
    }
    else
        grandTotal = subTotal1 + subTotal2 + subTotal3;
    
    document.getElementById("grandTotal").innerHTML = "$" + grandTotal;
}

// validate
function validate(e){

        //access the first form object
        let obj= document.forms[0];
        let isValid = true;

            // get how many elements in the form
            let len = obj.elements.length;

            // iterate through all of the form elements making sure there is a value entered for each element and validate zip code, phone, and email

            for (let i= 0; i < len -1; i++)
            {
                if ((obj.elements[i].value == "") || (obj.elements[i].value == null))
                {

                    alert("Make sure to input " + obj.elements[i].name);
                    isValid = false;
                    e.preventDefault();

                    // bring focus to the element that has no value
                    obj.elements[i].focus();

                    // selects the element that has no value
                    obj.elements[i].select();

                    // highlights the background with red so it brings attention to the element that's empty and requires the user to enter a value
                    obj.elements[i].style.backgroundColor="red";

                    // return so nothing would be done as user needs to enter the missing value
                    return;
                }

                // if there is a value, then make sure it's has 9 digits in the phone number (validating the phone number)
                 else if ((i == 11 ) && (obj.elements[i].value.length != 9)  )
                {
                    alert("Make sure to input the 9 digits for " + obj.elements[i].name);
                    isValid = false;
                    e.preventDefault();

                    obj.elements[i].focus();
                    obj.elements[i].select();
                    obj.elements[i].style.backgroundColor="red";
                    return;
                }

                // if there is a value, then make sure it's has an '@' in the email (validating the email)
                else if ((i == 12 ) && (obj.elements[i].value.indexOf("@") == -1))
                {
                    alert("Your email should include the '@' for this " + obj.elements[i].name);
                    isValid = false;
                    e.preventDefault();

                    obj.elements[i].focus();
                    obj.elements[i].select();
                    obj.elements[i].style.backgroundColor="red";
                    return;
                }

                // if there is a value, then make sure it's has a '.' in the email (validating the email)

                else if ((i == 12 ) &&  (obj.elements[i].value.indexOf(".") == -1))
                {
                    alert("Your email should include the '.' for this " + obj.elements[i].name);
                    isValid = false;
                    e.preventDefault();

                    obj.elements[i].focus();
                    obj.elements[i].select();
                    obj.elements[i].style.backgroundColor="red";
                    return;
                }

                // if there is a value, then make sure it's has 5 digits in the zip code (validating the zip code)
                else if ((i == 14 ) && (obj.elements[i].value.length != 5)  )
                {
                    alert("Make sure to input the 5 digits for " + obj.elements[i].name);
                    isValid = false;
                    e.preventDefault();

                    obj.elements[i].focus();
                    obj.elements[i].select();
                    obj.elements[i].style.backgroundColor="red";
                    return;
                }   
            }
             if (isValid) {
                    obj.submit();
                } 
    } 









