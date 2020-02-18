<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Mail\SendMail;
use Illuminate\Database\Seeder;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CreateContactTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testVerifyTables()
    {

        try {
            $pdo = DB::connection()->getPdo()->prepare('show tables');
            $res = $pdo->execute();
            $res = $pdo->fetchAll();
            $tables = array();

            foreach ($res as $value) $tables[] = $value[0];

            $this->assertEquals(['contacts', 'failed_jobs', 'migrations', 'password_resets', 'users'], $tables);
        } catch (\Throwable $th) {
            $this->fail("Erro no banco de dados, verifique se todas as tabelas foram criadas.");
        }
    }

    public function testRouteCreateContact()
    {
        try {
            Storage::fake('files');
            $response = $this->json('POST', "api/contact", [
                "name" => " TESTE",
                "email" => "TESTE@gmail.com",
                "phone" => "(67) 99269-6705",
                "message" => "Fuga quidem quasi dolor voluptatem. Nihil libero neque distinctio dicta consequuntur incidunt.",
                "file" => UploadedFile::fake()->image(rand() . '_.pdf'),
                "sender_ip" => "189.27.88.122"
            ]);
            $response->assertStatus(200)->assertJson((array)  array('message' => 'Mensagem enviada com sucesso!'));
        } catch (\Throwable $th) {
            $this->fail("Erro ao salvar mensagem utilizando a rota api/contact :::: " . $th);
        }
    }


    public function testFactoryCreateContact()
    {
        try {
            $contact =  factory(\App\Models\Contact::class)->create();
            $this->assertTrue(true, $contact);
        } catch (\Throwable $th) {
            $this->fail("Erro no arquivo ContactFactory.php  :::: " . $th);
        }
    }

    public function testRouteGetContact()
    {
        try {
            $response = $this->json('GET','api/contact/');
            $response->assertStatus(200)->assertJson((array) $response['data']);
        } catch (\Throwable $th) {
            $this->fail("Erro ao retornar dados na rota api/contact/  :::: " . $th);
        }
    }
}
