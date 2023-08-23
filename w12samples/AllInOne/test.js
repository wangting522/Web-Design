function testJ( selectedOption ) {
        let nameJ= selectedOption.value;        
        alert('Hello' + nameJ);
        // you can add any validation or calculations here
}

function testD () {    
    var value1 = discount.value;  
    console.log(value1); //just for debugging
    // value attribute is a string so we have to convert it to int
    if (value1 > parseInt(discountlimit.value)) {
        alert("Discount cannot be more than 50");
    }
    else  alert("Discount accepted");       
}
