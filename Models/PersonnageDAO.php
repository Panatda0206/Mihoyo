<?php
namespace Models;

use PDO;


class PersonnageDAO extends BasePDODAO
{
    /**
     * Retourner tous les personnages
     * @return Personnage[]
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM personnage";
        $stmt = $this->execRequest($sql);

        $personnages = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $personnages[] = new Personnage([
                'id' => $row['id'],
                'name' => $row['name'],
                'element' => $row['element'],
                'unitclass' => $row['unitclass'],
                'rarity' => $row['rarity'],
                'origin' => $row['origin'],
                'urlImg' => $row['url_img']  // ici est important parce que la colonne dans BDD possede _ mais hydration va chercher setUrlImg donc il connait pas url_img
            ]);
        }

        return $personnages;
    }

    /**
     * Retourne un personnage par son ID
     */
    public function getByID(string $idPersonnage): ?Personnage
    {
        $sql = "SELECT * FROM personnage WHERE id = ?";
        $stmt = $this->execRequest($sql, [$idPersonnage]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Personnage([
            'id' => $row['id'],
            'name' => $row['name'],
            'element' => $row['element'],
            'unitclass' => $row['unitclass'],
            'rarity' => $row['rarity'],
            'origin' => $row['origin'],
            'urlImg' => $row['url_img']   // ici est important parce que la colonne dans BDD possede _ mais hydration va chercher setUrlImg donc il connait pas url_img
        ]);
    }
}
?>