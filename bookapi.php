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
        <h1>Kasa</h1>
    </div>
    <div class="kasaContainer">
        <section class="kasaMain">
            <div class="kundAdress">
                <h2>Enter your details</h2>
                <form>
                    <label for="nämn"><b>Nämn</b></label>
                    <input type="text" placeholder="Skriv in ditt för och efternamn" name="nämn" required>

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Skriv in ditt email" name="email" required>
                    <label for="adress"><b>Adress</b></label>
                    <input type="text" placeholder="Skriv in ditt address" name="adress" required>
                    <label for="postkod"><b>Postkod</b></label>
                    <input type="number" placeholder="Postkod" name="postkod" required>

                    <button type="submit">Försätta till checkout</button>

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
                    <tr>
                        <td>29309830</td>
                    </tr>
                    <tr>
                        <td>938493 </td>
                    </tr>
                    <tr>
                        <td>9849384</td>
                    </tr>
                </table>
            </div>
        </aside>

    </div>
</body>

</html>