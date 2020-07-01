<?php

class CartItem{
    public $number, $name, $price, $image;

    function __construct ($number,$name,$price,$image) {
        $this->number =$number;
        $this->name =$name;
        $this->price = $price;
        $this->image = $image;
    }

    
    function displayCartItem(){

        echo
            "<tr>
            <th scope=\"row\">
              <div class=\"p-2\">
                <img src=\"../images/$this->image.jpg\" alt=\"\" width=\"70\" class=\"img-fluid rounded shadow-sm\">
                <div class=\"ml-3 d-inline-block align-middle\">
                  <h5 class=\"mb-0\"><a href=\"index.php\" class=\"text-dark d-inline-block\">".$this->name."</a></h5>
                </div>
              </div>
            </th>
            <td class=\"align-middle\"><strong>R".$this->price."</strong></td>
            <td class=\"align-middle\"><form action=\"". htmlspecialchars($_SERVER["PHP_SELF"]) ."\" method=\"post\"><button class=\"btn btn-dark px-4 rounded-pill\" type=\"submit\" name=\"done\" value=". $this->number ." class=\"button\">Remove</button></form>
            </td>
          </tr>"
                ; 
    }
}
?>