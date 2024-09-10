

    <section>
        <div class="categories">
            <h2></h2>
            <div class="ligne">
                <?php foreach($news as $new): ?>
                    <div class="carte">
                        <a href="fiche_produit.php?id=<?=$new["id"]?>">
                            <img src="<?=$new['image']?>" alt="<?=$new['titre']?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>