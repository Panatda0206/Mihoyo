<?php $this->layout('template', ['title' => 'Ajouter un personnage']) ?>

<h1>Ajouter un personnage</h1>

<form method="post" action="index.php?action=add-perso">
  <label>Nom :</label>
  <input type="text" name="name" required>

  <button type="submit">Ajouter</button>
</form>