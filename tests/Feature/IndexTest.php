<?php

namespace Tests\Feature;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_result(): void
    {
        
        $this->mockContact();
        $contact = Contact::first();


        $response = $this->get('/api/contacts');

        $response->assertStatus(200)
        ->assertJsonFragment([
            //'data' => [
                [
                    'id' => $contact->id,
                    'name' => $contact->name,
                    'fone' => $contact->fone,
                    'created_at' => $contact->created_at,
                    'updated_at' => $contact->updated_at,
                    'deleted_at' => $contact->deleted_at,
                ]
            ]
        );
    }
    private function mockContact(int $count = 1): void
    {
        Contact::factory()->count($count)->create();
    }
}