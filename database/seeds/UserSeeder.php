<?php
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superadmin = User::create([
          'nama' => 'superadmin',
          'email' => 'superadmin@gmail.com',
          'no_telp' => '82235241085',
          'tempat_lahir' => 'balikpapan',
          'alamat' => 'balikpapan',
          'no_ktp' => '32432848343894',
          'level' => '1',
          'register_token' => ' ',
          'register_status' => '1',
          'password' => Hash::make('123456'),
          'tanggal_lahir' => '2010-01-10',
          'foto_ktp' => 'foto-1',
          'seks' => 'L',
         ]);

          $superadmin->assignRole('superadmin');
    }
}
