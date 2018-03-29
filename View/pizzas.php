<div id="pizza-container">
    <?php for ($i = 0; $i < count($pizzas); $i++): ?>
        <?php if ($i % 3 === 0): ?>
            <div class="pizza-row">
        <?php endif; ?>
        <div class="pizza-element">
            <a href="/pizza?id=<?= $pizzas[$i]->getId() ?>">
                <img src="http://via.placeholder.com/150x150"/>
            </a>
            <div class="description">
                <p><?= $pizzas[$i]->getName() ?></p>
                <p><?= $pizzas[$i]->getPrice() ?></p>
                <a href="/pizza/add?id=<?= $pizzas[$i]->getId() ?>">
                    <button>Kosárba teszem!</button>
                </a>
            </div>
        </div>
        <?php if ($i % 3 === 0): ?>
            </div>
        <?php endif; ?>
    <?php endfor; ?>
</div>