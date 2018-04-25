<form method="GET">
    <select name="pizza">
        <?php foreach ($pizzas as $pizza): ?>
            <option id="<?= $pizza->getId() ?>"
                    value="<?= $pizza->getId() ?>"><?= $pizza->getName() ?></option>
        <?php endforeach; ?>
    </select>
    <input id="select" name="select" type="submit" value="Választ">
</form>
<form method="POST" enctype="multipart/form-data">
    <?php if ($pizzaToEdit->getId() !== null): ?>
        <input type="hidden" name="id" value="<?= $pizzaToEdit->getId() ?>">
    <?php endif; ?>
    <label for="name">Pizza neve</label>
    <input id="name" name="name" type="text" placeholder="Hawaii"
           value="<?= $pizzaToEdit->getName() ?>">
    <label for="price">Ár</label>
    <input id="price" name="price" type="number" placeholder="1999"
           value="<?= $pizzaToEdit->getPrice() ?>">HUF<br/>
    <label for="description">Leírás</label>
    <textarea id="description"
              name="description"><?= $pizzaToEdit->getDescription() ?></textarea>
    <div class="row">
        <input id="availability" name="availability"
               type="checkbox" <?= trim($pizzaToEdit->getAvailability()) === 'on' ? 'checked' : '' ?>><label
                for="availability">Elérhető</label>
    </div>
    <label for="pizza-image">Kép feltöltése</label>
    <input id="pizza-image" name="pizza-image" type="file">
    <input id="save" name="save" type="submit" value="Mentés">
</form>