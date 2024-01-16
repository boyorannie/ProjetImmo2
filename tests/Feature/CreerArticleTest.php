<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Mail\TestMail;

class CreerArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_store_method_creates_article_and_sends_email()
    {
        $user = User::factory()->create([
            'role' => 1,
        ]);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('article.jpg');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response2 = $this->post('/admin/EnregistrementBaseDeDonne', [
                'nom' => 'Article test',
                'description' => 'Description de l article',
                'image' => $file, // Utilisez le fichier simulé directement
                'type' => 'maison',
                'statut' => 'occupe',
                'nombreToilette' => 2,
                'nombreBalcon' => 1,
                'espaceVert' => 'disponible',
                'dimension' => 1.0,
                'user_id' => $user->id,
            ]);

        $response->assertRedirect('/home');
        $response2->assertRedirect('/admin/articles/ajouter')->with('status', 'Article enregistre avec succès');

    }

    public function test_index_method_returns_view_with_articles()
    {
        $articles = Article::factory()->create();
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('user.article.index', compact('articles'));
    }
    public function suppArticleTest()
    {
        $user = User::factory()->create([
            'role' => 1,
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $article = Article::factory()->create();

        $this->delete('/admin/Supprimer/' . $article->id);

        $response->assertRedirect('/home');
        $this->assertNull(Article::find($article->id));
    }
    
}
