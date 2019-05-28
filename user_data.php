<?php
// show isbn books and form to fill
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="./StyleSheets/main.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="kasaHeader">
        <h1>Books API</h1>
    </div>
    <div class="kasaContainer">
        <section class="kasaMain">
        <form action="charge.php" method="post" id="payment-form">
            <div class="form-group">
                <h2>Fyll in dina uppgifter</h2>
                    <label for="firstname"><b>Förnamn</b></label>
                    <input type="text" placeholder="Skriv in ditt för och efternamn" class="form-control" name="first_name" required>
                    <label for="lastname"><b>Förnamn</b></label>
                    <input type="text" placeholder="Skriv in ditt för och efternamn" class="form-control" name="last_name" required>
                    <label for="adress"><b>Adress</b></label>
                    <input type="text" placeholder="Skriv in ditt adress" class="form-control" name="adress">
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Skriv in ditt email" class="form-control" name="email" required>
                    <label for="state"><b>Län</b></label>
                    <input type="text" placeholder="Skriv in ditt Län" class="form-control" name="state">
                    <label for="postkod"><b>Postkod</b></label>
                    <input type="text" placeholder="Postkod" class="form-control" name="post_code">
                    <label for="country"><b>Land</b></label>
                    <input type="text" placeholder="Skriv in ditt Land" class="form-control" name="country">
                    <label for="phone"><b>Telefonnummer</b></label>
                    <input type="text" placeholder="Skriv in ditt telefonnummer" class="form-control" name="phone">

            </div>
            <div>
            <h2>Betalning</h2>
                <div class="form-row">
                <label for="card-element">Credit or debit card</label>
                <div id="card-element">
                <!-- a Stripe Element will be inserted here. -->
                </div>
                <!-- Used to display form errors -->
                <div id="card-errors"></div>
            </div>
        
        <button class="checkout">Submit Payment</button>
            </div>
</form>
</section> 

<aside class="kasaProduct">
    <div class="productList">
        <table>
        <th>ISBN</th>
<?php 
//file is opened using fopen() function 
$my_file = fopen("books.txt", "rw"); 
while (! feof ($my_file)) 
  { ?>
            <tr>
                <td> <?php echo fgets($my_file); ?></td>
                    </tr>
<?php
  }  
// file is closed using fclose() function 
fclose($my_file); 
?>
                </table>
            </div>
        </aside>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>

    <!-- Your JS File -->
    <script src="charge.js"></script>
</body>

</html>