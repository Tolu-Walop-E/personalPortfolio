function clearButton(){
    if (confirm("Are you sure you want to remove all your text!")){
        document.getElementById("userForm").reset();
    }
    else{
        return false;
    }
}

function checkEmpty(event){
    event.preventDefault();
    
    const myForm = document.getElementById("userForm");
    const myTitle = document.getElementById("mainTitle");

    const mytext = document.getElementById("mainText");
  
    if (myTitle.value.trim()===""|| mytext.value.trim() === "") {
        alert("Please complete all fileds!");

        if (myTitle.value.trim() === "") {
            myTitle.style.border = "2px solid red";
          }
          if (mytext.value.trim() === "") {
            mytext.style.border = "2px solid red";
          }
          return false;
    }

    


    myForm.submit();
    return true;

    
}