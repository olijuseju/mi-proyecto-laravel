<?php

namespace Tests\Feature\app\Services;

use App\Models\Lectura;
use App\Models\Sensore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use MongoDB\Driver\Session;
use Tests\TestCase;
use App\Http\Logica\LogicaNegocio;

class LogicaNegocioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_guardarSensor()
    {
        $test_post =  [
            'name' => "test",
            'model' => "testModel",
            'description' => "testdesc",
        ];
        $response=$this->post('/api/sensores/',$test_post);
        $response->assertStatus(201);

    }

    public function test_guardarSensorConTiposDeDatoMal()
    {
        $test_post =  [
            'name' => null,
            'model' => "testModel",
            'description' => "testdesc",
        ];
        $response=$this->post('/api/sensores/',$test_post);
        $response->assertStatus(500);
    }

    public function test_guardar_lectura_con_sensor_mal()
    {

        $test_post =  [
            'data' => 0,
            'id_sensor' => 0,
            'latitud' => 0,
            'longitud' => 0,
        ];
        $response=$this->post('/api/lecturas/',$test_post);
        $response->assertStatus(500);
    }


    public function test_guardar_lectura()
    {
        $test_post =  [
            'data' => 0,
            'id_sensor' => 2,
            'latitud' => 0,
            'longitud' => 0,
        ];
        $response=$this->post('/api/lecturas/',$test_post);
        $response->assertStatus(201);
    }

    public function test_guardar_lecturaConTiposDeDatoMal()
    {
        $test_post =  [
            'data' => "test",
            'id_sensor' => "test",
            'latitud' => "test",
            'longitud' => "test",
        ];
        $response=$this->post('/api/lecturas/',$test_post);
        $response->assertStatus(500);

    }

    public function test_guardar_lectura_sin_sensor(){

        $test_post =  [
            'data' => 0,
            'id_sensor' => null,
            'latitud' => 0,
            'longitud' => 0,
        ];
        $response=$this->post('/api/lecturas/',$test_post);
        $response->assertStatus(500);
    }

    public function test_guardarUsuario()
    {
        $test_post =  [
            'name' => "test",
            'email' => 'test@test.net',
            'password' => '123456'
        ];
        $response=$this->post('/api/users/',$test_post);
        $response->assertStatus(201);

        $user = User::where('name', $test_post['name'])->first();

        $response = $this->delete('api/users/' . $user->id);

    }

    public function test_guardarUsuarioConTiposDeDatoMal()
    {
        $response=$this->post('/api/users/', [
            'name' => null,
            'email' => 'test@test.net',
            'password' => '123456'
        ]);
        $response->assertStatus(500);
    }

    public function test_eliminarUsuario()
    {
        $test_post =  [
            'name' => "test2",
            'email' => 'test2@test.net',
            'password' => '123456'
        ];
        $response=$this->post('/api/users/',$test_post);
        $user = User::where('name', $test_post['name'])->first();

        $response = $this->delete('api/users/' . $user->id);
        $response->assertStatus(204);

    }

}
