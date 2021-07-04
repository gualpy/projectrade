<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use Faker\Factory;

class Tblcliente extends Seeder
{
	public function run()
	{
		
		$faker = \Faker\Factory::create();
		$faker = Factory::create();
		$create_at = $faker->dateTime();
		$update_at = $faker->dateTimeBetween($create_at);

		
			$group = [
				[
					'nombreGrupo'	=>	"admin",
					'create_at'		=>	$create_at->format('Y-m-d H:i:s'),
					'update_at'		=>	$update_at->format('Y-m-d H:i:s')
				],
				[
					'nombreGrupo'	=>	"usuario",
					'create_at'		=>	$create_at->format('Y-m-d H:i:s'),
					'update_at'		=>	$update_at->format('Y-m-d H:i:s')
				],
				
			];
			
			$builder=$this->db->table('tblGrupo');
			dd($builder);
			$builder->insertBatch($group);
			
			// $data = [
			// 	'codigo' 	=> $faker->randomNumber($nbDigits = 4, $strict = false),
			// 	'nombre'    => $faker->name,
			// 	'apellido'	=> $faker->lastName,
			// 	'password'	=> $faker->password,
			// 	'email'		=> $faker->email,
			// 	'estado'	=> $faker->numberBetween($min=0,$max=2),
			// 	'create_at'	=> $create_at->format('Y-m-d H:i:s'),
			// 	'update_at'	=> $update_at->format('Y-m-d H:i:s')
				
			// ];
			// $builder=$this->db->table('tblUsuario');
			// $builder->insertBatch($data);
		}
			
		
				
		
	// Simple Queries
	//$this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);
	//$this->db->table('tblUsuario')->insert($data);	
	// Using Query Builder
	//$this->db->table('users')->insert($data);
	}
	

