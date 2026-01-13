<?php $this->layout('template', ['title' => 'Ajouter un personnage']) ?>
<head><link rel="stylesheet" href="public/css/main.css"/></head>
<link rel="stylesheet" href="public/css/main.css"/>
<h1>Ajouter un personnage</h1>
<div class="contrainAddPerso">
  <fieldset class="FielsetAddPerso">
    <form method="post" action="index.php?action=add-perso" class="form-perso">

      <label>ID</label>
      <input type="text" name="id" placeholder="p003" required>

      <label>Nom</label>
      <input type="text" name="name" placeholder="Diluc" required>
      <br>
      <label>Élément</label>
      <select name="element" required>
        <option value="">-- Choisir --</option>
        <option value="Pyro">Pyro</option>
        <option value="Hydro">Hydro</option>
        <option value="Anemo">Anemo</option>
        <option value="Electro">Electro</option>
        <option value="Cryo">Cryo</option>
        <option value="Dendro">Dendro</option>
        <option value="Geo">Geo</option>
      </select>
      <br>
      <label>Arme / Classe (unitclass)</label>
      <select name="unitclass" required>
        <option value="">-- Choisir --</option>
        <option value="Sword">Sword</option>
        <option value="Claymore">Claymore</option>
        <option value="Bow">Bow</option>
        <option value="Polearm">Polearm</option>
        <option value="Catalyst">Catalyst</option>
      </select>
      <br>
      <label>Origine (region)</label>
      <input type="text" name="origin" placeholder="Mondstadt" required>
      <br>
      <label>Rareté (4 ou 5)</label>
      <select name="rarity" required>
        <option value="">-- Choisir --</option>
        <option value="4">4 </option>
        <option value="5">5 </option>
      </select>
      <br>
      <label>URL image</label>
      <input type="url" name="url_img" placeholder="https://..." required>
      <br>
      <button type="submit">Ajouter</button>
    </form>
  </fieldset>
</div>

