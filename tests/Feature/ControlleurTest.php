<?php

namespace Tests\Feature;

use App\Models\Demande;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemandeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_demande()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Demande::factory()->create(['id_users' => $user->id]); // Créer une demande pour cet utilisateur

        $response = $this->get(route('demande.index'));

        $response->assertStatus(200);
        // Assurez-vous d'ajouter des assertions pour vérifier que les demandes de l'utilisateur sont correctement affichées
    }

    public function test_store_demande()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'titre' => 'Nouvelle demande',
            'description' => 'Description de la nouvelle demande',
            // Autres données nécessaires pour le test
        ];

        $response = $this->post(route('demande.store'), $data);

        $response->assertRedirect(route('demande.index'));

        // Assurez-vous d'ajouter des
    }
    public function testStoreDemande()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'titre' => 'Nouvelle demande',
            'description' => 'Description de la nouvelle demande',
            // Autres données nécessaires pour le test
        ];

        $response = $this->post(route('demande.store'), $data);

        $response->assertRedirect(route('demande.index'));

        $this->assertDatabaseHas('demandes', [
            'titre' => 'Nouvelle demande',
            // Assurez-vous d'ajouter d'autres vérifications si nécessaire
        ]);
    }

    public function testIndexDemande()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Demande::factory()->create([
            'id_users' => $user->id,
            'id_statuts' => Statut::where('statut', 'Finalisée')->first()->id,
        ]);

        Demande::factory()->create([
            'id_users' => $user->id,
            'id_statuts' => Statut::where('statut', 'Brouillon')->first()->id,
        ]);

        $response = $this->get(route('demande.index'));

        $response->assertStatus(200);
        // Ajoutez d'autres vérifications si nécessaire, par exemple, vérifiez si les données sont affichées correctement.
    }
}
