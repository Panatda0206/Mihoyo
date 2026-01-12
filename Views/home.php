<?php
  $this->layout('template', ['title' => 'TP Mihoyo']);
?>

<style>
  .grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }
  .card {
    position: relative;
    border: 1px solid #ddd;
    box-shadow: 0 2px 8px rgba(0,0,0,.08);
    overflow: hidden;
    background: #fff;
  }
  .card img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    display: block;
  }
  .card .name { 
    left: 0;
    right: 0;
    text-align: center;
    font-weight: 700;
    font-size: 18px;
    color: black;
    text-shadow: 0 2px 6px rgba(0,0,0,.8);
  }
  .card .top-actions {
    position: absolute;
    top: 8px;
    left: 8px;
    right: 8px;
    display: flex;
    justify-content: space-between;
    gap: 6px;
  }
  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 16px;
    background: white;
    border: 1px solid rgba(0,0,0,.12);
  }
  .meta {
    padding: 10px 12px 14px;
    font-size: 14px;
  }
  .meta div { margin: 4px 0; }
  .badge {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 999px;
    background: #f2f2f2;
    font-size: 12px;
  }
  h2{
    text-align: center;
  }
  h1{
    text-align: center;
  }
</style>

<h1>Bienvenue au <?= $this->e($gameName) ?></h1>

<h2>Liste des personnages</h2>

<?php if (empty($listPersonnage)): ?>
  <p>Aucun personnage en base.</p>
<?php else: ?>
  <div class="grid">
    <?php foreach ($listPersonnage as $p): ?>
      <div class="card">
        <div class="top-actions">
          <a class="btn" href="index.php?action=updatePerso&id=<?= $this->e($p->getId()) ?>" title="Modifier"><i class="bi bi-pen-fill">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pen-fill" viewBox="0 0 16 16">
              <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
            </svg>
          </a>
          <a class="btn" href="index.php?action=del&id=<?= $this->e($p->getId()) ?>" title="Supprimer">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-trash3" viewBox="0 0 16 16">
              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
            </svg>
          </a>
        </div>

        <img src="<?= $this->e($p->getUrlImg()) ?>" alt="<?= $this->e($p->getName()) ?>">
        <div class="name"><?= $this->e($p->getName()) ?></div>

        <div class="meta">
          <div><span class="badge">Élément</span> <?= $this->e($p->getElement()) ?></div>
          <div><span class="badge">Classe</span> <?= $this->e($p->getUnitclass()) ?></div>
          <div><span class="badge">Rareté</span> <?= $this->e($p->getRarity()) ?> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill" viewBox="0 0 16 16">
              <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
          </div>
          <div><span class="badge">Origine</span> <?= $this->e($p->getOrigin() ?? '—') ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>


