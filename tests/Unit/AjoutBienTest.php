<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ArticleController;

class ArticleControllerTest extends TestCase
{
    public function testAjoutBien()
    {
        $user = User::factory()->create();
        Storage::fake('public');
        $file = UploadedFile::fake()->image('maison.jpg');
        // Créez des données fictives pour simuler l'ajout d'un article
        $data = [
            'nom' => 'Maison',
            'description' => 'Belle maison',
            'image' =>$image,
            'type' => 'maison',
            'statut' => 'libre',
            'nombreToilette' => 2,
            'dimension' => 150.5,
            'nombreBalcon' => 1,
            'espaceVert' => 'disponible',
            'user_id' => 1,
        ];

        $result = $controller->store($data);

       
        $this->assertNotNull($result); // Adapter cette assertion en fonction du résultat attendu
        
        // Autres assertions selon le résultat attendu
    }

   
}
