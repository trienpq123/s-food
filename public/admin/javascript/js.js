
function manage_productAdmin(){
    const   displayOverlay = document.querySelector(".display__overlay"),
            iconlClose = document.querySelector(".box__title--iconl"),

            buttonAddProduct = document.querySelector("#add-product"),
            formAddProduct = document.querySelector(".add_product"),

            buttonEditProduct = document.querySelector("#editProduct"),
            formEditProduct = document.querySelector(".edit_product");

    iconlClose.onclick =  function (){
        displayOverlay.style.display="none";
    }


    buttonAddProduct.onclick = function (){
        console.log(formAddProduct);

        formAddProduct.style.display="flex";
    }

    buttonEditProduct.onclick = function (){
        console.log(formEditProduct);

        formEditProduct.style.display="flex";
        
        iconlClose.onclick =  function (){
            console.log("123");
        }
    
    }

 
};
manage_productAdmin();