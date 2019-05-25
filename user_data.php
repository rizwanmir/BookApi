<?php
// show isbn books and form to fill
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="main.css" type="text/css">
</head>

<body>
    <div class="kasaHeader">
        <h1>Book API</h1>
    </div>
    <div class="kasaContainer">
        <section class="kasaMain">
            <div class="kundAdress">
                <h2>Fyll in dina uppgifter</h2>
                <form>
                    <label for="nämn"><b>Nämn</b></label>
                    <input type="text" placeholder="Skriv in ditt för och efternamn" name="nämn" required>

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Skriv in ditt email" name="email" required>
                    <label for="adress"><b>Adress</b></label>
                    <input type="text" placeholder="Skriv in ditt address" name="adress" required>
                    <label for="postkod"><b>Postkod</b></label>
                    <input type="number" placeholder="Postkod" name="postkod" required>

                    <button class="checkout" type="submit">Försätta till checkout</button>

                </form>

            </div>
            <div class="kasaPayment">
                <h2>Betalning</h2>
                <label for="nänmkort"><b>Nämn på kortet</b></label>
                <input type="text" placeholder="Nämn på kortet" name="nämn" required>

                <label for="kortnummer"><b>Kredit kortnummer</b></label>
                <input type="text" placeholder="1111-2222-3333-4444" name="kortnummer" required>
                <label for="expmånad"><b>Exp Månad</b></label>
                <input type="number" placeholder="januari" name="expmånad" required>
                <label for="expår"><b>Exp år</b></label>
                <input type="number" placeholder="2020" name="expår" required>
                <label for="cvv"><b>CVV</b></label>
                <input type="number" placeholder="111" name="cvv" required>
            </div>
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
<form action="./CSV/csv_file.php">
    <input type="submit" value="Försätta>>">
</form>
</body>

</html>