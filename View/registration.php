<form method="POST" action="/register">
    <label for="name">Teljes név</label>
    <input id="name" name="name" type="text" placeholder="Teljes név" required>
    <label for="email">E-mail</label>
    <input id="email" name="email" type="email" placeholder="E-mail" required>
    <label for="password">Jelszó</label>
    <input id="password" name="password" type="password" placeholder="Jelszó"
           required>
    <label for="phone">Telefonszám</label>
    <input id="phone" name="phone" type="text" placeholder="Telefonszám"
           required>
    <label for="country">Ország</label>
    <input id="country" name="country" type="text" placeholder="Ország"
           required>
    <label for="address">Cím</label>
    <input id="address" name="address" type="text" placeholder="Cím" required>
    <div class="row">
        <input id="requirement" name="requirement" type="checkbox" required>
        <label for="requirement">Elfogadom, hogy nem fogom megHACKelni a
            rendszert</label>
    </div>
    <input id="register" name="register" type="submit" value="Regisztráció">
</form>