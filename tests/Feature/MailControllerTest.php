<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Queue; // Import the Queue facade
use App\Jobs\SendEmailJob;
class MailControllerTest extends TestCase
{
   public function test_queuemail(): void
{
   
    Queue::fake();
   $data = [
        'name' => 'multiple mail',
        'emails' => 'secondfirst@mailinator.com', 
    ];

   $response = $this->withoutMiddleware()->post('/queue-mail', $data);

   $response->assertRedirect();
  $response->assertSessionHas('success', 'Your emails were successfully sent.');
    Queue::assertPushed(SendEmailJob::class, 1);
}



}
