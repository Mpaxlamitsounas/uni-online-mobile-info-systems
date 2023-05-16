<!DOCTYPE html>
<html>
    <head>
        <title>Lab1 exer</title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: normal;
                line-height: 1.75;
                text-align: center;
                color: white;
                padding: 0;
                margin: 0;
                background-color: #2f2f2f;
                display: block;
            }
            #header {
                background-color: #242424;
            }
            #footer {
                background-color: #242424;
            }
            th, td {
                border: 1px solid white;
            }
            table {
                margin: auto;
            }
        </style>
    </head>
    <body>
        <header id="header">
            <br>
            <img src="https://i.imgur.com/dbdytHK.png" alt="Our Company" width="10%"/>
            <br><br>
        </header>

        <div id="product-price-table">
            <h2>Product Price Table</h2>
            Price per kilo
            <table class="table" style="width: 45%">
                <?php
                    $details = array("Name", "Price", "Stock", "Origin", "Brand", "Category");
                    $products = array(
                        array("name"=>"Tomatoes", "price"=>"2.0€", "stock"=>"Available",   "origin"=>"Greece",   "brand"=>"WholeFoods",  "category"=>"Fruit"),
                        array("name"=>"Potatoes", "price"=>"1.7€", "stock"=>"Unavailable", "origin"=>"Egypt",    "brand"=>"FoodInter.",  "category"=>"Vegetable"),
                        array("name"=>"Lettuce",  "price"=>"2.1€", "stock"=>"Available",   "origin"=>"Greece",   "brand"=>"FreshGreens", "category"=>"Vegetable"),
                        array("name"=>"Grapes",   "price"=>"1.6€", "stock"=>"Available",   "origin"=>"France",   "brand"=>"WholeFoods",  "category"=>"Fruit"),
                        array("name"=>"Bananas",  "price"=>"2.4€", "stock"=>"Available",   "origin"=>"Hawaii",   "brand"=>"Chiquita",    "category"=>"Fruit"),
                        array("name"=>"Apples",   "price"=>"2.3€", "stock"=>"Unavailable", "origin"=>"Germany",  "brand"=>"FoodInter.",  "category"=>"Fruit"),
                        array("name"=>"Onions",   "price"=>"1.5€", "stock"=>"Available",   "origin"=>"Albania",  "brand"=>"HomeQuality", "category"=>"Vegetable"),
                        array("name"=>"Rice",     "price"=>"1.4€", "stock"=>"Unavailable", "origin"=>"Thailand", "brand"=>"WholeFoods",  "category"=>"Grain")
                    );
                    echo "<tr>";
                    for ($i = 0; $i < 4; $i++) {
                        for ($j = 0; $j < 2; $j++) {
                            echo "<th>" . $products[$i*2 + $j]["name"] . "</th>";
                            echo "<th>" . $products[$i*2 + $j]["price"] . "</th>";
                        }
                        echo "</tr><tr>";
                    }
                    echo "</tr>";
                ?>
            </table>
        </div>

        <div id="product-info-list">
            <h2>Product Info List</h2>
            <form method="post">
                <select name="product_selected" onchange="this.form.submit()">
                    <option selected="">
                    <?php foreach ($products as $product) {echo "<option>".$product["name"]."\n";}?>
                </select>
            </form>

            <table class="table" style="width: 30%;">
            <?php   
                    $selected_product = array("name"=>"", "price"=>"", "stock"=>"", "origin"=>"", "brand"=>"", "category"=>"");
                    if (isset($_POST['product_selected'])) {
                        $selected = $_POST['product_selected'];
                        foreach ($products as $product) {
                            if ($product["name"] == $selected)
                                $selected_product = $product;
                        }
                    }

                    echo "<tr>";
                    for ($i = 0; $i < 6; $i++) {
                        echo "<th style=\"width: 30%\">" . $details[$i] . "</th>";
                        echo "<th>" . $selected_product[strtolower($details[$i])] . "</th>";
                        echo "</tr><tr>";
                    }
                    echo "</tr>";
                ?>
            </table>
            <br>
        </div>

        <footer id="footer">
            <br>
            <a style="color:rgb(32, 128, 255); text-decoration: none;" href="mailto:lab4@example.com">lab4@example.com</a> | 
            <a style="color:rgb(32, 128, 255); text-decoration: none;" href="tel:+300123456789">+30 0123456789</a> |
            <a style="color:rgb(32, 128, 255); text-decoration: none;" target="_blank" href="https://goo.gl/maps/Eg3JPTiPw3drVDUx9">Καραολή και Δημητρίου 80, Πειραιάς 185 34</a>
            <br><br>
        </footer>
    </body>
</html>