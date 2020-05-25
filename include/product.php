<?php


class product{
    public $name, $price, $description, $image;

    function __construct ($name,$price,$description,$image) {
        $this->name =$name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    
    function displayProduct(){

        echo
            "<div class=\"card\" style=\"width: 18rem;\">
                <img src=\"images/$this->image.jpg\" class=\"card-img-top\" >
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$this->name</h5>
                    <p class=\"card-text\">R$this->price</p>
                    <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter$this->image\">More Info</button>
                </div>
            </div>

            <div class=\"modal fade \" id=\"exampleModalCenter$this->image\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle$this->image\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-dialog-centered modal-lg\" role=\"document\">
                    <div class=\"modal-content \">
                    <div class=\"modal-header \">
                        <h3 class=\"modal-title\" id=\"exampleModalLongTitle$this->image\">$this->name</h3>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <div class=\"modal-body\">
                        <img src=\"images/$this->image\" class=\"img-rounded\">
                        $this->description

                    </div>
                    <div class=\"modal-footer\">
                        <input type=\"number\" hidden value=\"$this->image\">
                        <button type=\"button\" class=\"btn btn-primary\" @click=\"addToCart\" onclick=\"updateCartAjax()\">Add to Cart</button>
                    </div>
                    </div>
                </div>
                </div>"
                ; 
    }
}

?>