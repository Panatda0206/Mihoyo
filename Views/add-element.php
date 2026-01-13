<?php $this->layout('template', ['title' => 'Ajouter  élément du personnage']) ?>
<h1>Ajouter element du personnage</h1>
<div class="contrain">
<fieldset class="fielsetAddEle">
    <form method="post" action="index.php?action=add-element" class="form-perso">

        <label>Nom de l’élément</label>
        <input type="text" name="name" placeholder="Ex : Pyro" required>
        <br>
        <label>Image de l’élément (URL)</label>
        <input type="text" name="image" placeholder="https://..." required>
        <br>
        <label>Type d’élément</label>
        <select name="type" required>
            <option value="">-- Choisir un type --</option>
            <option value="feu">Feu 🔥</option>
            <option value="eau">Eau 💧</option>
            <option value="electrique">Électrique ⚡</option>
            <option value="glace">Glace ❄️</option>
            <option value="vent">Vent 🌪️</option>
            <option value="terre">Terre 🌍</option>
        </select>
        <br>
        <button type="submit">Ajouter l’élément</button>
    </form>
    </fieldset>
</div>
